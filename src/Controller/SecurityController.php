<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    #[Route(path: '/login', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        if ($this->getUser()) {
             return $this->redirectToRoute('index');
        }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login2.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    /*# create a user
    #[Route(path: '/create', name: 'app_create')]
    public function create(EntityManagerInterface $entityManager, UserPasswordEncoderInterface $passwordEncoder): Response
    {
        // je crée un nouvel utilisateur
        $user = new User();
        $user ->setEmail('nolan.974@live.fr');
        $user ->setUsername('nolan');
        $user ->setPassword($passwordEncoder->encodePassword($user, 'test'));
        $user ->setIsActive(true);
        $entityManager ->persist($user);
        $entityManager ->flush();
        return new Response('Utilisateur créé');
    }*/

    #[Route(path: '/logout', name: 'app_logout')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}
