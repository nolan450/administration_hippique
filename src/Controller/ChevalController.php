<?php

namespace App\Controller;

use App\Entity\Cheval;
use App\Entity\Joueur;
use App\Form\ChevalType;
use App\Repository\ChevalRepository;
use App\Repository\JoueurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/cheval')]
class ChevalController extends AbstractController
{
    #[Route('/', name: 'app_cheval_index', methods: ['GET'])]
    public function index(ChevalRepository $chevalRepository, JoueurRepository $joueurRepository): Response
    {

        /*$joueur = new Joueur();
        $joueur->setNom('test');
        $joueur->setPrenom('test');
        $joueur->setEmail('blabla@gmail.com');
        $joueur->setPseudonyme('test');
        $joueur->setMotDePasse('test');
        $joueur->setSexe(1);
        $joueur->setTelephone('0606060606');
        $joueur->setAdressePostale('test');
        $joueur->setAvatar('test');
        $joueur->setDescription('test');
        $joueur->setSiteWeb('test');
        $joueur->setAdresseIp('01920929292');
        $joueur->setDateDeNaissance(new \DateTime());
        $joueur->setDateInscription(new \DateTime());
        $joueur->setDerniereConnexion(new \DateTime());*/
        //$joueurRepository->save($joueur, true);


        return $this->render('cheval/index.html.twig', [
            'chevals' => $chevalRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_cheval_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ChevalRepository $chevalRepository): Response
    {
        $cheval = new Cheval();
        $form = $this->createForm(ChevalType::class, $cheval);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $chevalRepository->save($cheval, true);

            return $this->redirectToRoute('app_cheval_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('cheval/new.html.twig', [
            'cheval' => $cheval,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_cheval_show', methods: ['GET'])]
    public function show(Cheval $cheval): Response
    {
        return $this->render('cheval/show.html.twig', [
            'cheval' => $cheval,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_cheval_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Cheval $cheval, ChevalRepository $chevalRepository): Response
    {
        $form = $this->createForm(ChevalType::class, $cheval);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $chevalRepository->save($cheval, true);

            return $this->redirectToRoute('app_cheval_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('cheval/edit.html.twig', [
            'cheval' => $cheval,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_cheval_delete', methods: ['POST'])]
    public function delete(Request $request, Cheval $cheval, ChevalRepository $chevalRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$cheval->getId(), $request->request->get('_token'))) {
            $chevalRepository->remove($cheval, true);
        }

        return $this->redirectToRoute('app_cheval_index', [], Response::HTTP_SEE_OTHER);
    }
}
