<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\OrderLigneRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrderLigneRepository::class)]
#[ApiResource]
class OrderLigne
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: Article::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $articleInOrder;

    #[ORM\ManyToOne(targetEntity: Order::class, inversedBy: 'orderLignes')]
    #[ORM\JoinColumn(nullable: false)]
    private $linkeOrder;

    #[ORM\Column(type: 'integer')]
    private $quantity;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getArticleInOrder(): ?Article
    {
        return $this->articleInOrder;
    }

    public function setArticleInOrder(?Article $articleInOrder): self
    {
        $this->articleInOrder = $articleInOrder;

        return $this;
    }

    public function getLinkeOrder(): ?Order
    {
        return $this->linkeOrder;
    }

    public function setLinkeOrder(?Order $linkeOrder): self
    {
        $this->linkeOrder = $linkeOrder;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }
}
