<?php

namespace App\DataFixtures;

use App\Entity\Stage;
use App\Repository\StageRepository;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class StageFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        /**
         * Default stage
         */
        $tabstage = [];
        $tabstage = [
            ["Oestersund", "Suède"],
            ["Hochfilzen", "Autriche"], 
            ["Annecy-Le Grand Bornand", "France"], 
            ["Oberhof", "Allemagne"], 
            ["Ruhpolding", "Allemagne"], 
            ["Antholz-Anterselva", "Italie"], 
            ["Kontiolahti", "Finlande"], 
            ["Otepaeae", "Estonie"], 
            ["Oslo Holmenkollen", "Norvège"], 
        ];
        
        foreach ($tabstage as list($name, $country)) {
            $stage = new Stage();
            $stage->setName($name)
                ->setCountry($this->getReference($country));
            $manager->persist($stage);
            $this->addReference($stage->getName(), $stage);
        }
        unset($name, $tabstage, $stage, $country);

        $manager->flush();
    }

    public function getOrder()
    {
        return 3;
    }
}
