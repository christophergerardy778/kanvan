<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Src\Shared\Domain\AppException;
use Src\Shared\Domain\BadRequestException;
use Src\Shared\Domain\Jwt;
use Src\User\App\RegisterUser;
use Src\User\Domain\User;

class RegisterController extends Controller
{
    public function __construct(
        private readonly Jwt          $jwt,
        private readonly RegisterUser $registerUser,
    )
    {
    }

    public function run(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $this->validateData($request);
            $user = User::fromPrimitives($request->only('email', 'password', 'name'));
            $userCreated = $this->registerUser->run($user);
            $token = $this->jwt->generate($userCreated);

            return response()->json([
                "user" => $user->toPrimitiveResponse(),
                "token" => $token
            ]);

        } catch (AppException $exception) {
            return response()->json($exception->response(), $exception->getCode());
        }
    }

    /**
     * @throws BadRequestException
     */
    public function validateData(Request $request): void
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required|min:6',
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if ($validation->fails()) {
            throw new BadRequestException();
        }
    }
}
