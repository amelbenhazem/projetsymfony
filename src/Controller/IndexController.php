<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ProduitRepository;

class IndexController extends AbstractController
{

    #[Route('/index', name: 'app_index')]
    public function index(ProduitRepository $produitRepository): Response
    {
        $produits = $produitRepository->findAll();

        $categories = [
            ['name' => 'Fresh Fruit', 'image' => 'img/categories/cat-1.jpg', 'link' => '#'],
            ['name' => 'Dried Fruit', 'image' => 'img/categories/cat-2.jpg', 'link' => '#'],
            ['name' => 'Vegetables', 'image' => 'img/categories/cat-3.jpg', 'link' => '#'],
            ['name' => 'Drink Fruits', 'image' => 'img/categories/cat-4.jpg', 'link' => '#'],
        ];

        $filters = [
            ['class' => 'oranges', 'name' => 'Oranges'],
            ['class' => 'fresh-meat', 'name' => 'Fresh Meat'],
            ['class' => 'vegetables', 'name' => 'Vegetables'],
            ['class' => 'fastfood', 'name' => 'Fastfood'],
        ];

        $products = [
            ['categories' => ['oranges', 'fresh-meat'], 'image' => 'img/featured/feature-1.jpg', 'name' => 'Crab Pool Security', 'price' => '$30.00'],
            ['categories' => ['vegetables', 'fastfood'], 'image' => 'img/featured/feature-2.jpg', 'name' => 'Crab Pool Security', 'price' => '$30.00'],
        ];

        return $this->render('index/index.html.twig', [
            'controller_name' => 'IndexController',
            'categories' => $categories,
            'filters' => $filters,
            'products' =>$products,
            'produits' => $produits,
        ]);
    }
    #[Route('/shop', name: 'shop_grid')]

    public function shopGrid()
    {
        return $this->render('shop_grid.twig');
    }


    #[Route('/contact', name: 'contact')]

    public function contact()
    {
        return $this->render('contact.twig');
    }

}
