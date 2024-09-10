<?php

namespace App\Http\Controllers;


use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;

abstract class Controller
{
    
    // Success
    public $successStatus = 200;
    public $createStatus = 200;

    // Errors
    public $BadRequestStatus = 400;
    public $NotFoundStatus = 404;
    public $UnauthorizedStatus = 401;
    public $ForbiddenStatus = 403;


    public function sendSuccess($data = null, int $code = 200, $message = null): JsonResponse
    {
        return response()->json([
            "data" => $data,
            "code" => $code,
            "message" => $message,
        ], $code);
    }


    public function sendPaginate(Model | Builder $model, $page = 10, $field = "id"): LengthAwarePaginator
    {

        $data = $model
            ->latest()
            ->paginate($page);

        $data->code = $this->successStatus;

        return $data;
    }

    public function sendError($message = null, int $code): JsonResponse
    {
        return response()->json([
            "code" => $code,
            "message" => $message,
        ], $code);
    }
}
