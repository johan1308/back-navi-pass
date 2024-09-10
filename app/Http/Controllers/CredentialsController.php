<?php

namespace App\Http\Controllers;

use App\Http\Requests\CredentialsRequest;
use App\Models\Additional_information;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Credentials;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

use function PHPSTORM_META\map;

class CredentialsController extends Controller
//
{
    public function index(Request $request): LengthAwarePaginator | JsonResponse
    {
        $query = Credentials::query();
        if ($request->has('sub_category')) {
            $sub_category_id = $request->query('sub_category');
            $query->where('sub_category_id', $sub_category_id);
        }
        return $this->sendPaginate($query);
    }

    public function store(CredentialsRequest $request): JsonResponse
    {
        $additional_information = $request->get('additional_information');
        $category = Credentials::firstOrCreate($request->validated());

        if (!$category->wasRecentlyCreated) {
            return $this->sendError(
                'Ya se encuentra registrado',
                $this->BadRequestStatus
            );
        }

        foreach ($additional_information as $info) {
            Additional_information::create([
                ...$info,
                "credential_id" => $category->id
            ]);
        }

        return $this->sendSuccess(
            $category,
            201,
            'Registrado con exitosamente'
        );
    }

    public function show(int $id): JsonResponse
    {
        $credential = Credentials::find($id);

        dd($credential->additional_information);
        return $this->sendSuccess($credential, $this->successStatus);
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $validate = $request->validate(([
            "user" => "required|string|max:300",
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
