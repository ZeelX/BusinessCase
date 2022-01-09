<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\DataTestRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DataTestRepository::class)]
#[ApiResource]

class DataTest
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $blabla;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBlabla(): ?string
    {
        return $this->blabla;
    }

    public function setBlabla(string $blabla): self
    {
        $this->blabla = $blabla;

        return $this;
    }
}
