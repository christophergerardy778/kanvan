<?php

namespace Src\User\Domain\Vo;

class UserPasswordVo extends \Src\Shared\Domain\StringVo
{
    public function __construct(string $value)
    {
        $this->validate($value);
        parent::__construct($value);
    }

    public function validate(string $value)
    {
        // TODO VALIDAR QUE LA CONTRASEÑA TENGA CIERTO NUMERO DE CARACTERES, FORMATO, ETC
    }

    public static function create(string $value) {
        return new UserPasswordVo($value);
    }
}
