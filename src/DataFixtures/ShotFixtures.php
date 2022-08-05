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
            ["couche", "images/way/couche.png"],
            ["debout", "images/way/debout.png"],
        ];
        
        foreach ($tabshot as list($a, $b))
        {
            $shot = new Shot();
            $shot->setName($a);
            $shot->setWay($b);
            $manager->persist($shot);
            $this->addReference($shot->getName(), $shot);
        }
        unset($value, $tabshot, $shot);

        $manager->flush();
    }

    public function getOrder()
    {
        return 5;
    }
}
