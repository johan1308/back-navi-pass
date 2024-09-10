<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubCategories;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\JsonResponse;

class SubCategoriesController extends Controller
{
    //
    public function index(Request $request): LengthAwarePaginator | JsonResponse
    {
        $category = new SubCategories();

        $queryParams  = $request->get('remove_pagination', false);
        if ($queryParams) {
            return $this->sendSuccess($category->all());
        };

        return $this->sendPaginate($category);
    }

    public function store(Request $request): JsonResponse
    {

        $validate = $request->validate(([
            "name" => "required|string|max:300",
            "category_id" => "required",
        ]));


        $category = SubCategories::firstOrCreate($validate);
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
        $user = SubCategories::find($id);
        return $this->sendSuccess($user, $this->successStatus);
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $validate = $request->validate(([
            "name" => "required|string|max:300",
        ]));

        $category = SubCategories::find($id);
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

        SubCategories::findOrFail($id)->delete();
        return $this->sendSuccess(
            null,
            $this->successStatus,
            'Eliminado con éxito'
        );
    }
}
