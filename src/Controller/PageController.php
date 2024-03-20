<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PageController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('page/index.html.twig', [
            'controller_name' => 'PageController',
        ]);
    }

    #[Route('/about', name: 'app_about')]
    public function about(): Response
    {
        $websiteName = 'Moviz';
        return $this->render('page/about.html.twig', [
            'websiteName' => $websiteName,
        ]);
    }

}
