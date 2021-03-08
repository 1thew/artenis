<?php
declare(strict_types=1);

namespace App\ValueObject;


final class SmsCode
{
    public function __construct(private string $code){}

    public function getCode(): string
    {
        return $this->code;
    }
}