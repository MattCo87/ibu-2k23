<?php

namespace App\DataFixtures;

use App\Entity\Gender;
use App\Repository\GenderRepository;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class GenderFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        /**
         * Default gender
         */
        $tabgender = [];
        $tabgender = [
            "Homme",
            "Femme", 
            "Mixte", 
        ];
        
        foreach ($tabgender as &$value)
        {
            $gender = new Gender();
            $gender->setName($value);
            $manager->persist($gender);
            $this->addReference($gender->getName(), $gender);
        }
        unset($value, $tabgender, $gender);

        $manager->flush();
    }

    public function getOrder()
    {
        return 2;
    }
}
