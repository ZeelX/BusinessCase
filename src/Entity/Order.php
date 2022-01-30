<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\OrderRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: OrderRepository::class)]
#[ORM\Table(name: '`order`')]
#[ApiResource]
class Order
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'datetime')]
    #[Assert\NotBlank]
    private $createdAt;

    #[ORM\Column(type: 'float')]
    private $totalPrice;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank, Assert\Length(max: 255)]
    private $status;

    #[ORM\OneToMany(mappedBy: 'linkeOrder', targetEntity: OrderLigne::class, orphanRemoval: true)]
    private $orderLignes;

    #[ORM\OneToOne(mappedBy: 'linkedOrder', targetEntity: OrderDelivery::class, cascade: ['persist', 'remove'])]
    private $orderDelivery;

    public function __construct()
    {
        $this->orderLignes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getTotalPrice(): ?float
    {
        return $this->totalPrice;
    }

    public function setTotalPrice(float $totalPrice): self
    {
        $this->totalPrice = $totalPrice;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return Collection|OrderLigne[]
     */
    public function getOrderLignes(): Collection
    {
        return $this->orderLignes;
    }

    public function addOrderLigne(OrderLigne $orderLigne): self
    {
        if (!$this->orderLignes->contains($orderLigne)) {
            $this->orderLignes[] = $orderLigne;
            $orderLigne->setLinkeOrder($this);
        }

        return $this;
    }

    public function removeOrderLigne(OrderLigne $orderLigne): self
    {
        if ($this->orderLignes->removeElement($orderLigne)) {
            // set the owning side to null (unless already changed)
            if ($orderLigne->getLinkeOrder() === $this) {
                $orderLigne->setLinkeOrder(null);
            }
        }

        return $this;
    }

    public function getOrderDelivery(): ?OrderDelivery
    {
        return $this->orderDelivery;
    }

    public function setOrderDelivery(?OrderDelivery $orderDelivery): self
    {
        // unset the owning side of the relation if necessary
        if ($orderDelivery === null && $this->orderDelivery !== null) {
            $this->orderDelivery->setLinkedOrder(null);
        }

        // set the owning side of the relation if necessary
        if ($orderDelivery !== null && $orderDelivery->getLinkedOrder() !== $this) {
            $orderDelivery->setLinkedOrder($this);
        }

        $this->orderDelivery = $orderDelivery;

        return $this;
    }
}
