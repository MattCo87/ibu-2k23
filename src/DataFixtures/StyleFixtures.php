<?php

namespace App\DataFixtures;

use App\Entity\Style;
use App\Repository\StyleRepository;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class StyleFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        /**
         * Default style
         */
        $tabstyle = [];
        $tabstyle = [
            "Individuel",
            "Sprint", 
            "Poursuite", 
            "Relais",
            "Mass Start",
        ];
        
        foreach ($tabstyle as &$value)
        {
            $style = new Style();
            $style->setName($value);
            $manager->persist($style);
            $this->addReference($style->getName(), $style);
        }
        unset($value, $tabstyle, $style);

        $manager->flush();
    }

    public function getOrder()
    {
        return 4;
    }
}
