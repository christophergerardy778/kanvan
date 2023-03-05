<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Src\Shared\Domain\Jwt;
use Src\User\App\FindUserByEmail;
use Src\User\App\LoginUser;
use Src\User\Domain\Vo\UserEmailVo;
use Src\User\Domain\Vo\UserPasswordVo;

class LoginController extends Controller
{
    public function __construct(
        private readonly LoginUser $loginUser,
        private readonly FindUserByEmail $findUserByEmail,
        private readonly Jwt $jwt,
    )
    {
    }

    public function run(Request $request): JsonResponse
    {
        $userLoginSuccessfully = $this->loginUser->run(
            UserEmailVo::create($request["email"]),
            UserPasswordVo::create($request["password"]),
        );

        if (!$userLoginSuccessfully) {

        }

        $user = $this->findUserByEmail->run($request["email"]);

        return response()->json([
            "user" => $user->toPrimitiveResponse(),
            "loginSuccess" => $userLoginSuccessfully,
            "token" => $this->jwt->generate($user),
        ]);
    }
}
