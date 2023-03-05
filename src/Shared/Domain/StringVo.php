<?php

namespace Src\Shared\Domain;

abstract class StringVo
{
    public function __construct(protected string $value)
    {
    }

    public function value(): string
    {
        return $this->value;
    }
}
