<?php

namespace Src\User\App;

use Src\User\Domain\AllUsers;
use Src\User\Domain\User;

class FindUserByEmail
{
    public function __construct(private readonly AllUsers $allUsers)
    {}

    public function run(string $email): User
    {
        $user = $this->allUsers->findOneByEmail($email);

        if (is_null($user)) {

        }

        return $user;
    }
}
