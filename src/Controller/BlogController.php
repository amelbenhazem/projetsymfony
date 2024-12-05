<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request; // <-- Add this import
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{

    #[Route('/blog', name: 'app_blog')]
    public function index(Request $request)
    {
        // Get the current user (if logged in)
        $user = $this->getUser();

        // Get the cart data (this can be fetched from the session or a database)
        $cart = [
            'wishlist_count' => 5, // Example wishlist count
            'cart_count' => 3, // Example cart count
            'total_price' => 150.00, // Example total price
        ];

        // Get the current language
        $locale = $request->getLocale();

        // Render the template and pass data to it
        return $this->render('blog/index.html.twig', [
            'user' => $user,
            'cart' => $cart,
            'locale' => $locale,
        ]);
    }


    #[Route('/switch-language/{lang}', name: 'switch_language')]

    public function switchLanguage(Request $request, $lang)
    {
        // Set the locale for the session
        $request->getSession()->set('_locale', $lang);

        // Redirect to the previous page
        return $this->redirect($request->headers->get('referer'));
    }
}
