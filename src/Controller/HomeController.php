<?php

namespace App\Controller;

use App\Repository\ResultRepository;
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
    

    /**
     * @Route("/home", name="app_home")
     */
    public function index(): Response
    {
        return $this->render('home/index.html.twig', []);
    }
}
