<?php

namespace App\Entity;

use App\Repository\ZStatRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ZStatRepository::class)
 */
class ZStat
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=zone::class, inversedBy="zStats")
     * @ORM\JoinColumn(nullable=false)
     */
    private $zone;

    /**
     * @ORM\ManyToOne(targetEntity=stat::class, inversedBy="zStats")
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

    public function getZone(): ?zone
    {
        return $this->zone;
    }

    public function setZone(?zone $zone): self
    {
        $this->zone = $zone;

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
