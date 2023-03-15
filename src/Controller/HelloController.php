<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



class HelloController extends AbstractController {

    #[Route('/', name: 'hello')]
    public function index(): Response
    {
        return $this->render('index.html.twig', [
            'controller_name' => 'HelloController',
        ]);
    }

    #[Route('/bonjour', name: 'bonjour')]
    public function bonjour() {
        return new Response('Bonjour tout le monde!');
    }
}