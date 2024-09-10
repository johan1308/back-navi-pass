<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;




class CategoriesController extends Controller
{
    //
    public function index(Request $request): LengthAwarePaginator | JsonResponse
    {
        $queryParams  = $request->get('remove_pagination', false);
        $category = new Categories();
        if ($queryParams) {
            return $this->sendSuccess($category->all());
        };

        return $this->sendPaginate($category);
    }

    public function store(Request $request): JsonResponse
    {
        $validate = $request->validate(([
            "name" => "required|string|max:300",
        ]));


        $category = Categories::firstOrCreate($validate);
        if (!$category->wasRecentlyCreated) {
            return $this->sendError(
                'Ya se encuentra registrado',
                $this->BadRequestStatus
            );
        }
        return $this->sendSuccess(
            $category,
            201,
            'Categoría registrada con éxito'
        );
    }

    public function show(int $id): JsonResponse
    {
        $user = Categories::find($id);
        return $this->sendSuccess($user, $this->successStatus);
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $validate = $request->validate(([
            "name" => "required|string|max:300",
        ]));

        $category = Categories::find($id);
        if (!$category) {
            return $this->sendError(
                'Categoría no existe',
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

        Categories::findOrFail($id)->delete();
        return $this->sendSuccess(
            null,
            $this->successStatus,
            'Eliminado con éxito'
        );
    }
}
