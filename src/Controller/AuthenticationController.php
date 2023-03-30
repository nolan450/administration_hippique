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
                $connexion = new \PDO("mysql:host=192.168.56.101;dbname=club_hippique", $user, $motdepasse);
                var_dump($connexion);die();
                if($connexion) {
                    return $this->redirect('index');
                }
            } catch (\PDOException $e) {
                return $e->getMessage();
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
