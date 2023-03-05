<?php

namespace Src\Shared\Infrastructure;

use Illuminate\Support\Str;
use Src\Shared\Domain\IdGenerator;

class StrIdGenerator implements IdGenerator
{

    public static function create(): string
    {
        return Str::uuid();
    }
}
