<?php

namespace App\Controller;

use App\Entity\Run;
use App\Repository\RunRepository;
use phpDocumentor\Reflection\Types\Null_;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
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
}
