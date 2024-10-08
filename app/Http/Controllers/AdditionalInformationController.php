<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdditionalInformationRequests;
use App\Models\Additional_information;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AdditionalInformationController extends Controller
{
    public function index(): LengthAwarePaginator
    {
        $category = new Additional_information();
        return $this->sendPaginate($category);
    }

    public function store(AdditionalInformationRequests $request): JsonResponse
    {

        $category = Additional_information::firstOrCreate($request->validated());
        if (!$category->wasRecentlyCreated) {
            return $this->sendError(
                'Ya se encuentra registrado',
                $this->BadRequestStatus
            );
        }

        return $this->sendSuccess(
            $category,
            201,
            'Registrado con exitosamente'
        );
    }

    public function show(int $id): JsonResponse
    {
        $user = Additional_information::find($id);
        return $this->sendSuccess($user, $this->successStatus);
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $category = Additional_information::find($id);
        if (!$category) {
            return $this->sendError(
                'No se encuentra registrado',
                $this->NotFoundStatus
            );
        }
        $category->update($request->all());
        return $this->sendSuccess(
            $category,
            $this->successStatus,
            "Actualizado con éxito"
        );
    }


    public function destroy(int $id): JsonResponse
    {

        Additional_information::findOrFail($id)->delete();
        return $this->sendSuccess(
            null,
            $this->successStatus,
            'Eliminado con éxito'
        );
    }
}
