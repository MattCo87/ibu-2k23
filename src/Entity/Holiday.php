<?php

namespace App\Entity;

use App\Repository\HolidayRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HolidayRepository::class)
 */
class Holiday
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $way;

    /**
     * @ORM\OneToMany(targetEntity=AHoliday::class, mappedBy="holiday")
     */
    private $aHolidays;

    /**
     * @ORM\Column(type="integer")
     */
    private $price;

    public function __construct()
    {
        $this->aHolidays = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

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

    /**
     * @return Collection<int, AHoliday>
     */
    public function getAHolidays(): Collection
    {
        return $this->aHolidays;
    }

    public function addAHoliday(AHoliday $aHoliday): self
    {
        if (!$this->aHolidays->contains($aHoliday)) {
            $this->aHolidays[] = $aHoliday;
            $aHoliday->setHoliday($this);
        }

        return $this;
    }

    public function removeAHoliday(AHoliday $aHoliday): self
    {
        if ($this->aHolidays->removeElement($aHoliday)) {
            // set the owning side to null (unless already changed)
            if ($aHoliday->getHoliday() === $this) {
                $aHoliday->setHoliday(null);
            }
        }

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }
}
