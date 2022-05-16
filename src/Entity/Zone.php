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
     * @ORM\OneToMany(targetEntity=Run::class, mappedBy="zone")
     */
    private $runs;

    /**
     * @ORM\ManyToMany(targetEntity=stage::class, inversedBy="zones")
     */
    private $stage;

    /**
     * @ORM\ManyToMany(targetEntity=Stage::class, mappedBy="zone")
     */
    private $stages;

    public function __construct()
    {
        $this->runs = new ArrayCollection();
        $this->stage = new ArrayCollection();
        $this->stages = new ArrayCollection();
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
            $run->setZone($this);
        }

        return $this;
    }

    public function removeRun(Run $run): self
    {
        if ($this->runs->removeElement($run)) {
            // set the owning side to null (unless already changed)
            if ($run->getZone() === $this) {
                $run->setZone(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, stage>
     */
    public function getStage(): Collection
    {
        return $this->stage;
    }

    public function addStage(stage $stage): self
    {
        if (!$this->stage->contains($stage)) {
            $this->stage[] = $stage;
        }

        return $this;
    }

    public function removeStage(stage $stage): self
    {
        $this->stage->removeElement($stage);

        return $this;
    }

    /**
     * @return Collection<int, Stage>
     */
    public function getStages(): Collection
    {
        return $this->stages;
    }
}
