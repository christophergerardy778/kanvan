<?php

namespace Src\Shared\Domain;

use Src\User\Domain\Vo\UserEmailVo;
use Src\User\Domain\Vo\UserPasswordVo;

interface ValidateCredentials
{
    public function attempt(UserEmailVo $userEmailVo, UserPasswordVo $userPasswordVo): bool;
}
