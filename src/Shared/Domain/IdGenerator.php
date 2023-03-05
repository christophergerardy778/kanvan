<?php

namespace Src\Shared\Domain;

interface IdGenerator
{
    public static function create(): string;
}
