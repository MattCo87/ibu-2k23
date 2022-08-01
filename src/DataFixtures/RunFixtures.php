<?php

namespace App\DataFixtures;

use App\Entity\Run;
use App\Repository\RunRepository;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class RunFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        /**
         * Default run
         */
        /*
            C1 ["Femme", "15 Km", "Individuel", 3, 5, 2],
            C2 ["Femme", "7.5 Km", "Sprint", 2.5, 3, 1],
            C3 ["Femme", "10 Km", "Poursuite", 2, 5, 2],
            C4 ["Femme", "4 x 6 Km", "Relais", 0, 0, 0],
            C5 ["Femme", "12.5 Km", "Mass Start", 2.5, 5, 2],
            C6 ["Homme", "20 Km", "Individuel", 4, 5, 2],
            C7 ["Homme", "10 Km", "Sprint", 3.3, 3, 1],
            C8 ["Homme", "12.5 Km", "Poursuite", 2.5, 5, 2],
            C9 ["Homme", "4 X 7.5 Km", "Relais", 0, 0, 0],
            C10 ["Homme", "15 Km", "Mass Start", 3, 5, 2],
            C11 ["Mixte", "4 X 7.5 Km", "Relais", 0, 0, 0],
            C12 ["Mixte", "Simple", "Relais", 0, 0, 0],
        */
        $tabrun = [];
        $tabrun = [
            ["Oestersund", "Competition1", "21-11-27", "11:45"],
            ["Oestersund", "Competition6", "21-11-27", "15:00"],
            ["Oestersund", "Competition2", "21-11-28", "11:00"],
            ["Oestersund", "Competition7", "21-11-28", "13:45"],

            ["Oestersund", "Competition2", "21-12-02", "13:45"],
            ["Oestersund", "Competition7", "21-12-02", "16:30"],
            ["Oestersund", "Competition3", "21-12-04", "13:00"],
            ["Oestersund", "Competition9", "21-12-04", "15:10"],
            ["Oestersund", "Competition4", "21-12-05", "12:35"],
            ["Oestersund", "Competition8", "21-12-05", "15:15"],

            ["Hochfilzen", "Competition7", "21-12-10", "11:25"],
            ["Hochfilzen", "Competition2", "21-12-10", "14:15"],
            ["Hochfilzen", "Competition8", "21-12-11", "12:15"],
            ["Hochfilzen", "Competition4", "21-12-11", "14:15"],
            ["Hochfilzen", "Competition9", "21-12-12", "11:45"],
            ["Hochfilzen", "Competition3", "21-12-12", "14:30"],           
            
            ["Annecy-Le Grand Bornand", "Competition2", "21-12-16", "14:15"],
            ["Annecy-Le Grand Bornand", "Competition7", "21-12-17", "14:15"],
            ["Annecy-Le Grand Bornand", "Competition3", "21-12-18", "13:00"],
            ["Annecy-Le Grand Bornand", "Competition8", "21-12-18", "15:00"],
            ["Annecy-Le Grand Bornand", "Competition5", "21-12-19", "12:45"],
            ["Annecy-Le Grand Bornand", "Competition10", "21-12-19", "14:45"],         
            
            ["Oberhof", "Competition7", "22-01-06", "14:15"],
            ["Oberhof", "Competition2", "22-01-07", "14:15"],
            ["Oberhof", "Competition11", "22-01-08", "12:15"],
            ["Oberhof", "Competition12", "22-01-08", "14:45"],
            ["Oberhof", "Competition8", "22-01-09", "12:30"],
            ["Oberhof", "Competition3", "22-01-09", "14:45"],   

            ["Ruhpolding", "Competition2", "22-01-12", "14:30"],
            ["Ruhpolding", "Competition7", "22-01-13", "14:30"],
            ["Ruhpolding", "Competition4", "22-01-14", "14:30"],
            ["Ruhpolding", "Competition9", "22-01-15", "14:30"],
            ["Ruhpolding", "Competition3", "22-01-16", "12:45"],
            ["Ruhpolding", "Competition8", "22-01-16", "14:45"],   

            ["Antholz-Anterselva", "Competition6", "22-01-20", "14:15"],
            ["Antholz-Anterselva", "Competition1", "22-01-21", "14:15"],
            ["Antholz-Anterselva", "Competition10", "22-01-22", "12:50"],
            ["Antholz-Anterselva", "Competition4", "22-01-22", "15:30"],
            ["Antholz-Anterselva", "Competition9", "22-01-23", "12:15"],
            ["Antholz-Anterselva", "Competition5", "22-01-23", "15:15"],   

            ["Kontiolahti", "Competition4", "22-03-03", "14:30"],
            ["Kontiolahti", "Competition9", "22-03-04", "14:30"],
            ["Kontiolahti", "Competition2", "22-03-05", "12:45"],
            ["Kontiolahti", "Competition7", "22-03-05", "15:30"],
            ["Kontiolahti", "Competition3", "22-03-06", "12:45"],
            ["Kontiolahti", "Competition8", "22-03-06", "14:40"], 

            ["Otepaeae", "Competition7", "22-03-10", "14:30"],
            ["Otepaeae", "Competition2", "22-03-11", "14:30"],
            ["Otepaeae", "Competition10", "22-03-12", "13:00"],
            ["Otepaeae", "Competition5", "22-03-12", "15:15"],
            ["Otepaeae", "Competition11", "22-03-13", "12:30"],
            ["Otepaeae", "Competition12", "22-03-13", "15:15"], 
            
            ["Oslo Holmenkollen", "Competition7", "22-03-17", "15:45"],
            ["Oslo Holmenkollen", "Competition2", "22-03-18", "15:45"],
            ["Oslo Holmenkollen", "Competition10", "22-03-19", "12:50"],
            ["Oslo Holmenkollen", "Competition5", "22-03-19", "15:00"],
            ["Oslo Holmenkollen", "Competition11", "22-03-20", "12:50"],
            ["Oslo Holmenkollen", "Competition12", "22-03-20", "15:00"],     
        ];
        
        foreach ($tabrun as list($stage, $competition, $dateRun, $hourRun)) {
            $run = new Run();
            $run
                ->setStage($this->getReference($stage))
                ->setCompetition($this->getReference($competition))
                ->setDateRun(new \DateTime($dateRun))
                ->setHourRun($hourRun)
                ->setStepRun(true);
            $manager->persist($run);
        }
        unset($tabrun, $competition, $stage, $dateRun, $run);

        $manager->flush();
    }

    public function getOrder()
    {
        return 9;
    }
}
