<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\UserLoginRequest;
use App\Http\Requests\Auth\UserRegisterRequest;
use App\Http\Resources\Auth\UserResource;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function login(UserLoginRequest $request): UserResource
    {
        $data = $request->validated();

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($data['password'], $user->password)) {
            throw new HttpResponseException(response([
                'success' => false,
                'status' => 401,
                'errors' => [
                    'message' => 'Unauthorized, email or password wrong',
                ]
            ], 401));
        }

        if (!$user->hasVerifiedEmail()) {
            throw new HttpResponseException(response([
                'success' => false,
                'status' => 401,
                'errors' => [
                    'message' => 'Please verified your email',
                ]
            ], 401));
        }

        $token = $user->createToken($request->email)->plainTextToken;

        $user['token'] = $token;

        return new UserResource($user);
    }

    public function register(UserRegisterRequest $request): UserResource
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);

        event(new Registered($user));

        return new UserResource($user);
    }

    public function logout(Request $request): JsonResponse
    {
        $request->user()->tokens()->delete();
        return response()->json([
            'success' => true,
            'status' => 200,
            'message' => 'Logout successfully',
        ]);
    }
}
