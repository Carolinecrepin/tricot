<?php

namespace App\Controller;

use App\Entity\Pelote;
use App\Form\PeloteType;
use App\Repository\PeloteRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/pelote")
 */
class PeloteController extends AbstractController
{
    /**
     * @Route("/", name="pelote_index", methods={"GET"})
     */
    public function index(PeloteRepository $peloteRepository): Response
    {
        return $this->render('pelote/index.html.twig', [
            'pelotes' => $peloteRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="pelote_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $pelote = new Pelote();
        $form = $this->createForm(PeloteType::class, $pelote);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($pelote);
            $entityManager->flush();

            return $this->redirectToRoute('pelote_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('pelote/new.html.twig', [
            'pelote' => $pelote,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="pelote_show", methods={"GET"})
     */
    public function show(Pelote $pelote): Response
    {
        return $this->render('pelote/show.html.twig', [
            'pelote' => $pelote,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="pelote_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Pelote $pelote, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(PeloteType::class, $pelote);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('pelote_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('pelote/edit.html.twig', [
            'pelote' => $pelote,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="pelote_delete", methods={"POST"})
     */
    public function delete(Request $request, Pelote $pelote, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$pelote->getId(), $request->request->get('_token'))) {
            $entityManager->remove($pelote);
            $entityManager->flush();
        }

        return $this->redirectToRoute('pelote_index', [], Response::HTTP_SEE_OTHER);
    }
}
