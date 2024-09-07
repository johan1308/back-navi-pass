<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Credentials;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class CredentialsController extends Controller
//
{
    public function index(): LengthAwarePaginator
    {
        $category = new Credentials();
        return $this->sendPaginate($category);
    }

    public function store(Request $request): JsonResponse
    {
        
        $validate = $request->validate(([
            "name" => "required|string|max:300",
            "sub_category_id" => "required",
        ]));


        $category = Credentials::firstOrCreate($validate);
        if (!$category->wasRecentlyCreated) {
            return $this->sendError(
                'La sub-categoría ya existe',
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
        $user = Credentials::find($id);
        return $this->sendSuccess($user, $this->successStatus);
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $validate = $request->validate(([
            "name" => "required|string|max:300",
        ]));

        $category = Credentials::find($id);
        if (!$category) {
            return $this->sendError(
                'No se encuentra registrado',
                $this->NotFoundStatus
            );
        }

        $category->update($validate);
        return $this->sendSuccess(
            $category,
            $this->successStatus,
            "Actualizado con éxito"
        );
    }


    public function destroy(int $id): JsonResponse
    {

        Credentials::findOrFail($id)->delete();
        return $this->sendSuccess(
            null,
            $this->successStatus,
            'Eliminado con éxito'
        );
    }
}
