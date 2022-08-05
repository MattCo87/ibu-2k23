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
            ["Plaine", "images/way/plaine.png"],
            ["Montagne", "images/way/montagne.png"],
            ["Descente", "images/way/descente.png"],
            ["Mont",  "images/way/mont.png"],
            ["Vallée", "images/way/vallee.png"],
        ];
        
        foreach ($tabzone as list($a, $b))
        {
            $zone = new Zone();
            $zone->setName($a);
            $zone->setWay($b);
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
