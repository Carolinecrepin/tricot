<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/category", name="category_")
 */
class CategoryController extends AbstractController
{
    /**
     * show all rows from category's entity
     * @Route("/", name="index")
     * @return Response A response instance
     */
    public function index(): Response
    {
        $categories = $this->getDoctrine()
            ->getRepository(Category::class)
            ->findAll();

        return $this->render(
            'category/index.html.twig',
            ['categories' => $categories]
        );
    }


    /**
     * Correspond à la route /category/show et au name "category_show"
     * @Route("/{categoryName}", requirements={"categoryName"="\D+"}, methods={"GET"}, name="show")
     */
    public function show(string $categoryName): Response
    {
        $category = $this->getDoctrine()
            ->getRepository(Category::class)
            ->findOneBy(['name' => $categoryName]);
        
        if (!$category) {
            throw $this->createNotFoundException(
                'No category with name : '.$categoryName.' found in category\'s table.'
            );
        } else {
            $categoryId = $category->getId();
            $modeles = $this->getDoctrine()
                ->getRepository(Modele::class)
                ->findBy(['category' => $categoryId], ['id' => 'DESC'], 3);
        }
        return $this->render('category/show.html.twig', [
            'category' => $category,
            'modeles' => $modeles
        ]);
    }
}
