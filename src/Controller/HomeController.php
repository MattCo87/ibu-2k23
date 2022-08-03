<?php

namespace App\Controller;

use App\Repository\CompetitionRepository;
use App\Repository\ShotRepository;
use App\Repository\ZoneRepository;
use App\Repository\AthleteRepository;
use Doctrine\ORM\EntityManagerInterface;


use App\Repository\RunRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\HttpFoundation\Request;
use App\Service\GoPlay;

class HomeController extends AbstractController
{
    private $security;
    private $emr;
    private $emp;
    private $ems;
    private $emz;
    private $ema;
    private $emc;

    public function __construct(Security $security, RunRepository $emr, CompetitionRepository $emc, AthleteRepository $ema, ShotRepository $ems, ZoneRepository $emz, EntityManagerInterface $manager)
    {
        $this->security = $security;
        $this->emr = $emr;
        $this->ems = $ems;
        $this->emz = $emz;
        $this->ema = $ema;
        $this->emc = $emc;
        $this->manager = $manager;
    }

    /**
     * @Route("/home", name="app_home")
     */
    public function index(): Response
    {
        return $this->render('home/index.html.twig', []);
    }

    /**
     * @Route("/calendar", name="app_calendar")
     */
    public function CalendarIndex(RunRepository $runs): Response
    {
        $calendar = $runs->findAll();

        //dd($calendar);
        return $this->render('home/calendar.html.twig', [
            'calendar' => $calendar,
        ]);
    }

    /**
     * @Route("/classement/{action}", name="app_classement")
     */
    public function ClassementIndex(Request $request): Response
    {
        /*
        $play = new GoPlay($this->emp, $this->emr, $this->ema, $this->emc, $this->ems, $this->emz, $this->manager);
        $standing = $play->GoStand($idOnglet['action'], $this->security->getUser()->getAthlete()->getGender()->getId());
*/
        $idOnglet = $request->attributes->all();
        $Onglet = $idOnglet['action'] . " " . $this->security->getUser()->getAthlete()->getGender()->getName();
        $standing = '';

        return $this->render('home/classement.html.twig', [
            'idOnglet' => $Onglet,
            'standing' => $standing,
        ]);
    }
}
