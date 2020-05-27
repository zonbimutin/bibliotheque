<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AuthController extends AbstractController
{
    /**
     * @Route("/auth", name="auth")
     */
    public function index()
    {
        return $this->render('auth/index.html.twig', [
            'controller_name' => 'AuthController',
        ]);
    }

    /**
     * @Route("/auth/{id}", name="auth_detail")
     */

    public function authDetail()
    {
        return $this->render('auth/auth_detail.html.twig', [
            'controller_name' => 'AuthController',
        ]);
    }


}
