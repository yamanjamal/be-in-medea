<?php

namespace App\Http\Controllers;

use App\Http\Requests\MobileLoginRequest;
use App\Http\Requests\MobileRegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class TokenAuthController extends Controller
{
    public function store(MobileLoginRequest $request): JsonResponse
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        return response()->json([
            'user' => new UserResource($user),
            'token' => $user->createToken($request->device_name)->plainTextToken
        ], 200, [], JSON_UNESCAPED_SLASHES);
    }

    public function register(MobileRegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            'user' => new UserResource($user),
        ], 200, [], JSON_UNESCAPED_SLASHES);
    }

    public function destroy(Request $request): JsonResponse
    {
        $request->user()->tokens()->delete();
        return response()->json();
    }
}