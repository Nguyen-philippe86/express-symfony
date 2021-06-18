<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class CartController extends AbstractController
{
    private $session;
    private $entityManager;

    public function __construct(SessionInterface $session, EntityManagerInterface $entityManager)
    {
        $this->session = $session;
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/cart", name="cart")
     */
    public function index()
    {
        $cart = $this->session->get('cart');
    }

    /**
     * @Route("/cart/add/{id}", name="cart_add")
     *
     * @param mixed $id
     */
    public function add($id): Response
    {
        $cart = $this->session->get('cart');
        if (!empty($cart[$id])) {
            ++$cart[$id];
        } else {
            $cart[$id] = 1;
        }
        $this->session->set('cart', $cart);
        dd($cart);

        return $this->render('cart/cart.html.twig', []);
    }

    /**
     * @Route("/cart/remove", name="cart_remove")
     */
    public function remove()
    {
        return $this->session->remove('cart');
    }
}
