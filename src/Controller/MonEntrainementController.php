<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


use App\Repository\UserParticipationRepository;
use App\Repository\UserRepository;
use App\Entity\User;

class MonEntrainementController extends AbstractController
{
    /**
     * @Route("/profile/entrainement", name="mon_entrainement")
     */

    public function index(UserParticipationRepository $userParticipationRepository): Response
    {    
        

        return $this->render('mon_entrainement/index.html.twig', [
            'myentrainements' => $userParticipationRepository->findAll(),
        ]);
    }

    /**
     * @Route("/profile/entrainement/{id}", name="user_participation_show", methods={"GET"})
     */
    public function showParticipation()
    {

    }

}
