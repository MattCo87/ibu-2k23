<?php

namespace App\Controller;

use App\Repository\RunRepository;
use App\Repository\CompetitionRepository;
use App\Repository\PointRepository;
use App\Entity\Run;
use App\Entity\User;
use App\Entity\ZStat;
use App\Repository\ShotRepository;
use App\Repository\ZoneRepository;
use App\Repository\SStatRepository;
use App\Repository\ZStatRepository;
use App\Repository\AthleteRepository;
use App\Service;
use App\Service\GoPlay;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Query\Expr\GroupBy;

class PlayController extends AbstractController
{
    private $security;
    private $emr;
    private $emp;
    private $ems;
    private $emz;
    private $emss;
    private $emzs;
    private $ema;
    private $emc;

    public function __construct(SStatrepository $emss, ZStatrepository $emzs, Security $security, PointRepository $emp, RunRepository $emr, CompetitionRepository $emc, AthleteRepository $ema, ShotRepository $ems, ZoneRepository $emz, EntityManagerInterface $manager)
    {
        $this->security = $security;
        $this->emr = $emr;
        $this->ems = $ems;
        $this->emz = $emz;
        $this->emss = $emss;
        $this->emzs = $emzs;
        $this->ema = $ema;
        $this->emc = $emc;
        $this->emp = $emp;
        $this->manager = $manager;
    }

    /**
     * @Route("/play/{id}", name="app_play")
     */

    public function consult(Run $run): Response
    {
        $run = $this->emr->find($run->getId());
        $shotNumber = intval($run->getCompetition()->getShotNumber());

        return $this->render('play/index.html.twig', [
            'run' => $run,
            'shotNumber' => $shotNumber,
            'user' => $this->security->getUser(),
        ]);
    }

    /**
     * @Route("/training", name="app_training")
     */

    public function train(): Response
    {
        $varzone = $this->emz->findall();
        $varshot = $this->ems->findall();

        return $this->render('play/training.html.twig', [
            'zone' => $varzone,
            'shot' => $varshot,
        ]);
    }

    /**
     * @Route("/trainingOK", name="app_training_OK")
     */

    public function trainOK(): Response
    {

        return $this->render('home/index.html.twig', [

        ]);
    }

















    /**
     * @Route("/zone/{id}", name="app_gozone")
     */

    public function gozone($id): Response
    {
        $step = $this->emz->find($id);
        $userAthlete = $this->security->getUser()->getAthlete();

        //dd($userAthlete);
        return $this->render('play/zone.html.twig', [
            'step' => $step,
            'athlete' => $userAthlete,
        ]);
    }


    /**
     * @Route("/shot/{id}", name="app_goshot")
     */

    public function goshot($id): Response
    {
        $step = $this->ems->find($id);
        $userAthlete = $this->security->getUser()->getAthlete();

        return $this->render('play/shot.html.twig', [
            'step' => $step,
            'athlete' => $userAthlete,
        ]);
    }


    /**
     * @Route("/game/{id}", name="app_play_game")
     */

    public function PlayGame(Run $run): Response
    {
        /*
        $play = new GoPlay($this->emp,$this->emr, $this->ema, $this->emc, $this->ems, $this->emz, $this->emrt, $this->manager);
        $run = $this->emr->find($run->getId());

        $result = $play->GoGame($run, $this->security->getUser());
        //dd($result);
        */
        return $this->render('play/game.html.twig', [
            /*    'result' => $result,
            'run' => $run,
            'user' => $this->security->getUser(), */]);
    }
}
