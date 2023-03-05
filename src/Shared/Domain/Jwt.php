<?php

namespace Src\Shared\Domain;

use Src\User\Domain\User;

interface Jwt
{
    public function generate(User $user);
}
