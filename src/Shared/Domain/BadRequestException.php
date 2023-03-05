<?php

namespace Src\Shared\Domain;

class BadRequestException extends AppException
{
     public function __construct()
     {
         parent::__construct("Bad Request", HttpStatusCode::BAD_REQUEST);
     }
}
