<?php

namespace Src\Shared\Domain\Vo;

use Src\Shared\Domain\StringVo;
use Src\Shared\Infrastructure\StrIdGenerator;

class IdVo extends StringVo
{
    public function __construct(string $value)
    {
        parent::__construct($value);
    }

    public static function create()
    {
        return new IdVo(StrIdGenerator::create());
    }
}
