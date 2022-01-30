<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\OrderDeliveryRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: OrderDeliveryRepository::class)]
#[ApiResource]
class OrderDelivery
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\OneToOne(inversedBy: 'orderDelivery', targetEntity: Order::class, cascade: ['persist', 'remove'])]
    private $linkedOrder;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $OrderAddress;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank, Assert\Length(max: 255)]
    private $type;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLinkedOrder(): ?Order
    {
        return $this->linkedOrder;
    }

    public function setLinkedOrder(?Order $linkedOrder): self
    {
        $this->linkedOrder = $linkedOrder;

        return $this;
    }

    public function getOrderAddress(): ?User
    {
        return $this->OrderAddress;
    }

    public function setOrderAddress(?User $OrderAddress): self
    {
        $this->OrderAddress = $OrderAddress;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }
}
