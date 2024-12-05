<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ShopingCartController extends AbstractController
{

    #[Route('/shoping/cart', name: 'app_shoping_cart')]

    public function index(): Response
    {
        return $this->render('shoping_cart/index.html.twig', [
            'controller_name' => 'ShopingCartController',
        ]);
    }
}
