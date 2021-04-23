<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProductController extends AbstractController
{
    /**
     * @Route("/produits", name="produits")
     */
    public function index(ProductRepository $repository)
    {
        $produits = $repository->findAll();
        $entrees = $repository->findBy(
            array('category' => 1),
            array('price' => 'desc')
        );
        $salades = $repository->findBy(
            array('category' => 2),
            array('price' => 'desc')
        );
        $plats = $repository->findBy(
            array('category' => 3),
            array('price' => 'desc')
        );

        $desserts = $repository->findBy(
            array('category' => 4),
            array('price' => 'desc')
        );

        
        $catEntree = $repository->findBy(
            array('category' => 1),
            array('price' => 'desc'),
            1,
            0
        );
        $catSalade = $repository->findBy(
            array('category' => 2),
            array('price' => 'desc'),
            1,
            0
        );
        $catPlat = $repository->findBy(
            array('category' => 3),
            array('price' => 'desc'),
            1,
            0
        );
        $catDessert = $repository->findBy(
            array('category' => 4),
            array('price' => 'desc'),
            1,
            0
        );
        return $this->render('product/index.html.twig', [
            "produits" => $produits,
            "entrees" => $entrees,
            "salades" => $salades,
            "plats" => $plats,
            "desserts" => $desserts,
            "menus" => array($catSalade, $catEntree, $catPlat,$catDessert),

        ]);
    }
}
