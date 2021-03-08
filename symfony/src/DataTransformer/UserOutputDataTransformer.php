<?php
declare(strict_types=1);

namespace App\DataTransformer;

use ApiPlatform\Core\DataTransformer\DataTransformerInterface;
use App\Dto\UserOutput;
use App\Entity\User;
use App\Service\TokenGenerator;


final class UserOutputDataTransformer implements DataTransformerInterface
{
    public function __construct(private TokenGenerator $tokenGenerator)
    {
    }

    public function transform($data, string $to, array $context = [])
    {
        /** @var $data User */
        $output = new UserOutput();
        $output->tel = $data->getTel();

        $output->authToken = $this->tokenGenerator->new($data);
        //$output->authToken = 'sdfsdf';
        return $output;
    }
    public function supportsTransformation($data, string $to, array $context = []): bool
    {
        return UserOutput::class === $to && $data instanceof User;
    }
}