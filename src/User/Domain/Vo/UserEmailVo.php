<?php

namespace Src\User\Domain\Vo;

use Src\Shared\Domain\StringVo;

class UserEmailVo extends StringVo
{
    public function __construct(string $value)
    {
        $this->validate($value);
        parent::__construct($value);
    }

    public function validate(string $value)
    {
        // TODO VALIDAR SI EL EMAIL ES CORRECTO, NO CONTIENE CARACTERES RAROS, ETC
    }

    public static function create(string $value): UserEmailVo
    {
        return new UserEmailVo($value);
    }
}
