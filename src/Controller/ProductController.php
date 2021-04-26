<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use App\Repository\ProductRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProductController extends AbstractController
{
    /**
     * @Route("/produits", name="produits")
     */
    public function index(ProductRepository $repository, CategoryRepository $categoryRepository)
    {
        $produits = $repository->findAll();
        
        $categories = $categoryRepository->findAll();
        
        return $this->render('product/prod.html.twig', [
            "produits" => $produits,
            "categories" => $categories,
            

        ]);
    }
}
