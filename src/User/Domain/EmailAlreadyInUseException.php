<?php

namespace Src\User\Domain;

use Src\Shared\Domain\AppException;
use Src\Shared\Domain\HttpStatusCode;

class EmailAlreadyInUseException extends AppException
{
    public function __construct()
    {
        parent::__construct('Email already in use', HttpStatusCode::CONFLICT);
    }
}
