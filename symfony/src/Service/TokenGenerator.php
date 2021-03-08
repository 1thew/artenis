<?php
declare(strict_types=1);

namespace App\Service;

use App\Entity\User;

final class TokenGenerator
{
    public function __construct(/* place of services/handlers etc... */)
    {
    }

    public function new(User $user): string
    {
        try {
            $result = $this->generateString();
        } catch (\Exception $e) {
            throw new \RuntimeException('Error of function random_bytes: '.$e->getMessage());
        }
        return $result;
    }

    private function generateString($strength = 64): string
    {
        $input = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        $input_length = strlen($input);
        $random_string = '';
        for($i = 0; $i < $strength; $i++) {
            $random_character = $input[random_int(0, $input_length - 1)];
            $random_string .= $random_character;
        }

        return $random_string;
    }
}