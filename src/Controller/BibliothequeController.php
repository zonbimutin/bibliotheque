<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BibliothequeController extends AbstractController
{
    /**
     * @Route("/bibliotheque", name="bibliotheque")
     */
    public function index()
    {
        $bibliotheques = [];

        return $this->render('bibliotheque/index.html.twig', [
            'controller_name' => 'BibliothequeController',
            'bibliotheques' => $bibliotheques,
        ]);
    }

    # TODO DELETE BIBLIOTHEQUE

    # TODO EDIT BIBLIOTHEQUE

    # TODO CREATE BIBLIOTHEQUE
}
