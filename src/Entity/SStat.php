<?php

namespace App\Entity;

use App\Repository\SStatRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SStatRepository::class)
 */
class SStat
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=shot::class, inversedBy="sStats")
     */
    private $shot;

    /**
     * @ORM\ManyToOne(targetEntity=stat::class, inversedBy="sStats")
     * @ORM\JoinColumn(nullable=false)
     */
    private $stat;

    /**
     * @ORM\Column(type="integer")
     */
    private $value;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getShot(): ?shot
    {
        return $this->shot;
    }

    public function setShot(?shot $shot): self
    {
        $this->shot = $shot;

        return $this;
    }

    public function getStat(): ?stat
    {
        return $this->stat;
    }

    public function setStat(?stat $stat): self
    {
        $this->stat = $stat;

        return $this;
    }

    public function getValue(): ?int
    {
        return $this->value;
    }

    public function setValue(int $value): self
    {
        $this->value = $value;

        return $this;
    }
}
