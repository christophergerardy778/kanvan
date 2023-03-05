<?php

namespace Src\Shared\Domain;

class AppException extends \Exception
{
    public function __construct(string $message = "", HttpStatusCode $code = HttpStatusCode::OK)
    {
        parent::__construct($message, $code->value, null);
    }

    public function response(): array
    {
        return [
            "status" => $this->getCode(),
            "message" => $this->getMessage()
        ];
    }
}
