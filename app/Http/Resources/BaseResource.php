<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Request;
use Config;

class BaseResource extends JsonResource
{
    private const DEFAULT_API_STATUS_CODE = '00000';
    private const DEFAULT_HTTP_STATUS_CODE = 200;
    private $apiStatus;

    public function __construct($resource)
    {
        $this->apiStatus = $resource->response_status ?? self::DEFAULT_API_STATUS_CODE;
        parent::__construct($resource);
    }

    public function with($request)
    {
        return [
            'meta' => [
                'status' => $this->apiStatus,
                'pagination' => null,
            ],
        ];
    }

    public function withResponse($request, $response)
    {
        $response->setStatusCode(Config::get('api.status.' . $this->apiStatus, self::DEFAULT_HTTP_STATUS_CODE));
    }

    public function toArray($request)
    {
        return [
            'data' => null
        ];
    }

    public function sendResponse($result, $message)
    {
        $response = [
            'success' => true,
            'data'    => $result,
            'message' => $message,
        ];
        return response()->json($response, 200);
    }
    public function sendError($error, $errorMessages = [], $code = 500)
    {
        $response = [
            'success' => false,
            'message' => $error,
        ];
        if (!empty($errorMessages)) {
            $response['data'] = $errorMessages;
        }
        return response()->json($response, $code);
    }
}
