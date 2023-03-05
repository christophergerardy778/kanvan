<?php

namespace Src\User\App;

use Src\User\Domain\AllUsers;
use Src\User\Domain\EmailAlreadyInUseException;
use Src\User\Domain\User;

class RegisterUser
{
    public function __construct(
        private readonly AllUsers $allUsers,
        private readonly UserEmailAlreadyExist $userEmailAlreadyExist,
    )
    {
    }

    /**
     * @throws EmailAlreadyInUseException
     */
    public function run(User $user): User
    {
        $userAlreadyExist = $this->userEmailAlreadyExist->run($user->userEmailVo->value());

        if ($userAlreadyExist) {
            throw new EmailAlreadyInUseException();
        }

        return $this->allUsers->create($user);
    }
}
