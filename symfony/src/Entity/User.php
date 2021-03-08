<?php
declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Dto\UserInput;
use App\Dto\UserOutput;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 *
 * @ApiResource(
 *     collectionOperations={
 *         "create"={
 *             "method"="POST",
 *             "input"=UserInput::class,
 *             "output"=UserOutput::class
 *         }
 *     },
 *     itemOperations={
 *          "get"
 *     }
 * )
 */
final class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private string $tel;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTel(): string
    {
        return $this->tel;
    }

    public function setTel(string $tel): self
    {
        $this->tel = $tel;

        return $this;
    }
}