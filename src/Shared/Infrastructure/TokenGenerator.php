<?php

namespace Src\Shared\Infrastructure;

use Src\Shared\Domain\Jwt;
use Src\User\Domain\User;

class TokenGenerator implements Jwt
{

    public function generate(User $user)
    {
        $user = \App\Models\User::where('email', $user->userEmailVo->value())->first();
        return $user->createToken('appToken')->plainTextToken;
    }
}
