<?php
declare(strict_types=1);

namespace App\DataTransformer;

use ApiPlatform\Core\DataTransformer\DataTransformerInterface;
use App\Entity\User;
use ApiPlatform\Core\Validator\ValidatorInterface;

final class UserInputDataTransformer implements DataTransformerInterface
{

    public function __construct(private ValidatorInterface $validator)
    {
    }

    public function transform($object, string $to, array $context = [])
    {
        $this->validator->validate($object);
        $user = new User();
        $user->setTel($object->tel);
        return $user;
    }

    public function supportsTransformation($data, string $to, array $context = []): bool
    {
        if ($data instanceof User) {
            return false;
        }
        return User::class === $to && null !== ($context['input']['class'] ?? null);
    }
}