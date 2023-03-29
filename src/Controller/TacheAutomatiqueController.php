<?php

namespace App\Controller;

use App\Entity\TacheAutomatique;
use App\Form\TacheAutomatiqueType;
use App\Repository\TacheAutomatiqueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/tache/automatique')]
class TacheAutomatiqueController extends AbstractController
{
    #[Route('/', name: 'app_tache_automatique_index', methods: ['GET'])]
    public function index(TacheAutomatiqueRepository $tacheAutomatiqueRepository): Response
    {
        return $this->render('tache_automatique/index.html.twig', [
            'tache_automatiques' => $tacheAutomatiqueRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_tache_automatique_new', methods: ['GET', 'POST'])]
    public function new(Request $request, TacheAutomatiqueRepository $tacheAutomatiqueRepository): Response
    {
        $tacheAutomatique = new TacheAutomatique();
        $form = $this->createForm(TacheAutomatiqueType::class, $tacheAutomatique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $tacheAutomatiqueRepository->save($tacheAutomatique, true);

            return $this->redirectToRoute('app_tache_automatique_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('tache_automatique/new.html.twig', [
            'tache_automatique' => $tacheAutomatique,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_tache_automatique_show', methods: ['GET'])]
    public function show(TacheAutomatique $tacheAutomatique): Response
    {
        return $this->render('tache_automatique/show.html.twig', [
            'tache_automatique' => $tacheAutomatique,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_tache_automatique_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, TacheAutomatique $tacheAutomatique, TacheAutomatiqueRepository $tacheAutomatiqueRepository): Response
    {
        $form = $this->createForm(TacheAutomatiqueType::class, $tacheAutomatique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $tacheAutomatiqueRepository->save($tacheAutomatique, true);

            return $this->redirectToRoute('app_tache_automatique_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('tache_automatique/edit.html.twig', [
            'tache_automatique' => $tacheAutomatique,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_tache_automatique_delete', methods: ['POST'])]
    public function delete(Request $request, TacheAutomatique $tacheAutomatique, TacheAutomatiqueRepository $tacheAutomatiqueRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tacheAutomatique->getId(), $request->request->get('_token'))) {
            $tacheAutomatiqueRepository->remove($tacheAutomatique, true);
        }

        return $this->redirectToRoute('app_tache_automatique_index', [], Response::HTTP_SEE_OTHER);
    }
}
