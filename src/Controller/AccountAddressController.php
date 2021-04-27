<?php

namespace App\Controller;

use App\Entity\Address;
use App\Form\AddressType;
use App\Repository\AddressRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AccountAddressController extends AbstractController
{
    private $entityManager;
    public function __construct(EntityManagerInterface $entityManger)
    {
        $this->entityManager = $entityManger;
    }
    /**
     * @Route("/compte/adresses", name="account_address")
     */
    public function index(AddressRepository $repository)
    {
        $addresses = $repository->findAll();
        return $this->render('account/address.html.twig' , [
            "addresses" => $addresses,
        ]);
    }

    /**
     * @Route("/compte/ajouter-une-adresse", name="add_address")
     */
    public function add(Request $request)
    {
        $address = new Address();
        $form = $this->createForm(AddressType::class, $address);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $address->setUser($this->getUser());
            $this->entityManager->persist($address);
            $this->entityManager->flush();
            return $this->redirectToRoute('account_address');
            
        }
        return $this->render('account/address_form.html.twig', [
            'form' => $form->createView()
        ]);

    }


    /**
     * @Route("/compte/modifier-une-adresse/{id}", name="account_address_edit")
     */
    public function edit(Request $request, $id)
    {
        $address = $this->entityManager->getRepository(Address::class)->findOneById($id);
        if (!$address || $address->getUser() !=$this->getUser()) {
            return$this->redirectToRoute('account_address');
        }
        $form = $this->createForm(AddressType::class, $address);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
           
           
            $this->entityManager->flush();
            return $this->redirectToRoute('account_address');
            
        }
        return $this->render('account/address_form.html.twig', [
            'form' => $form->createView()
        ]);

    }

    /**
     * @Route("/compte/supprimer-une-adresse/{id}", name="account_address_delete")
     */
    public function delete( $id)
    {
        $address = $this->entityManager->getRepository(Address::class)->findOneById($id);

        if ($address && $address->getUser() ==$this->getUser()) {

            $this->entityManager->remove($address);
            $this->entityManager->flush();
        }

            return $this->redirectToRoute('account_address');
            
        }


    
}
