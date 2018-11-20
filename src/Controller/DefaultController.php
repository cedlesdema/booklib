<?php

namespace App\Controller;



use App\Entity\Author;
use App\Entity\Book;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class DefaultController
 * @package App\Controller
 * @Route("/default")
 */

class DefaultController extends BaseController
{
    /**
     * @Route("/{nom}", name="default", methods={"GET"})
     *
     */
    public function index(string $nom, Request $request)
    {
        $author = $this->getDoctrine()->getRepository(Author::class)->findOneByLastname($nom);

        if (!$author) {
            throw $this->createNotFoundException("Auteur introuvable !");
        }
        echo $request->query->get('test');
        die;

        return new Response($author->getFirstname() . "  " . $author->getLastname());

    }

    /**
     *@Route("/book/{id}", name="show-book")
     */
    public function showBook(Book $book)
    {
       return new Response($book->getTitle());

    }
}
