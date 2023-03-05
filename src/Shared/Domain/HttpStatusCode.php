<?php

namespace Src\Shared\Domain;

enum HttpStatusCode: int
{
    case OK = 200;
    case CONFLICT = 405;
    case BAD_REQUEST = 400;
}
