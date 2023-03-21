<?php

namespace App\Controller;



use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class CentreEquestreController extends AbstractController

{

        #[Route('/centreEquestre', name: 'centre_equestre')]
        public function index(EntityManager $entityManager): Response
        {
            // on récupère les centres équestres en base de données
            $centreEquestres = $entityManager->getRepository(CentreEquestre::class)->findAll();

            // on retourne la vue de la liste des centres équestres
            return $this->render('centre_equestre/index.html.twig', [
                'controller_name' => 'CentreEquestreController',
                'centreEquestres' => $centreEquestres
            ]);

        }
}