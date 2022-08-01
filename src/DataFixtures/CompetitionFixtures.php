<?php

namespace App\DataFixtures;

use App\Entity\Competition;
use App\Repository\CompetitionRepository;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class CompetitionFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        /**
         * Default competition
         */
        $tabcompetition = [];
        $tabcompetition = [
            ["Femme", "15 Km", "Individuel", 3, 5, 2],
            ["Femme", "7.5 Km", "Sprint", 2.5, 3, 1],
            ["Femme", "10 Km", "Poursuite", 2, 5, 2],
            ["Femme", "4 x 6 Km", "Relais", 0, 0, 0],
            ["Femme", "12.5 Km", "Mass Start", 2.5, 5, 2],
            ["Homme", "20 Km", "Individuel", 4, 5, 2],
            ["Homme", "10 Km", "Sprint", 3.3, 3, 1],
            ["Homme", "12.5 Km", "Poursuite", 2.5, 5, 2],
            ["Homme", "4 X 7.5 Km", "Relais", 0, 0, 0],
            ["Homme", "15 Km", "Mass Start", 3, 5, 2],
            ["Mixte", "4 X 7.5 Km", "Relais", 0, 0, 0],
            ["Mixte", "Simple", "Relais", 0, 0, 0],
        ];
        $i = 1;
        
        foreach ($tabcompetition as list($gender, $name, $style, $stepDistance, $stepNumber, $shotNumber)) {
            $competition = new Competition();
            $competition
                ->setGender($this->getReference($gender))
                ->setnameCompetition($name)
                ->setStyle($this->getReference($style))
                ->setStepDistance($stepDistance)
                ->setStepNumber($stepNumber)
                ->setShotNumber($shotNumber);
            $manager->persist($competition);
            $this->addReference("Competition" . $i, $competition);
            $i++;
        }
        unset($tabcompetition, $competition, $gender, $name, $style, $i);

        $manager->flush();
    }

    public function getOrder()
    {
        return 8;
    }
}
