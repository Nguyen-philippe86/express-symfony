<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CGUController extends AbstractController
{
    /**
     * @Route("/conditions-generales-utilisation", name="cgu_condition")
     */
    public function index(): Response
    {
        return $this->render('cgu/cgu.html.twig');
    }
}
