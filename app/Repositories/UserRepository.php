<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\SessionUser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Exceptions\UserUnauthorizedException;
use Config;


class UserRepository
{
    //Index-Search User
    public function search($inputs)
    {
        return User::
        when(isset($inputs['code']), function ($query) use ($inputs) {
            return $query->where('code', 'LIKE', '%' . $inputs['code'] . '%');
        })
        ->when(isset($inputs['email']), function ($query) use ($inputs) {
            return $query->where('email', 'LIKE', '%' . $inputs['email'] . '%');
        })
        ->when(isset($inputs['name']), function ($query) use ($inputs) {
            return $query->where('name', 'LIKE', '%' . $inputs['name'] . '%');
        })
        ->when(isset($inputs['status']), function ($query) use ($inputs) {
            return $query->where('status', 'LIKE', '%' . $inputs['status'] . '%');
        })
        ->orderBy('code', 'desc')
        ->paginate(10);
    }

    //Store User
    public function store($inputs, $newNamefile)
    {
        return User::create([
            'code'          => $inputs['code'],
            'name'          => $inputs['name'],
            'dateofbirth'   => $inputs['dateofbirth'],
            'phone'         => $inputs['phone'],
            'address'       => $inputs['address'],
            'email'         => $inputs['email'],
            'img'           => $newNamefile,
            'password'      => Hash::make($inputs['password']),
            'role'          => $inputs['role'],
            'status'        => 1,
        ]);
    }

    //Show User
    public function show($id)
    {
        return User::findOrFail($id);
    }

    //Update User
    public function update($inputs, $id)
    {
        return User::findOrFail($id)
            ->update([
                'code'          => $inputs['code'],
                'name'          => $inputs['name'],
                'dateofbirth'   => $inputs['dateofbirth'],
                'phone'         => $inputs['phone'],
                'address'       => $inputs['address'],
                'email'         => $inputs['email'],
                'password'      => Hash::make($inputs['password']),
                'role'          => $inputs['role'],
                'status'        => $inputs['status'],
            ]);
    }
    public function updateNoPass($inputs, $id)
    {
        return User::findOrFail($id)
            ->update([
                'code'          => $inputs['code'],
                'name'          => $inputs['name'],
                'dateofbirth'   => $inputs['dateofbirth'],
                'phone'         => $inputs['phone'],
                'address'       => $inputs['address'],
                'email'         => $inputs['email'],
                'role'          => $inputs['role'],
                'status'        => $inputs['status'],
            ]);
    }

    //Destroy User
    public function destroy($id)
    {
        return User::findOrFail($id)
            ->delete();
    }

    //Update Profile
    public function updateProfile($inputs, $id)
    {
        return User::findOrFail($id)
                ->update($inputs);
    }
    
    public function first($token)
    {
        $session = SessionUser::where('token', $token)->first();
        return User::findOrFail($session->user_id);
    }

    //Login
    public function check($token)
    {
        return SessionUser::wheretoken($token)->first();
    }
    public function get()
    {
        return SessionUser::where('user_id', auth()->id())->first();
    }
    public function login($inputs)
    {
        SessionUser::create([
            'token'                 => Str::random(40),
            'refresh_token'         => Str::random(40),
            'token_expried'         => date('Y-m-d H:i:s', strtotime('+30 day')),
            'refresh_token_expried' => date('Y-m-d H:i:s', strtotime('+360 day')),
            'user_id'               =>auth()->id()
        ]);
        return User::where('users.id', auth()->id())
                ->join('session_users', 'users.id', '=', 'session_users.user_id')
                ->select('session_users.token as token', 'users.name', 'users.email', 'users.img', 'users.role')
                ->paginate();
    }
    public function getUserSession()
    {
        return User::where('users.id', auth()->id())
                ->join('session_users', 'users.id', '=', 'session_users.user_id')
                ->select('session_users.token as token', 'users.name', 'users.email', 'users.img', 'users.role')
                ->paginate();
    }
    public function updateToken($id)
    {
        return SessionUser::find($id)->update([
            'token'                 => Str::random(40),
            'refresh_token'         => Str::random(40),
            'token_expried'         => date('Y-m-d H:i:s', strtotime('+30 day')),
            'refresh_token_expried' => date('Y-m-d H:i:s', strtotime('+360 day')),
            'user_id'               =>auth()->id()
        ]);
    }
    public function deleteToken($id)
    {
        return SessionUser::find($id)->delete();
    }
}
