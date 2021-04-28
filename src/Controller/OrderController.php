<?php

namespace App\Controller;

use App\Classe\Cart;
use App\Form\OrderType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class OrderController extends AbstractController
{
    /**
     * @Route("/commande", name="order")
     */
    public function index(Cart $cart, Request $request)
    {
        if (!$this->getUser()->getAddresses()->getValues())
        {
            return $this->redirectToRoute('add_address');
        }

        $form = $this->createForm(OrderType::class, null, [
            'user' => $this->getUser()
        ]);
        
        return $this->render('order/index.html.twig', [
            'form' => $form->createView(),
            'cart' => $cart->getFull() 
        ]);
    }

    /**
     * @Route("/commande/recapitulatif", name="order_recap")
     */
    public function add(Cart $cart, Request $request)
    {
       

        $form = $this->createForm(OrderType::class, null, [
            'user' => $this->getUser()
        ]);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            dd($form->getData());
            // $user = $form->getData();
            // $password = $encoder->encodePassword($user, $user->getPassword());
            // $user->setPassword($password);
            // $this->entityManager->persist($user);
            // $this->entityManager->flush();
            // return $this->redirectToRoute("account");
        }
        return $this->render('order/index.html.twig', [
           
            'cart' => $cart->getFull() 
        ]);
    }
}
