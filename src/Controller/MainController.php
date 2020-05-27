<?php

namespace App\Controller;

use App\Repository\BibliothequesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{

    /**
     * @Route("/", name="index")
     */
    public function index(BibliothequesRepository $bibliothequesRepository)

    {
        $bibliotheques = $bibliothequesRepository->lastCreated();

        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
            'bibliotheques' => $bibliotheques,
        ]);
    }

    /**
     * @Route("/admin", name="admin_index", methods={"GET"})
     */
    public function admin()
    {
        return $this->render('admin.html.twig', [
        ]);
    }
}
