<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BooksController extends AbstractController
{
    /**
     * @Route("/books", name="books")
     */
    public function index()
    {
        $books = [];
        return $this->render('books/index.html.twig', [
            'controller_name' => 'BooksController',
            'livres' => $books,
        ]);
    }

    # TODO DELETE BOOK

    # TODO EDIT BOOK

    # TODO CREATE BOOK
}
