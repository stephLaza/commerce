<?php

namespace App\Controller;

use App\Form\ReservationType;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ReservationController extends AbstractController
{
    /**
     * @Route("/compte/reservation", name="reservation")
     */
    public function index(Request $request, MailerInterface $mailer)
    {
        $formContact = $this->createForm(ReservationType::class, null);
        $formContact->handleRequest($request);

        $data = $formContact->getData();

        if ($formContact->isSubmitted() && $formContact->isValid()) {
            // on stock le formulaire dans un tableau


            $email = (new TemplatedEmail())
                ->from('hello@example.com')
                ->to('ae.stepbyone@gmail.com')
                ->cc('lazare.stephane@gmail.com')
                //->bcc('bcc@example.com')
                //->replyTo('fabien@example.com')
                //->priority(Email::PRIORITY_HIGH)
                ->subject('Restaurante: demande de reservation')

                // ->embed(fopen('../public//images/logoCEFii-white.png', 'r'), 'logo.png')
                // ->text(
                //     $data->getNom(). ' ' .
                //     $data->getPrenom().' ' .
                //     $data->getMessage()
                // )
                // ->embedFromPath('../public//images/logoCEFii-white.png', 'footer-signature')
                ->htmlTemplate('email/reservation.html.twig')
                ->context([
                    'nom' => $data['nom'],
                    'telephone' => $data['telephone'],
                    'mail' => $data['email'],
                    'date' => $data['date'],
                    'selection' => $data['selection'],
                    'personne' => $data['personne'],
                    'terrasse' => $data['terrasse'],
                    
                    'message' => $data['message'],

                ]);
            $formContact->get('valider')->getData();

            $mailer->send($email);
            // Ici nous enverrons le mail
            // $email = (new Email())
            // ->from('alepoutre@itroom.fr')
            // ->to('lazare.stephane@gmail.com')
            // //->cc('cc@example.com')
            // //->bcc('bcc@example.com')
            // //->replyTo('fabien@example.com')
            // //->priority(Email::PRIORITY_HIGH)
            // ->subject('Activation de compte sur mon appli !')
            // //->text('Sending emails is fun again!')
            // ->html('<p><a href="https://www2.itroom.fr/">Activation de compte</a></p>');
            // $mailerInterface->send($email);
            $this->addFlash('message', 'le message a bien été envoyé');
            // return $this->redirectToRoute('home');
        }
        return $this->render('reservation/index.html.twig', [
            'contactForm' => $formContact->createView(),
        ]);
    }
}
