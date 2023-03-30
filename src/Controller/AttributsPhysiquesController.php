<?php

namespace App\Controller;

use App\Entity\AttributsPhysiques;
use App\Form\AttributsPhysiquesType;
use App\Repository\AttributsPhysiquesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/attributs/physiques')]
class AttributsPhysiquesController extends AbstractController
{
    #[Route('/', name: 'app_attributs_physiques_index', methods: ['GET'])]
    public function index(AttributsPhysiquesRepository $attributsPhysiquesRepository): Response
    {
        return $this->render('attributs_physiques/index.html.twig', [
            'attributs_physiques' => $attributsPhysiquesRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_attributs_physiques_new', methods: ['GET', 'POST'])]
    public function new(Request $request, AttributsPhysiquesRepository $attributsPhysiquesRepository): Response
    {
        $attributsPhysique = new AttributsPhysiques();
        $form = $this->createForm(AttributsPhysiquesType::class, $attributsPhysique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $attributsPhysiquesRepository->save($attributsPhysique, true);

            return $this->redirectToRoute('app_attributs_physiques_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('attributs_physiques/new.html.twig', [
            'attributs_physique' => $attributsPhysique,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_attributs_physiques_show', methods: ['GET'])]
    public function show(AttributsPhysiques $attributsPhysique): Response
    {
        return $this->render('attributs_physiques/show.html.twig', [
            'attributs_physique' => $attributsPhysique,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_attributs_physiques_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, AttributsPhysiques $attributsPhysique, AttributsPhysiquesRepository $attributsPhysiquesRepository): Response
    {
        $form = $this->createForm(AttributsPhysiquesType::class, $attributsPhysique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $attributsPhysiquesRepository->save($attributsPhysique, true);

            return $this->redirectToRoute('app_attributs_physiques_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('attributs_physiques/edit.html.twig', [
            'attributs_physique' => $attributsPhysique,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_attributs_physiques_delete', methods: ['POST'])]
    public function delete(Request $request, AttributsPhysiques $attributsPhysique, AttributsPhysiquesRepository $attributsPhysiquesRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$attributsPhysique->getId(), $request->request->get('_token'))) {
            $attributsPhysiquesRepository->remove($attributsPhysique, true);
        }

        return $this->redirectToRoute('app_attributs_physiques_index', [], Response::HTTP_SEE_OTHER);
    }
}
