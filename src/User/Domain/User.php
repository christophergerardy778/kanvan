<?php

namespace Src\User\Domain;

use Src\Shared\Domain\Vo\IdVo;
use Src\User\Domain\Vo\UserEmailVo;
use Src\User\Domain\Vo\UserNameVo;
use Src\User\Domain\Vo\UserPasswordVo;

class User
{
    public IdVo $userId;
    public UserNameVo $userNameVo;
    public UserEmailVo $userEmailVo;
    public UserPasswordVo $userPasswordVo;

    public static function fromPrimitives(array $data)
    {
        $user = new User();
        $user->userId = IdVo::create();
        $user->userNameVo = new UserNameVo($data["name"]);
        $user->userEmailVo = new UserEmailVo($data["email"]);
        $user->userPasswordVo = new UserPasswordVo($data["password"]);
        return $user;
    }

    public function toPrimitiveResponse() {
        return [
            "id" => $this->userId->value(),
            "name" => $this->userNameVo->value(),
            "email" => $this->userEmailVo->value(),
        ];
    }
}
