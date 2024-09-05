<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Credentials;
use App\Models\Additional_information;




class CredentialsController extends Controller
{
    // 
    public function index()
    {
        $query = Credentials::orderByDesc('id')->paginate(10);
        return Response()->json($query);
    }

    public function store(Request $request): JsonResponse
    {   

    
        return response()->json([
            $request->all(),
        ], 201);
        
    }

    public function show($id): JsonResponse
    {
        $query = Credentials::find($id);
        return response()->json($query);
    }


    
    public function update(Request $request, $id)
    {
        $credentials = Credentials::find($id);
    }
    public function destroy($id)
    {
        $credentials = Credentials::find($id);
        return response()->json([
            'mensaje' => 'eliminado',
        ], 200);

    }


    // additionals_informations

    public function getAllAdditionals()
    {
        $query = Additional_information::orderByDesc('id')->paginate(10);
        return Response()->json($query);
    }
}
