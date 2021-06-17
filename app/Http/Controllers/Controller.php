<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function successResponse(array $data, string $message, bool $resourceCreated = false) {

        $response = [
            'success' => true,
            'data'    => $data,
            'message' => $message,
        ];
        return response()
            ->json(
                $response,
                $resourceCreated ?
                    Response::HTTP_CREATED :
                    Response::HTTP_OK
            );
    }

    protected function errorResponse(string $errorMessage, int $responseCode) {

        
        $response = [
            'success' => false,
            'message' => $errorMessage
        ];
        return response()
            ->json(
                $response,
                $responseCode
            );
    }

    protected function deleteResponse() {

        return response()
            ->json(
                null,
                Response::HTTP_NO_CONTENT
            );
    }
}
