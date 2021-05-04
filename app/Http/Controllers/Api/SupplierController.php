<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\BaseResource;
use App\Repositories\SupplierRepository;
use App\Http\Requests\SupplierRequest;
use App\Http\Resources\supplier\SupplierCollection;
use App\Http\Resources\supplier\SupplierResource;

class SupplierController
{
    private $supplierRepository;

    public function __construct(SupplierRepository $supplierRepository)
    {
        $this->supplierRepository = $supplierRepository;
    }

    //Index-Search Supplier
    public function search(SupplierRequest $request)
    {
        return new SupplierCollection($this->supplierRepository->search($request->searchFilter()));
    }

    //Store Supplier
    public function store(SupplierRequest $request)
    {
        return new BaseResource($this->supplierRepository->store($request->storeFilter()));
    }

    //Show Supplier
    public function show($id)
    {
        return new SupplierResource($this->supplierRepository->show($id));
    }

    //Update Supplier
    public function update(SupplierRequest $request, $id)
    {
        return new BaseResource($this->supplierRepository->update($request->updateFilter(), $id));
    }
}
