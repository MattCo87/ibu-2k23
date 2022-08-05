<?php

namespace App\Entity;

use App\Repository\ShotRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ShotRepository::class)
 */
class Shot
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
     * @ORM\ManyToMany(targetEntity=Run::class, mappedBy="shot")
     */
    private $runs;

    /**
     * @ORM\OneToMany(targetEntity=AShot::class, mappedBy="shot")
     */
    private $aShots;

    /**
     * @ORM\OneToMany(targetEntity=SStat::class, mappedBy="shot")
     */
    private $sStats;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $way;

    public function __construct()
    {
        $this->runs = new ArrayCollection();
        $this->aShots = new ArrayCollection();
        $this->sStats = new ArrayCollection();
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
            $run->addShot($this);
        }

        return $this;
    }

    public function removeRun(Run $run): self
    {
        if ($this->runs->removeElement($run)) {
            $run->removeShot($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, AShot>
     */
    public function getAShots(): Collection
    {
        return $this->aShots;
    }

    public function addAShot(AShot $aShot): self
    {
        if (!$this->aShots->contains($aShot)) {
            $this->aShots[] = $aShot;
            $aShot->setShot($this);
        }

        return $this;
    }

    public function removeAShot(AShot $aShot): self
    {
        if ($this->aShots->removeElement($aShot)) {
            // set the owning side to null (unless already changed)
            if ($aShot->getShot() === $this) {
                $aShot->setShot(null);
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
            $sStat->setShot($this);
        }

        return $this;
    }

    public function removeSStat(SStat $sStat): self
    {
        if ($this->sStats->removeElement($sStat)) {
            // set the owning side to null (unless already changed)
            if ($sStat->getShot() === $this) {
                $sStat->setShot(null);
            }
        }

        return $this;
    }

    public function getWay(): ?string
    {
        return $this->way;
    }

    public function setWay(string $way): self
    {
        $this->way = $way;

        return $this;
    }
}
