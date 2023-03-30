<?php

namespace App\Controller;

use App\Entity\AttributsMentaux;
use App\Form\AttributsMentauxType;
use App\Repository\AttributsMentauxRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/attributs/mentaux')]
class AttributsMentauxController extends AbstractController
{
    #[Route('/', name: 'app_attributs_mentaux_index', methods: ['GET'])]
    public function index(AttributsMentauxRepository $attributsMentauxRepository): Response
    {
        return $this->render('attributs_mentaux/index.html.twig', [
            'attributs_mentauxes' => $attributsMentauxRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_attributs_mentaux_new', methods: ['GET', 'POST'])]
    public function new(Request $request, AttributsMentauxRepository $attributsMentauxRepository): Response
    {
        $attributsMentaux = new AttributsMentaux();
        $form = $this->createForm(AttributsMentauxType::class, $attributsMentaux);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $attributsMentauxRepository->save($attributsMentaux, true);

            return $this->redirectToRoute('app_attributs_mentaux_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('attributs_mentaux/new.html.twig', [
            'attributs_mentaux' => $attributsMentaux,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_attributs_mentaux_show', methods: ['GET'])]
    public function show(AttributsMentaux $attributsMentaux): Response
    {
        return $this->render('attributs_mentaux/show.html.twig', [
            'attributs_mentaux' => $attributsMentaux,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_attributs_mentaux_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, AttributsMentaux $attributsMentaux, AttributsMentauxRepository $attributsMentauxRepository): Response
    {
        $form = $this->createForm(AttributsMentauxType::class, $attributsMentaux);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $attributsMentauxRepository->save($attributsMentaux, true);

            return $this->redirectToRoute('app_attributs_mentaux_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('attributs_mentaux/edit.html.twig', [
            'attributs_mentaux' => $attributsMentaux,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_attributs_mentaux_delete', methods: ['POST'])]
    public function delete(Request $request, AttributsMentaux $attributsMentaux, AttributsMentauxRepository $attributsMentauxRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$attributsMentaux->getId(), $request->request->get('_token'))) {
            $attributsMentauxRepository->remove($attributsMentaux, true);
        }

        return $this->redirectToRoute('app_attributs_mentaux_index', [], Response::HTTP_SEE_OTHER);
    }
}
