<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



class HelloController extends AbstractController {

    #[Route('/index', name: 'hello')]
    public function index(): Response
    {
        // si l'utilisateur est connecté
        if (!$this->getUser()) {
            return $this->redirectToRoute('app_login');
        }

        return $this->render('base.html.twig', [
            'controller_name' => 'HelloController',
        ]);
    }

    #[Route('/bonjour', name: 'bonjour')]
    public function bonjour() {
        return new Response('Bonjour tout le monde!');
    }
}