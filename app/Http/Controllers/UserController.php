<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Resources\UserResource;
use App\Http\Requests\StoreUserRequest;
use App\Http\Traits\Helper;

class UserController extends Controller
{
    use Helper;

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserRequest  $request
     * @return  \Illuminate\Http\JsonResponse
     */
    public function store(StoreUserRequest $request): JsonResponse
    {
        try {
            $validated = $request->validated();
            $user = User::create([
                'role_id' => 2,
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
            ]);

            return $this->onSuccess([], 'User registered successfully');
        } catch (\Throwable $e) {
            return $this->onError(500, $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\JsonResponse
     */
    public function show(Request $request) : JsonResponse
    {
        try {
            $user = $request->user();

            return (new UserResource($request->user()))->response()->setStatusCode(200);
        } catch (\Throwable $e) {
            return $this->onError(500, $e->getMessage());
        }
    }

}
