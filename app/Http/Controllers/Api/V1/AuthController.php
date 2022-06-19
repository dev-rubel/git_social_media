<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\User;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegistrationRequest;
use App\Http\Resources\Auth as AuthResource;

class AuthController extends Controller
{
    /*
        Method: login
     */
    public function login(LoginRequest $request)
    {      
        $credentials = request(['email', 'password']);

        if (!\Auth::attempt($credentials)) {
            return response()->json(
                [
                    'message' => 'The provided credentials are incorrect.'
                ], 401);
        }

        $user = $request->user();

        return (new AuthResource($user))->additional(
            [
                'access_token' => $user->createToken('social-media')->plainTextToken
            ]
        );
    }

    /*
        Method: register
     */
    public function register(RegistrationRequest $request)
    {
        $user = User::create([
            'first_name'    => $request->first_name,
            'last_name'     => $request->last_name,
            'email'         => $request->email,
            'password'      => \Hash::make($request->password),
        ]);

        return (new AuthResource($user));
    }



}
