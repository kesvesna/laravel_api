<?php

namespace App\Modules\Pub\Auth\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Modules\Pub\Auth\Requests\LoginRequest;
use App\Services\Response\ResponseServices;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = request(['email', 'password']);

        if(!Auth::attempt($credentials)){
            return ResponseServices::sendJsonResponse(
                false,
                403,
                [
                    'message' => __('auth.login_error ')
                ]
            );
        }

        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');

        return ResponseServices::sendJsonResponse(
            true,
                200,
            [],
            [
                'api_token' => $tokenResult->accessToken,
                'user' => $user,
                'token_type' => 'Bearer',
                'expires_at' => Carbon::parse($tokenResult->token->expires_at)->toDateTimeString()

            ]
        );
    }
}
