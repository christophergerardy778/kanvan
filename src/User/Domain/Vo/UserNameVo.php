<?php

namespace Src\User\Domain\Vo;

use Src\Shared\Domain\StringVo;

class UserNameVo extends StringVo
{
    public function __construct(protected string $value)
    {
        $this->validate($this->value);
        parent::__construct($this->value);
    }

    private function validate(string $value)
    {
        // TODO: VALIDAR NOMBRE
    }
}
