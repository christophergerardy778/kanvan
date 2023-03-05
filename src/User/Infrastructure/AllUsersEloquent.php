<?php

namespace Src\User\Infrastructure;

use Src\User\Domain\AllUsers;
use Src\User\Domain\User;

class AllUsersEloquent implements AllUsers
{
    public function findOneByEmail(string $email): User | null
    {
        $result = \App\Models\User::where('email', $email)->first();

        if (is_null($result)) {
            return null;
        }

        return User::fromPrimitives([
            "id" => $result->id,
            "name" => $result->name,
            "email" => $result->email,
            "password" => $result->password,
        ]);
    }

    public function create(User $user): User
    {
        $userCreated = \App\Models\User::createUser($user);

        return User::fromPrimitives([
            "id" => $userCreated->id,
            "name" => $userCreated->name,
            "email" => $userCreated->email,
            "password" => "",
        ]);
    }
}
