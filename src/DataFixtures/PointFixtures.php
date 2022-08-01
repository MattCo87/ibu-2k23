<?php

namespace App\DataFixtures;

use App\Entity\Point;
use App\Repository\PointRepository;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class PointFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        /**
         * Default points
         */
        $tabpoints = [];
        $tabpoints = [
            60, 54, 48, 43, 40,
            38, 36, 34, 32, 31,
            30, 29, 28, 27, 26,
            25, 24, 23, 22, 21,
            20, 19, 18, 17, 16,
            15, 14, 13, 12, 11,
            10, 9, 8, 7, 6,
            5, 4, 3, 2, 1, 
        ];
        
        foreach ($tabpoints as &$value)
        {
            $point = new Point();
            $point->setNumber($value);
            $manager->persist($point);
        }
        unset($value, $tabpoints, $point);

        $manager->flush();
    }

    public function getOrder()
    {
        return 12;
    }
}
