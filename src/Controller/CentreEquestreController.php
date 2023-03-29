<?php

namespace App\Controller;

use App\Entity\CentreEquestre;
use App\Form\CentreEquestreType;
use App\Repository\CentreEquestreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/centre/equestre')]
class CentreEquestreController extends AbstractController
{
    #[Route('/', name: 'app_centre_equestre_index', methods: ['GET'])]
    public function index(CentreEquestreRepository $centreEquestreRepository): Response
    {
        return $this->render('centre_equestre/index.html.twig', [
            'centre_equestres' => $centreEquestreRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_centre_equestre_new', methods: ['GET', 'POST'])]
    public function new(Request $request, CentreEquestreRepository $centreEquestreRepository): Response
    {
        $centreEquestre = new CentreEquestre();
        $form = $this->createForm(CentreEquestreType::class, $centreEquestre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $centreEquestreRepository->save($centreEquestre, true);

            return $this->redirectToRoute('app_centre_equestre_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('centre_equestre/new.html.twig', [
            'centre_equestre' => $centreEquestre,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_centre_equestre_show', methods: ['GET'])]
    public function show(CentreEquestre $centreEquestre): Response
    {
        return $this->render('centre_equestre/show.html.twig', [
            'centre_equestre' => $centreEquestre,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_centre_equestre_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, CentreEquestre $centreEquestre, CentreEquestreRepository $centreEquestreRepository): Response
    {
        $form = $this->createForm(CentreEquestreType::class, $centreEquestre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $centreEquestreRepository->save($centreEquestre, true);

            return $this->redirectToRoute('app_centre_equestre_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('centre_equestre/edit.html.twig', [
            'centre_equestre' => $centreEquestre,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_centre_equestre_delete', methods: ['POST'])]
    public function delete(Request $request, CentreEquestre $centreEquestre, CentreEquestreRepository $centreEquestreRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$centreEquestre->getId(), $request->request->get('_token'))) {
            $centreEquestreRepository->remove($centreEquestre, true);
        }

        return $this->redirectToRoute('app_centre_equestre_index', [], Response::HTTP_SEE_OTHER);
    }
}
