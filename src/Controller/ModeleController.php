<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use App\Form\ModeleType;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/modele", name="modele_")
 */
class ModeleController extends AbstractController
{
   /**
     * Correspond à la route /modele/ et au name "modele_index"
     * @Route("/", name="index")
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
     * The controller for the modele add form
     *
     * @Route("/new", name="new")
     */
    public function new(Request $request) : Response
    {
        // Create a new Modele Object
        $modele = new modele();
        // Create the associated Form
        $form = $this->createForm(ModeleType::class, $modele);
        // Get data from HTTP request
        $form->handleRequest($request);
        // Was the form submitted ?
        if ($form->isSubmitted()) {
            // Deal with the submitted data
            // Get the Entity Manager
            $entityManager = $this->getDoctrine()->getManager();
            // Persist Modele Object
            $entityManager->persist($modele);
            // Flush the persisted object
            $entityManager->flush();
            // Finally redirect to modeles list
            return $this->redirectToRoute('modele_index');
        }
        // Render the form
        return $this->render('modele/new.html.twig', [
            "form" => $form->createView(),
        ]);
    }

    /**
     * Correspond à la route /modele/show et au name "modele_show"
     * @Route("/show/{id<^[0-9]+$>}", name="show")
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
