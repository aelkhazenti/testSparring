<?php

namespace App\Controller;

use App\Entity\Entrainement;
use App\Entity\UserParticipation;
use App\Form\UserParticipationType;
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
        return $this->render('user_participation/index.html.twig', [
            'user_participations' => $userParticipationRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="user_participation_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $userParticipation = new UserParticipation();
        $form = $this->createForm(UserParticipationType::class, $userParticipation);
        $form->handleRequest($request);

        $userid = $this->getUser();
        

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($userParticipation);

            $userParticipation->setIDUser($userid);
            $userParticipation->setIDUser($userid);
            
            $entityManager->flush();

            return $this->redirectToRoute('user_participation_index');
        }

        return $this->render('user_participation/new.html.twig', [
            'user_participation' => $userParticipation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="user_participation_show", methods={"GET"})
     */
    public function show(UserParticipation $userParticipation): Response
    {
        return $this->render('user_participation/show.html.twig', [
            'user_participation' => $userParticipation,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="user_participation_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, UserParticipation $userParticipation): Response
    {
        $form = $this->createForm(UserParticipationType::class, $userParticipation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('user_participation_index');
        }

        return $this->render('user_participation/edit.html.twig', [
            'user_participation' => $userParticipation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="user_participation_delete", methods={"DELETE"})
     */
    public function delete(Request $request, UserParticipation $userParticipation): Response
    {
        if ($this->isCsrfTokenValid('delete'.$userParticipation->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($userParticipation);
            $entityManager->flush();
        }

        return $this->redirectToRoute('user_participation_index');
    }
}
