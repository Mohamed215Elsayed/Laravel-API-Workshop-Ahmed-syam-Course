<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Crm\User\Requests\UserRequest;
use Crm\User\Services\UserService;

class UserController extends Controller
{
    private UserService $userService;
    const TOKEN_NAME = 'MY-personal-Token';

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    public function create(UserRequest $request)
    {
        $user = $this->userService->create($request);
        return response()->json(
            [
                'user' => $user,
                // 'token' => $request->user()->createToken($request->token_name),
                'token' => $user->createToken(self::TOKEN_NAME)->plainTextToken,
            ]
        );
    }
}
