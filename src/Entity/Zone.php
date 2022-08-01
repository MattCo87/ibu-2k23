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

    public function __construct()
    {
        $this->runs = new ArrayCollection();
        $this->aZones = new ArrayCollection();
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
}
