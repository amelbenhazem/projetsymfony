<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ShopDetailsController extends AbstractController
{

    #[Route('/shop/details', name: 'app_shop_details')]

    public function index(): Response
    {
        return $this->render('shop_details/index.html.twig', [
            'controller_name' => 'ShopDetailsController',
        ]);
    }

    // In your controller method
public function showProduct($id)
{
    $product = $this->getDoctrine()->getRepository(Product::class)->find($id);
    $relatedProducts = $this->getDoctrine()->getRepository(Product::class)->findRelatedProducts($id);

    return $this->render('product/show.html.twig', [
        'product' => $product,
        'related_products' => $relatedProducts
    ]);
}

}
