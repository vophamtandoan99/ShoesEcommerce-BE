<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class BaseCollection extends ResourceCollection
{
    private $pagination;
    private $apiStatus;

    public function __construct($resource)
    {
        $this->pagination = $this->paginationSchema($resource);
        $this->apiStatus = 200;//$resource->response_status;
        parent::__construct($resource->getCollection());
    }

    public function with($request)
    {
        return [
            'meta' => [
                'status' => $this->apiStatus,
                'pagination' => $this->pagination,
            ],
        ];
    }

    private function paginationSchema($resource)
    {
        return [
            'total' => $resource->total(),
            'per_page' => $resource->perPage(),
            'current_page' => $resource->currentPage(),
            'total_pages' => $resource->lastPage()
        ];
    }
}
