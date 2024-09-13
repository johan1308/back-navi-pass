<?php




namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\UserResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;



class AuthController extends Controller
{
    public function login(LoginRequest $request): JsonResponse
    {
        $credentials = [
            'user' => $request->get('email'),
            'password' => $request->get('password')
        ];

        if (Auth::attempt($credentials)) {
            $user = $request->user();

            $token = $user->createToken('MyApp')->plainTextToken;
            $request->merge(['token' => $token]);
            $resource = new UserResource($user);
            
            return response()->json($resource);
        } else {
            return $this->sendError(['error' => 'Unauthorized'], 401);
        }
    }

    /**
     * @return JsonResponse|void
     */
    public function verify()
    {
        dd('llego');
        if (Auth::user() === null) {
            return $this->sendError(['error' => 'Unauthorised'], 401);
        }
    }

    public function logout(): JsonResponse
    {
        $user = Auth::user();
        $user->tokens()->delete();
        return $this->sendSuccess('User logout successfully.');
    }
}
