<?php

namespace Src\User\Domain;

interface AllUsers
{
    public function findOneByEmail(string $email): User | null;
    public function create(User $user): User;
}
