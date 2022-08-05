<?php

namespace App\Entity;

use App\Repository\StatRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StatRepository::class)
 */
class Stat
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $surname;

    /**
     * @ORM\OneToMany(targetEntity=ZStat::class, mappedBy="stat")
     */
    private $zStats;

    /**
     * @ORM\OneToMany(targetEntity=SStat::class, mappedBy="stat")
     */
    private $sStats;

    /**
     * @ORM\OneToMany(targetEntity=AStat::class, mappedBy="stat")
     */
    private $aStats;

    public function __construct()
    {
        $this->zStats = new ArrayCollection();
        $this->sStats = new ArrayCollection();
        $this->aStats = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSurname(): ?string
    {
        return $this->surname;
    }

    public function setSurname(string $surname): self
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * @return Collection<int, ZStat>
     */
    public function getZStats(): Collection
    {
        return $this->zStats;
    }

    public function addZStat(ZStat $zStat): self
    {
        if (!$this->zStats->contains($zStat)) {
            $this->zStats[] = $zStat;
            $zStat->setStat($this);
        }

        return $this;
    }

    public function removeZStat(ZStat $zStat): self
    {
        if ($this->zStats->removeElement($zStat)) {
            // set the owning side to null (unless already changed)
            if ($zStat->getStat() === $this) {
                $zStat->setStat(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, SStat>
     */
    public function getSStats(): Collection
    {
        return $this->sStats;
    }

    public function addSStat(SStat $sStat): self
    {
        if (!$this->sStats->contains($sStat)) {
            $this->sStats[] = $sStat;
            $sStat->setStat($this);
        }

        return $this;
    }

    public function removeSStat(SStat $sStat): self
    {
        if ($this->sStats->removeElement($sStat)) {
            // set the owning side to null (unless already changed)
            if ($sStat->getStat() === $this) {
                $sStat->setStat(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, AStat>
     */
    public function getAStats(): Collection
    {
        return $this->aStats;
    }

    public function addAStat(AStat $aStat): self
    {
        if (!$this->aStats->contains($aStat)) {
            $this->aStats[] = $aStat;
            $aStat->setStat($this);
        }

        return $this;
    }

    public function removeAStat(AStat $aStat): self
    {
        if ($this->aStats->removeElement($aStat)) {
            // set the owning side to null (unless already changed)
            if ($aStat->getStat() === $this) {
                $aStat->setStat(null);
            }
        }

        return $this;
    }
}
