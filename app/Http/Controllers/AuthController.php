<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Traits\Helper;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    use Helper;

    /**
     * Login an user
     *
     * @param  \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\JsonResponse
     */
    public function login(Request $request): JsonResponse
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return $this->onError(401, 'Invalid login credentials');
        }

        $token = $request->user()->createToken('auth_token', $request->user()->getScopes());

        return response()->json([
            'access_token' => $token->plainTextToken,
            'token_type' => 'Bearer',
        ]);
    }

}
