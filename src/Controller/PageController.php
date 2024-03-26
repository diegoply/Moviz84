<?php

namespace App\Controller;

use App\Repository\MovieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PageController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(MovieRepository $movieRepository, ParameterBagInterface $parameterBagInterface): Response
    {
        $limit =  $parameterBagInterface->get('home_movies_limit');
        $movies = $movieRepository->findBy([], ['id' => 'DESC'], $limit  );

        return $this->render('page/index.html.twig', [
          'movies' => $movies,
        ]);
    }
    public function genreIndex(MovieRepository $movieRepository, Request $request): Response
    {
        $genreId = $request->get('genreId');
        $movies = $movieRepository->findMovies($genreId);

        return $this->render('movie/index.html.twig', [
            'movies' => $movies,
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
