<?php

namespace App\Controller;

use App\Entity\Cheval;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ChevalController extends AbstractController
{

    /**
     * Fonction qui permet de retourner la vue de la liste des chevaux
     */
    #[Route('/cheval', name: 'cheval')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        // je récupère la liste des chevaux en base de données
        //$chevaux = $entityManager->getRepository(Cheval::class)->findAll();

        // je retourne la vue de la liste des chevaux
        return $this->render('cheval/index.html.twig', [
            'controller_name' => 'ChevalController',
            //'chevaux' => $chevaux
        ]);
    }
}