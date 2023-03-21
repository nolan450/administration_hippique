<?php

namespace App\Controller;

use Doctrine\DBAL\Connection;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AuthenticationController extends AbstractController
{
    #[Route('/authentication', name: 'app_authentication')]
    public function index(Connection $connection): Response
    {
        $result = $connection->executeQuery('USE mysql');

        // si la requête est POST
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            // je récupère les données du formulaire
            $user = $_POST['email'];
            $motdepasse = $_POST['password'];

            try {
                $connexion = new \PDO("mysql:host=localhost;dbname=hippique_symfony_project", $user, $motdepasse);
                if($connexion) {
                    return $this->redirect('index');
                }
            } catch (\PDOException $e) {
                // affichage d'un message d'erreur en cas d'échec de connexion
                return $this->render('security/login2.html.twig', [
                    'controller_name' => 'AuthenticationController',
                    'error' => 'Erreur de connexion : ' . $e->getMessage()
                ]);
            }
        }


        return $this->render('security/login2.html.twig', [
            'controller_name' => 'AuthenticationController',
        ]);
    }
}
