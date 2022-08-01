<?php

namespace App\DataFixtures;

use App\Entity\Shot;
use App\Repository\ShotRepository;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class ShotFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        /**
         * Default shot
         */
        $tabshot = [];
        $tabshot = [
        ["Couché", 1],
        ["Couché", 2],
        ["Debout", 1],
        ["Debout", 2],
        ];
        
        foreach ($tabshot as list($name, $number))
        {
            $shot = new Shot();
            $shot->setName($name);
            $shot->setNumber($number);
            $manager->persist($shot);
            //$this->addReference($shot->getName(), $shot);
        }
        unset($value, $tabshot, $shot);

        $manager->flush();
    }

    public function getOrder()
    {
        return 5;
    }
}
