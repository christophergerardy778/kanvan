<?php

namespace Src\User\App;

use Src\User\Domain\AllUsers;

class UserEmailAlreadyExist
{
    public function __construct(private readonly AllUsers $allUsers)
    {
    }

    public function run(string $email): bool
    {
        $user = $this->allUsers->findOneByEmail($email);
        return !is_null($user);
    }
}
