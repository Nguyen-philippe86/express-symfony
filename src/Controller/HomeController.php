<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(ProductRepository $productRepository): Response
    {
        $products = $productRepository->findAll();
        $productBestSeller = $productRepository->findByIsBestSeller(1);
        $productFeatured = $productRepository->findByIsFeatured(1);
        $productSpecialOffers = $productRepository->findByIsSpecialOffer(1);
        $productNewArrival = $productRepository->findByIsNewArrival(1);

        return $this->render('home/index.html.twig', [
            'products' => $products,
            'productBestSeller' => $productBestSeller,
            'productFeatured' => $productFeatured,
            'productSpecialOffers' => $productSpecialOffers,
            'productNewArrival' => $productNewArrival,
        ]);
    }
}
