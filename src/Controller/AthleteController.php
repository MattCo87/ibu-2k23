<?php

namespace App\Controller;

use App\Repository\AthleteRepository;
use App\Repository\UserRepository;
use App\Repository\AStatRepository;
use App\Entity\Athlete;
use App\Form\AthleteType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\HttpFoundation\Request;

class AthleteController extends AbstractController
{
    private $security;
    private $ema;
    private $emu;
    private $emss;

    public function __construct(Security $security, AthleteRepository $ema, UserRepository $emu, AStatRepository $emss)
    {
        $this->security = $security;
        $this->ema = $ema;
        $this->emu = $emu;
        $this->emss = $emss;
    }

    /**
     * @Route("/athlete/profil/{id}", name="app_athlete_profil")
     */
    public function AthleteProfil(Athlete $athlete): Response
    {
        $var_athlete = $this->ema->findOneBy(['id' => $athlete]);
        $var_stat = $this->emss->findBy(['athlete' => $var_athlete]);
        //dd($var_athlete->getId());
        //$var_result = $this->emrt->findBy(['athlete' => $var_athlete->getId()]);
        //dd($var_result);
        

        return $this->render('athlete/profil.html.twig', [
            'athlete' => $var_athlete,
            'stat' => $var_stat,
        ]);
    }

    /**
     * @Route("/athlete/list", name="app_athlete_choose")
     */
    public function ListProfil(Request $request): Response
    {
        $athletes = $this->ema->findAll();
        $message = '';

        $var_athlete = new Athlete();
        $form = $this->createForm(AthleteType::class, $var_athlete);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $athletes = $this->ema->findBy(['gender' => $form->getData()->getGender(), 'country' => $form->getData()->getCountry()]);

            if ($form->getData()->getGender()->getId() == '3') {
                $athletes = $this->ema->findBy(['country' => $form->getData()->getCountry()]);
            }

            if ($form->getData()->getCountry()->getId() == '1') {
                $athletes = $this->ema->findBy(['gender' => $form->getData()->getGender()]);
            }

            if (($form->getData()->getGender()->getId() == '3') && ($form->getData()->getCountry()->getId() == '1')) {
                $athletes = $this->ema->findAll();
            }

            if (empty($athletes)) {
                $message = "Pas d'athlète de cette catégorie";
            } else {
                if (count($athletes) > 1) {
                    $message = count($athletes) . " athlètes";
                }
            }
        }

        return $this->render('athlete/list.html.twig', [
            'athletes' => $athletes,
            'form' => $form->createView(),
            'message' => $message,
        ]);
    }

    /**
     * @Route("/athlete/select/{id}", name="app_athlete_select")
     */
    public function SelectProfil(Athlete $athlete): Response
    {
        $var_athlete = $this->ema->find($athlete->getId());
        $user = $this->security->getUser()->getid();
        $test =$this->emu->addAthlete($user, $var_athlete);

        return $this->render('home/index.html.twig', []);
    }
}
