<?php

namespace App\Service;

use App\Entity\User;
use App\Entity\Run;
use App\Repository\RunRepository;
use App\Repository\PointRepository;
use App\Repository\ShotRepository;
use App\Repository\HolidayRepository;
use App\Repository\CompetitionRepository;
use App\Repository\ZoneRepository;
use App\Repository\AthleteRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;

class GoPlay extends ServiceEntityRepository
{
    private $ems;
    private $emz;
    private $ema;
    private $emc;
    private $emr;
    private $emh;
    private $emp;
    private $manager;

    function __construct(?HolidayRepository $emh, ?PointRepository $emp, ?RunRepository $emr, ?AthleteRepository $ema, ?CompetitionRepository $emc, ?ShotRepository $ems, ?ZoneRepository $emz, EntityManagerInterface $manager)
    {
        $this->ems = $ems;
        $this->emz = $emz;
        $this->ema = $ema;
        $this->emc = $emc;
        $this->emr = $emr;
        $this->emp = $emp;
        $this->emh = $emh;
        $this->manager = $manager;
    }



    /*************************************************************************************************************************** */
    public function PlayGame($idCompetition, $athletes, $run)
    {
        // On test l'individuel 20km homme ou l'individuel 15km femme
        if (($idCompetition == 6) || ($idCompetition == 1)) {

            // Temps total du run
            $timeCumul = 0;
            // Nombre de pénalité total
            $stepPenalty = 0;
            // g représente le tour actuel du tir et du ski
            $g = 1;
            // Compétition
            $var_competition = $this->emc->findBy(['id' => $idCompetition]);

            /************************************************************************************************************** 
             *                              ZONE 1
             ***************************************************************************************************************/
            $z = 0;
            foreach ($athletes as $athlete) {
                $z++;

                // Pour chaque athléte, on enregistre sa vitesse
                // On définit une vitesse au hasard entre 40 et 48km/h
                $aleaVitesse = rand(40 * 100, 48 * 100) / 100;

                // On définit la vitesse de la zone en seconde
                $speedZone = number_format((((intval($var_competition[0]->getStepDistance())) * 60) / $aleaVitesse), 3);
                $timeZone = $speedZone * 60;

                // On crée un tableau avec les temps des Athletes
                $finalRuns[$z]['timeCumul'] = $timeZone;
                $finalRuns[$z]['Athlete'] = $athlete;
                $finalRuns[$z]['Z1'] = $timeZone;

                //dd($finalRuns);
                $g = 1;
                for ($j = 1; $j < 3; $j++) {
                    for ($p = 0; $p < 2; $p++) {
                        $g++;
                        /********************************************************************************************************** */
                        /*********************************************************************************************************** 
                         *                              ZONE TIR
                         ***********************************************************************************************************/

                        // On définit un tir au hasard entre 3 et 5
                        $aleaShot = rand(3, 5);

                        // Temps perdu en seconde sur un tour de pénalité
                        $vitessePenalite = 60;
                        $stepPenalty = 5 - $aleaShot;
                        $tempsPenalite = $stepPenalty * $vitessePenalite;

                        // On ajoute 30 sec sur le pas de tir
                        $timeZone = $tempsPenalite + 30;
                        $timeCumul = $finalRuns[$z]['timeCumul'] + $timeZone;

                        if ($p == 0) {
                            $etiquette = "C" . $j;
                        } else {
                            $etiquette = "D" . $j;
                        }

                        $finalRuns[$z][$etiquette] = $timeZone;
                        $finalRuns[$z]['timeCumul'] = $timeCumul;
                        $etiquette3 = 'stepPenalty' . $j . $p;
                        $finalRuns[$z][$etiquette3] = $stepPenalty;
                        $etiquette4 = 'shot' . $j . $p;
                        $finalRuns[$z][$etiquette4] = $aleaShot;


                        /*********************************************************************************************************** 
                         *                              ZONE SKI
                         ***********************************************************************************************************/

                        // On définit une vitesse au hasard entre 40 et 48km/h
                        $aleaVitesse = rand(40 * 100, 48 * 100) / 100;

                        // On définit la vitesse de la zone en seconde
                        $vitesseZone = number_format((((intval($var_competition[0]->getStepDistance())) * 60) / $aleaVitesse), 3);
                        $tempsZone = $vitesseZone * 60;

                        $finalRuns[$z]['timeCumul'] = $finalRuns[$z]['timeCumul'] + $tempsZone;

                        $etiquette2 = "Z" . $g;
                        $finalRuns[$z][$etiquette2] = $tempsZone;
                    }
                }
            }
            asort($finalRuns);
            //dd($finalRuns);
            $o = 1;
            $TotalRun = [];
            foreach ($finalRuns as $runner) {
                $penality = $runner['stepPenalty10'] + $runner['stepPenalty11'] + $runner['stepPenalty20'] + $runner['stepPenalty21'];
                $shot0 = $runner['shot10'] + $runner['shot20'];
                $shot1 = $runner['shot11'] + $runner['shot21'];

                $TotalRun[$o] = [
                    'timerun' => $runner['timeCumul'],
                    'run' => $run,
                    'athlete' => $runner['Athlete'],
                    'penalite' => $penality,
                    'timepenalite' => $penality * 60,
                    'shotsuccessc' => $shot0,
                    'shotsuccessd' => $shot1,
                    'shottotalc' => 10,
                    'shottotald' => 10,
                    'timeshot' => 30 * 4,
                    'timeski' => $runner['Z1'] + $runner['Z2'] + $runner['Z3'] + $runner['Z4'] + $runner['Z5'],
                ];
                $o++;
            }
        }
        return $TotalRun;
    }
    //********************************************************************************************************************** */




    public function GoGame(Run $run, User $user)
    {
        // On récupére la compétition
        $competition = $run->getCompetition();

        // On désactive la compétition pour mettre le calendrier à jour ;)
        $run->setStepRun(false);

        // On récupére tous les athletes
        $athletes = $this->ema->findby(['gender' => $competition->getGender()]);

        // Classement final du run
        $position = 0;

        // On lance la fonction de jeu
        $finalRun = $this->PlayGame($competition->getId(), $athletes, $run);

        // On trie le tableau par ordre croissant du temps final par athlete
        asort($finalRun);

        // Pour chaque occurrence du tableau, on ajoute le résultat
        foreach ($finalRun as $raw) {
            $position++;
            $temp_Position = strval($position);
            $temp_Result = $this->emrt->addResult($raw, $temp_Position, $run);
            $this->manager->persist($temp_Result);
        }
        $this->manager->flush();

        return $finalRun;
    }


    public function GoStand($run, $sexe)
    {
        $competitionId = null;
        if ($run == 'Individuel') {
            if ($sexe == 1) {
                $competitionId = 6;
            } else {
                $competitionId = 1;
            }
        }

        // On récupére les compétitions demandées
        $competitions = $this->emr->findby(['competition' => $competitionId]);

        // On récupére tous les athletes
        $athletes = $this->ema->findby(['gender' => $sexe]);

        $classement = [];
        foreach ($athletes as $athlete) {
            $totalPoints = 0;
            $var_point = 0;
            $point = 0;
            $temp_point = 0;
            foreach ($competitions as $competition) {

                $result = $this->emrt->findby(['run' => $competition, 'athlete' => $athlete]);
                $var_point = intval($result[0]->getPositionRun());

                $totalPoints = $totalPoints + $var_point;
            }

            if ($totalPoints > 0) {
                array_push($classement, $athlete);
            }
        }
        //dd($classement);


        return $competitionId;
    }




    // Pour faire des entraînements

    public function GoTrain($exo)
    {
        if ($exo['Type'] == 'h') {
            $step = $this->emh->find($exo['Zone']);
        }
        if ($exo['Type'] == 's') {
            $step = $this->ems->find($exo['Zone']);
        }
        if ($exo['Type'] == 'z') {
            $step = $this->emz->find($exo['Zone']);
        }

        dd($exo, $step);


    }
}
