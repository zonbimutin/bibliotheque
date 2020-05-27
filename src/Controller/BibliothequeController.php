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
        return $this->render('bibliotheque/index.html.twig', [
            'controller_name' => 'BibliothequeController',
        ]);
    }
}
