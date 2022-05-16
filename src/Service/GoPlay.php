<?php

namespace App\Service;

use App\Entity\User;
use App\Entity\Run;
use App\Repository\ShotRepository;
use App\Repository\ZoneRepository;
use App\Repository\ResultRepository;
use App\Repository\AthleteRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;

class GoPlay extends ServiceEntityRepository
{
    private $ems;
    private $emz;
    private $emrt;
    private $ema;
    private $manager;

    function __construct(?AthleteRepository $ema, ?ShotRepository $ems, ?ZoneRepository $emz, ?ResultRepository $emrt, EntityManagerInterface $manager)
    {
        $this->ems = $ems;
        $this->emz = $emz;
        $this->emrt = $emrt;
        $this->ema = $ema;
        $this->manager = $manager;
    }


    public function GoGame(Run $run, User $user)
    {

        // On récupére la compétition
        $competition = $run->getCompetition();

        // On récupére tous les athletes
        $athletes = $this->ema->findby(['gender' => $competition->getGender()]);

        foreach ($athletes as $athlete) {
            // On test l'individuel 20km homme ou l'individuel 15km femme

            if (($competition->getId() == 6) || ($competition->getId() == 1)) {

                // Temps total du run
                $timeCumul = 0;
                // Nombre de pénalité total
                $stepPenalty = 0;
                // g représente le tour actuel du tir et du ski
                $g = 1;
                // Tableau des tirs réussis, couché et debout
                $shotsuccess = [0, 0];
                // Tableau des tirs tentés, couché et debout
                $shottotal = [0, 0];
                // Temps passé à skier
                $timeski = 0;
                // Temps passé sur le pas de tir
                $timeshot = 0;
                // Total des pénalités attribuées par le run
                $timepenalite = 0;
                // Classement final du run
                $position = 0;


                /************************************************************************************************************** 
                 *                              ZONE 1
                 ***************************************************************************************************************/

                // On définit une vitesse au hasard entre 40 et 48km/h
                $aleaVitesse = rand(40 * 100, 48 * 100) / 100;

                // On définit la vitesse de la zone en seconde
                $vitesseZone = number_format((((intval($competition->getStepDistance())) * 60) / $aleaVitesse), 3);
                $tempsZone = $vitesseZone * 60;

                // Un peu d'affichage pour le beau
                $timeski = $timeski + $tempsZone;
                $timeCumul = $tempsZone;

                /******************************************************************************************************************* */

                for ($i = 1; $i <= 2; $i++) {
                    for ($j = 0; $j <= 1; $j++) {

                        /********************************************************************************************************** */
                        /*********************************************************************************************************** 
                         *                              ZONE TIR
                         ***********************************************************************************************************/

                        $aleaShot = rand(3, 5);
                        $shotsuccess[$j] = $shotsuccess[$j] + $aleaShot;
                        $shottotal[$j] = $shottotal[$j] + 5;

                        $z = 1;
                        $tempsPenalite = 0;
                        for ($h = $aleaShot; $h < 5; $h++) {
                            $stepPenalty++;

                            // On définit la vitesse de la pénalité
                            $vitessePenalite = 60;
                            $z++;
                            $tempsPenalite = $tempsPenalite + $vitessePenalite;
                        }

                        // On ajoute 30 sec sur le pas de tir
                        $timeCumul = $timeCumul + $tempsPenalite + 30;
                        $tempsZone = $tempsPenalite + 30;
                        $timeshot = $timeshot + 30;
                        $timepenalite = $timepenalite + $tempsPenalite;

                        $g++;
                        /*********************************************************************************************************** 
                         *                              ZONE SKI
                         ***********************************************************************************************************/

                        // On définit une vitesse au hasard entre 40 et 48km/h
                        $aleaVitesse = rand(40 * 100, 48 * 100) / 100;

                        // On définit la vitesse de la zone en seconde
                        $vitesseZone = number_format((((intval($competition->getStepDistance())) * 60) / $aleaVitesse), 3);
                        $tempsZone = $vitesseZone * 60;

                        // Un peu d'affichage pour le beau
                        $timeski = $timeski + $tempsZone;
                        $timeCumul = $timeCumul + $tempsZone;

                        /***************************************************************************************************************************** */
                        /******************************************************************************************************************************
                    /***************************************************************************************************************************** */
                    }
                }
            }

            $this->manager->flush();

            $finalRuns[] = [
                'timerun' => $timeCumul,
                'run' => $run,
                'athlete' => $athlete,
                'penalite' => $stepPenalty,
                'timepenalite' => $timepenalite,
                'shotsuccessc' => $shotsuccess[0],
                'shotsuccessd' => $shotsuccess[1],
                'shottotalc' => $shottotal[0],
                'shottotald' => $shottotal[1],
                'timeshot' => $timeshot,
                'timeski' => $timeski,
            ];
        }

        // On trie le tableau par ordre croissant du temps final par athlete
        asort($finalRuns);

        foreach($finalRuns as $raw){
            $position++;
            $temp_Position = strval($position);
            $temp_Result = $this->emrt->addResult($raw, $temp_Position);
            $this->manager->persist($temp_Result);
        }
        $this->manager->flush();

        return $finalRuns;
    }
}
