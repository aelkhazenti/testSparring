<?php

namespace App\Controller;

use App\Repository\UserParticipationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/user/participation")
 */
class UserParticipationController extends AbstractController
{
    /**
     * @Route("/", name="user_participation_index", methods={"GET"})
     */
    public function index(UserParticipationRepository $userParticipationRepository): Response
    {
        $userid=$this->getUser();

        return $this->render('mon_entrainement/index.html.twig', [
            'myentrainements' => $userParticipationRepository->getUserPartisipationByID($userid),
        ]);
    }

}
