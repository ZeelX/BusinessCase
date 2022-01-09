<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\TestData2Repository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TestData2Repository::class)]
#[ApiResource(
    collectionOperations: [
        'post',
        'get' => [
            "security" => "is_granted('ROLE_ADMIN')"
        ],
    ],
)]
class TestData2
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $blublu;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBlublu(): ?string
    {
        return $this->blublu;
    }

    public function setBlublu(?string $blublu): self
    {
        $this->blublu = $blublu;

        return $this;
    }
}
