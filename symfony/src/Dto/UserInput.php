<?php
declare(strict_types=1);

namespace App\Dto;

use Symfony\Component\Validator\Constraints as Assert;

final class UserInput
{
    /**
     * @Assert\NotBlank
     */
    public $tel;

    /**
     * @Assert\NotBlank
     */
    public $smsCode;
}