<?php

namespace App\DataFixtures;

use App\Entity\Stat;
use App\Entity\AStat;
use App\Entity\SStat;
use App\Entity\ZStat;
use App\Repository\StatRepository;
use App\Repository\AthleteRepository;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class StatFixtures extends Fixture implements OrderedFixtureInterface
{

    private $ema;

    function __construct(?AthleteRepository $ema)
    {
        $this->ema = $ema;
    }

    public function load(ObjectManager $manager)
    {
        /**
         * Default stats
         */
        $tabstat = [];
        $tabstat = [
            ["plaine", "pla"],
            ["montagne", "mon"],
            ["descente", "des"],
            ["précision", "pre"],
            ["tir couché", "tco"],
            ["tir debout", "tde"],
            ["forme", "for"],

        ];

        // On crée les stats
        foreach ($tabstat as list($a, $b)) {
            $stat = new Stat();
            $stat->setName($a);
            $stat->setSurname($b);
            $manager->persist($stat);
            $this->addReference($stat->getSurname(), $stat);
            $tabObjStat[] = $stat;
        }

        // On ajoute des AStats
        $athletes = $this->ema->findall();

        foreach ($tabObjStat as $objStat) {
            foreach ($athletes as $athlete) {
                $astat = new AStat();


                // Valeur des AStats
                //$alea = rand(500, 800);
                $alea = 500;


                $astat->setAthlete($athlete)
                    ->setStat($objStat)
                    ->setValue($alea)
                    ->setProgress(0);
                $manager->persist($astat);
            }
        }

        // On ajoute des SStats
        $tabsstat = [];
        $tabsstat = [
            ["couche", "pre", 1],
            ["couche", "tco", 2],
            ["debout", "pre", 1],
            ["debout", "tde", 2],
        ];

        foreach ($tabsstat as list($varshot, $varstat, $value)) {
            $sstat = new SStat();

            $sstat->setShot($this->getReference($varshot));
            $sstat->setStat($this->getReference($varstat));
            $sstat->setValue($value);
            $manager->persist($sstat);
        }

        // On ajoute des ZStats
        $tabzstat = [];
        $tabzstat = [
            ["Plaine", "pla", +200],
            ["Plaine", "for", -200],

            ["Montagne", "mon", +200],
            ["Montagne", "for", -300],

            ["Descente", "des", +200],
            ["Descente", "for", -100],

            ["Mont", "pla", +100],
            ["Mont", "mon", +100],
            ["Mont", "for", -200],

            ["Vallée", "pla", +100],
            ["Vallée", "des", +100],
            ["Vallée", "for", -200],
        ];

        foreach ($tabzstat as list($varzone, $varstat, $value)) {
            $zstat = new ZStat();

            $zstat->setZone($this->getReference($varzone));
            $zstat->setStat($this->getReference($varstat));
            $zstat->setValue($value);
            $manager->persist($zstat);
        }



        // On nettoie tout
        unset($tabstat, $stat, $tabObjStat);

        $manager->flush();
    }

    public function getOrder()
    {
        return 14;
    }
}
