<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\CategoryRequest;
use App\Http\Resources\BaseResource;
use App\Http\Resources\category\CategoryResource;
use App\Http\Resources\category\CategoryCollection;
use App\Repositories\CategoryRepository;

class CategoryController
{
    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }
    //Index-Search Category
    public function search(CategoryRequest $request)
    {
        return new CategoryCollection($this->categoryRepository->search($request->searchFilter()));
    }
    //Store Category
    public function store(CategoryRequest $request)
    {
        return new BaseResource($this->categoryRepository->store($request->storeFilter()));
    }
    //Show Category
    public function show($id)
    {
        return new CategoryResource($this->categoryRepository->show($id));
    }
    //Update Category
    public function update(CategoryRequest $request, $id)
    {
        return new BaseResource($this->categoryRepository->update($request->updateFilter(), $id));
    }
}

