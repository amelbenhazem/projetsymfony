<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;


class CheckoutController extends AbstractController
{

    #[Route('/checkout', name: 'app_checkout')]

    public function index(Request $request): Response
    {
        return $this->render('checkout/index.html.twig', [
            'controller_name' => 'CheckoutController',
        ]);
    }


    #[Route('/checkout/process', name: 'checkout_process')]

    public function processCheckout(Request $request): Response
    {
        // Process form data here
        $firstName = $request->get('first_name');
        $lastName = $request->get('last_name');
        $address = $request->get('address');
        // ... more fields

        // After processing, you can redirect or show a confirmation page
        return $this->redirectToRoute('order_confirmation');
    }


    #[Route('/order/confirmation', name: 'order_confirmation')]

    public function orderConfirmation(): Response
    {
        return $this->render('checkout/order_confirmation.html.twig');
    }
}
