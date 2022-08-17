<?php

namespace App\DataFixtures;

use App\Entity\Holiday;
use App\Repository\HolidayRepository;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class HolidayFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        /**
         * Default Holiday
         */
        $tabholiday = [];
        $tabholiday = [
            ["Chadebec", "images/way/chadebec.png"],
            ["Isola", "images/way/isola.png"],
            ["Megève", "images/way/megeve.png"],
        ];
        
        foreach ($tabholiday as list($a, $b))
        {
            $holiday = new Holiday();
            $holiday->setDescription($a);
            $holiday->setWay($b);
            $manager->persist($holiday);
            $this->addReference($holiday->getDescription(), $holiday);
        }
        unset($value, $tabholiday, $holiday);

        $manager->flush();
    }

    public function getOrder()
    {
        return 14;
    }
}
