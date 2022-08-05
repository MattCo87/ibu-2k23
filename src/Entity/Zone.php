<?php

namespace App\Entity;

use App\Repository\ZoneRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ZoneRepository::class)
 */
class Zone
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
     * @ORM\ManyToMany(targetEntity=Run::class, mappedBy="zone")
     */
    private $runs;

    /**
     * @ORM\OneToMany(targetEntity=AZone::class, mappedBy="zone")
     */
    private $aZones;

    /**
     * @ORM\OneToMany(targetEntity=ZStat::class, mappedBy="zone")
     */
    private $zStats;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $way;

    public function __construct()
    {
        $this->runs = new ArrayCollection();
        $this->aZones = new ArrayCollection();
        $this->zStats = new ArrayCollection();
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

    /**
     * @return Collection<int, Run>
     */
    public function getRuns(): Collection
    {
        return $this->runs;
    }

    public function addRun(Run $run): self
    {
        if (!$this->runs->contains($run)) {
            $this->runs[] = $run;
            $run->addZone($this);
        }

        return $this;
    }

    public function removeRun(Run $run): self
    {
        if ($this->runs->removeElement($run)) {
            $run->removeZone($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, AZone>
     */
    public function getAZones(): Collection
    {
        return $this->aZones;
    }

    public function addAZone(AZone $aZone): self
    {
        if (!$this->aZones->contains($aZone)) {
            $this->aZones[] = $aZone;
            $aZone->setZone($this);
        }

        return $this;
    }

    public function removeAZone(AZone $aZone): self
    {
        if ($this->aZones->removeElement($aZone)) {
            // set the owning side to null (unless already changed)
            if ($aZone->getZone() === $this) {
                $aZone->setZone(null);
            }
        }

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
            $zStat->setZone($this);
        }

        return $this;
    }

    public function removeZStat(ZStat $zStat): self
    {
        if ($this->zStats->removeElement($zStat)) {
            // set the owning side to null (unless already changed)
            if ($zStat->getZone() === $this) {
                $zStat->setZone(null);
            }
        }

        return $this;
    }

    public function getWay(): ?string
    {
        return $this->way;
    }

    public function setWay(?string $way): self
    {
        $this->way = $way;

        return $this;
    }
}
