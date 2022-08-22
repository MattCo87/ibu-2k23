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
            ["Chadebec", "images/way/chadebec.png", 1000],
            ["Isola", "images/way/isola.png", 2500],
            ["Megève", "images/way/megeve.png", 4000],
        ];
        
        foreach ($tabholiday as list($a, $b, $c))
        {
            $holiday = new Holiday();
            $holiday->setDescription($a);
            $holiday->setWay($b);
            $holiday->setPrice($c);
            $manager->persist($holiday);
            $this->addReference($holiday->getDescription(), $holiday);
        }
        unset($value, $tabholiday, $holiday);

        $manager->flush();
    }

    public function getOrder()
    {
        return 13;
    }
}
