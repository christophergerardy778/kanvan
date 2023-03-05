<?php

namespace Src\User\App;

use Illuminate\Support\Facades\Auth;
use Src\Shared\Domain\ValidateCredentials;
use Src\User\Domain\AllUsers;
use Src\User\Domain\Vo\UserEmailVo;
use Src\User\Domain\Vo\UserPasswordVo;

class LoginUser
{
    public function __construct(
        private readonly AllUsers            $allUsers,
        private readonly ValidateCredentials $validateCredentials,
    )
    {}

    public function run(UserEmailVo $userEmailVo, UserPasswordVo $userPasswordVo): bool
    {
        $userExists = $this->allUsers->findOneByEmail($userEmailVo->value());

        if (!$userExists) {
            return false;
        }

        $credentialsAreOk = $this->validateCredentials->attempt($userEmailVo, $userPasswordVo);

        if (!$credentialsAreOk) {
            return false;
        }

        return true;
    }
}
