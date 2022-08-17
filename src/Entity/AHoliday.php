<?php

namespace App\Entity;

use App\Repository\AHolidayRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AHolidayRepository::class)
 */
class AHoliday
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=athlete::class, inversedBy="aHolidays")
     * @ORM\JoinColumn(nullable=false)
     */
    private $athlete;

    /**
     * @ORM\ManyToOne(targetEntity=holiday::class, inversedBy="aHolidays")
     * @ORM\JoinColumn(nullable=false)
     */
    private $holiday;

    /**
     * @ORM\Column(type="integer")
     */
    private $number;

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

    public function getHoliday(): ?holiday
    {
        return $this->holiday;
    }

    public function setHoliday(?holiday $holiday): self
    {
        $this->holiday = $holiday;

        return $this;
    }

    public function getNumber(): ?int
    {
        return $this->number;
    }

    public function setNumber(int $number): self
    {
        $this->number = $number;

        return $this;
    }
}
