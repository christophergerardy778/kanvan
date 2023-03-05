<?php

namespace Src\Shared\Infrastructure;

use Illuminate\Support\Facades\Auth;
use Src\Shared\Domain\ValidateCredentials;
use Src\User\Domain\Vo\UserEmailVo;
use Src\User\Domain\Vo\UserPasswordVo;

class ValidateAuthCredentialsAttempt implements ValidateCredentials
{
    public function attempt(UserEmailVo $userEmailVo, UserPasswordVo $userPasswordVo): bool
    {
        return  Auth::attempt([
            "email" => $userEmailVo->value(),
            "password" => $userPasswordVo->value(),
        ]);
    }
}
