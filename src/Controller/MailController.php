<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class MailController extends AbstractController
{

/**
 * @Route("/email")
 */
    public function sendMail(MailerInterface $mail){
        
        $email = (new Email())
        ->from('symtest957@gmail.com')
        ->to('aymanefhftvf@gmail.com')
        ->subject('new entrainement')
        ->html('<p>new entrainement a ete ajouter :) bonne journee</p>');

        $mail->send($email);

        return new Response('mail est envoye :) :) ');

    }

    /**
     * @Route("/mail", name="mail")
     */
    public function index(): Response
    {
        return $this->render('mail/index.html.twig', [
            'controller_name' => 'MailController',
        ]);
    }



}
