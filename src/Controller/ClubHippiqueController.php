<?php

namespace App\Controller;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class ClubHippiqueController extends AbstractController
{
    /**
     * Fonction qui retourne la liste des clubs hippiques auxquelle l'utilisateur est abonné
     */
    #[Route('/clubHippique', name: 'club_hippique')]
    public function clubHippiquesAbonne(EntityManager $entityManager): Response
    {
        // on récupère les clubs hippiques en base de données
        $clubHippiques = $entityManager->getRepository(ClubHippique::class)->findAll();

        // on retourne la vue de la liste des clubs hippiques
        return $this->render('club_hippique/index.html.twig', [
            'controller_name' => 'ClubHippiqueController',
            'clubHippiques' => $clubHippiques
        ]);
    }
}
