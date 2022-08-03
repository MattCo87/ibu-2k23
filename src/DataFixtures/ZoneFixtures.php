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
            "Plaine",
            "Montagne", 
            "Descente",
            "Mont", 
            "Vallée",
        ];
        
        foreach ($tabzone as &$value)
        {
            $zone = new Zone();
            $zone->setName($value);
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
