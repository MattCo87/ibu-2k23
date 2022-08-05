<?php

namespace App\Entity;

use App\Repository\AStatRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AStatRepository::class)
 */
class AStat
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=athlete::class, inversedBy="aStats")
     * @ORM\JoinColumn(nullable=false)
     */
    private $athlete;

    /**
     * @ORM\ManyToOne(targetEntity=stat::class, inversedBy="aStats")
     * @ORM\JoinColumn(nullable=false)
     */
    private $stat;

    /**
     * @ORM\Column(type="integer")
     */
    private $value;

    /**
     * @ORM\Column(type="integer")
     */
    private $progress;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAthlete(): ?athlete
    {
        return $this->athlete;
    }

    public function setAthlete(?athlete $athlete): self
    {
        $this->athlete = $athlete;

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

    public function getProgress(): ?int
    {
        return $this->progress;
    }

    public function setProgress(int $progress): self
    {
        $this->progress = $progress;

        return $this;
    }
}
