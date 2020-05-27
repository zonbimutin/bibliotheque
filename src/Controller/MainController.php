<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{

    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        $bibliotheques =  [];

        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
            'bibliotheques' => $bibliotheques,
        ]);
    }

    /**
     * @Route("/admin", name="admin_index", methods={"GET"})
     */
    public function admin(): Response
    {
        return $this->render('admin.html.twig', [
        ]);
    }
}
