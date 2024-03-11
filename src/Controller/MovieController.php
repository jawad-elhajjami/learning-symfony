<?php

namespace App\Controller;

use App\Entity\Movie;
use App\Repository\MovieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MovieController extends AbstractController
{

    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    
    #[Route('/movies', name: 'movies')]
    public function index(): Response
    {

        $repository = $this->em->getRepository(Movie::class);
        // $movies = $repository->findAll();
        // $movies = $repository->find(3);
        // $movies = $repository->findBy([],['title' => 'DESC']);
        $movies = $repository->findOneBy(['title' => 'Heat']);
        $count = $repository->count(['id' => 9]);
        // dd($count);

        return $this->render('index.html.twig',array('movies' => $movies));
    }

 
    
}
