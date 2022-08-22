<?php

namespace App\DataFixtures;

use App\Entity\Zone;
use App\Repository\ZoneRepository;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class ZoneFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        /**
         * Default zone
         */
        $tabzone = [];
        $tabzone = [
            ["Plaine", "images/way/plaine.png", 1000],
            ["Montagne", "images/way/montagne.png", 2000],
            ["Descente", "images/way/descente.png", 1000],
            ["Mont",  "images/way/mont.png", 1500],
            ["Vallée", "images/way/vallee.png", 1750],
        ];

        foreach ($tabzone as list($a, $b, $c)) {
            $zone = new Zone();
            $zone->setName($a);
            $zone->setWay($b);
            $zone->setPrice($c);
            $manager->persist($zone);
            $this->addReference($zone->getName(), $zone);
        }
        unset($value, $tabzone, $zone);

        $manager->flush();
    }

    public function getOrder()
    {
        return 6;
    }
}
