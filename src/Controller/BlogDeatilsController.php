<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogDeatilsController extends AbstractController
{

    #[Route('/blog/deatils', name: 'app_blog_deatils')]

    public function index(): Response
    {
        // Example data to pass to the Twig template
        $pageTitle = "index Page";
        $languages = [
            ['code' => 'en', 'name' => 'English'],
            ['code' => 'fr', 'name' => 'French'],
            ['code' => 'es', 'name' => 'Spanish']
        ];
        $currentLanguage = 'en';
        $socialLinks = [
            'facebook' => 'https://facebook.com',
            'twitter' => 'https://twitter.com',
            'linkedin' => 'https://linkedin.com',
            'pinterest' => 'https://pinterest.com'
        ];
        $wishlistCount = 5;
        $cartCount = 3;
        $totalPrice = 120.00;
        $contactEmail = 'contact@domain.com';

        return $this->render('index/index.html.twig', [
            'page_title' => $pageTitle,
            'languages' => $languages,
            'current_language' => $currentLanguage,
            'social_links' => $socialLinks,
            'wishlist_count' => $wishlistCount,
            'cart_count' => $cartCount,
            'total_price' => $totalPrice,
            'contact_email' => $contactEmail
        ]);
    }
}
