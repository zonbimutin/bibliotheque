<?php

namespace App\Controller;

use phpDocumentor\Reflection\Types\Integer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AuthController extends AbstractController
{
    /**
     * @Route("/auth", name="auth")
     */
    public function index()
    {
        $auths = [];
        return $this->render('auth/index.html.twig', [
            'controller_name' => 'AuthController',
            'auteurs' => $auths
        ]);
    }

    /**
     * @Route("/auth/{id}", name="auth_detail")
     */

    public function authDetail(int $id)
    {
        $auth_id = $id;

        return $this->render('auth/auth_detail.html.twig', [
            'controller_name' => 'AuthController',
            'id' => $auth_id,
        ]);
    }

    # TODO DELETE AUTH

    # TODO EDIT AUTH

    # TODO CREATE AUTH




}
