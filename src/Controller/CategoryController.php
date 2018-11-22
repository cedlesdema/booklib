<?php

namespace App\Controller;


use Psr\Container\ContainerInterface;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Category;


/**
 * Class CategoryController
 * @package App\Controller
 * @route("/category")
 */
class CategoryController extends BaseController
{
    /**
     * @Route("/show/{id}", name="category_show")
     */
    public function show(category $category)
    {

        return $this->render("category/show.html.twig", ["category" => $category]);
    }

    public function dropdown()
    {
        $categories =$this->getDoctrine()->getRepository(Category::class)->findAll();

        return $this->render('category/dropdown.html.twig', ["categories" => $categories]);
    }
}
