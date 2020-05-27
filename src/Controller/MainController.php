<?php

namespace App\Controller;

use App\Repository\AuteursRepository;
use App\Repository\BibliothequesRepository;
use App\Repository\LivresRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{

    /**
     * @Route("/", name="index")
     */
    public function index(BibliothequesRepository $bibliothequesRepository, AuteursRepository $auteursRepository, LivresRepository $livresRepository)

    {
        $bibliotheques = $bibliothequesRepository->lastCreated();
        $authsAll = $auteursRepository->findAll();
        $auths = shuffle($authsAll);
        $total = $auteursRepository->getRandomAuthFromDB();
        $randomAuths = [];

        if ($total > 2) {
            $randomAuths = array_slice(array($auths), 0, 3);
        }


        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
            'bibliotheques' => $bibliotheques,
            'randomAuths' => $randomAuths
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

    public function getArrayOfElements(ServiceEntityRepository $nameRepository)
    {
        return $nameRepository->findAll()->count();
    }

}
