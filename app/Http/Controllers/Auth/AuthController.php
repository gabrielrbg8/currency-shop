<?php


namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserStoreRequest;
use App\Http\Resources\User\UserResource;
use App\Models\User\User;
use App\Services\User\UserService;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function __construct(private UserService $userService)
    {
    }
    public function signup(UserStoreRequest $request)
    {
        $user = $this->userService->store($request->validated());
        $token = JWTAuth::fromUser($user);

        return $this->showOne($user, Response::HTTP_CREATED, UserResource::class, ['access_token' => $token]);
    }

    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (!$token = JWTAuth::attempt($credentials)) {
            return response()->json(['error' => 'Invalid credentials'], 401);
        }

        $user = auth()->user(); // Obtenha o usuário autenticado

        return $this->showOne($user, Response::HTTP_OK, UserResource::class, ['access_token' => $token]);

    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => JWTAuth::factory()->getTTL() * 60,
        ]);
    }
}
