<?php

namespace App\Http\Controllers\Api;

use App\Repositories\UserRepository;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserProfileRequest;
use App\Http\Resources\user\UserCollection;
use App\Http\Resources\user\UserResource;
use App\Http\Resources\BaseResource;

class UserController
{

    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    //Index-Search User
    public function search(UserRequest $request)
    {
        return new UserCollection($this->userRepository->search($request->searchFilter()));
    }

    //Store User
    public function store(UserRequest $request)
    {
        $image          = $request->file('img');
        $newNamefile    = rand().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('/uploads/user/'),$newNamefile);
        return new BaseResource($this->userRepository->store($request->storeFilter(), $newNamefile));
    }

    //Show User
    public function show($id)
    {
        return new UserResource($this->userRepository->show($id));
    }

    //Update User
    public function update(UserRequest $request, $id)
    {
        if(!empty($request->password)){
            return new BaseResource($this->userRepository->update($request->updateFilter(), $id));
        }else{
            return new BaseResource($this->userRepository->updateNoPass($request->updateFilter(), $id));
        }
    }

    //Destroy User
    public function destroy($id)
    {
        return new BaseResource($this->userRepository->destroy($id));
    }

    //Show UserProFile
    public function showProfile($id)
    {
        return new UserResource($this->userRepository->show($id));
    }

    //Update UserProFile
    public function updateProfile(UserProfileRequest $request, $id)
    {
        return new BaseResource($this->userRepository->updateProfile($request->updateFilter(), $id));
    }

}
