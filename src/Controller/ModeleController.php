<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/modele", name="modele_")
 */
class ModeleController extends AbstractController
{
    /**
     * show all rows from modele's entity
     * @Route("/", name="index")
     * @return Response A response instance
     */
    public function index(): Response
    {
        $modeles = $this->getDoctrine()
            ->getRepository(Modele::class)
            ->findAll();

        return $this->render(
            'modele/index.html.twig',
            ['modeles' => $modeles]
        );
    }


    /**
     * Getting a modele by id
     *
     * @Route("/show/{id<^[0-9]+$>}", name="show")
     * @return Response
     */
    public function show(int $id):Response
    {
        $modele = $this->getDoctrine()
            ->getRepository(Modele::class)
            ->findOneBy(['id' => $id]);

        if (!$modele) {
            throw $this->createNotFoundException(
                'No modele with id : '.$id.' found in modele\'s table.'
            );
        }
        return $this->render('modele/show.html.twig', [
            'modele' => $modele,
        ]);
    }
}
