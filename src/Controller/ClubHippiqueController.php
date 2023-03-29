<?php

namespace App\Controller;

use App\Entity\ClubHippique;
use App\Form\ClubHippiqueType;
use App\Repository\ClubHippiqueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/club/hippique')]
class ClubHippiqueController extends AbstractController
{
    #[Route('/', name: 'app_club_hippique_index', methods: ['GET'])]
    public function index(ClubHippiqueRepository $clubHippiqueRepository): Response
    {
        return $this->render('club_hippique/index.html.twig', [
            'club_hippiques' => $clubHippiqueRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_club_hippique_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ClubHippiqueRepository $clubHippiqueRepository): Response
    {
        $clubHippique = new ClubHippique();
        $form = $this->createForm(ClubHippiqueType::class, $clubHippique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $clubHippiqueRepository->save($clubHippique, true);

            return $this->redirectToRoute('app_club_hippique_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('club_hippique/new.html.twig', [
            'club_hippique' => $clubHippique,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_club_hippique_show', methods: ['GET'])]
    public function show(ClubHippique $clubHippique): Response
    {
        return $this->render('club_hippique/show.html.twig', [
            'club_hippique' => $clubHippique,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_club_hippique_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ClubHippique $clubHippique, ClubHippiqueRepository $clubHippiqueRepository): Response
    {
        $form = $this->createForm(ClubHippiqueType::class, $clubHippique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $clubHippiqueRepository->save($clubHippique, true);

            return $this->redirectToRoute('app_club_hippique_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('club_hippique/edit.html.twig', [
            'club_hippique' => $clubHippique,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_club_hippique_delete', methods: ['POST'])]
    public function delete(Request $request, ClubHippique $clubHippique, ClubHippiqueRepository $clubHippiqueRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$clubHippique->getId(), $request->request->get('_token'))) {
            $clubHippiqueRepository->remove($clubHippique, true);
        }

        return $this->redirectToRoute('app_club_hippique_index', [], Response::HTTP_SEE_OTHER);
    }
}
