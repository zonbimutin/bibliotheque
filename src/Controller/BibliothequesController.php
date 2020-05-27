<?php

namespace App\Controller;

use App\Entity\Bibliotheques;
use App\Form\BibliothequesType;
use App\Repository\BibliothequesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/bibliotheques")
 */
class BibliothequesController extends AbstractController
{
    /**
     * @Route("/", name="bibliotheques_index", methods={"GET"})
     */
    public function index(BibliothequesRepository $bibliothequesRepository): Response
    {
        return $this->render('bibliotheques/index.html.twig', [
            'bibliotheques' => $bibliothequesRepository->findAll(),
        ]);
    }

    /**
     * @Route("/admin/new", name="bibliotheques_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $bibliotheque = new Bibliotheques();
        $form = $this->createForm(BibliothequesType::class, $bibliotheque);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($bibliotheque);
            $entityManager->flush();

            return $this->redirectToRoute('bibliotheques_index');
        }

        return $this->render('bibliotheques/new.html.twig', [
            'bibliotheque' => $bibliotheque,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="bibliotheques_show", methods={"GET"})
     */
    public function show(Bibliotheques $bibliotheque): Response
    {
        return $this->render('bibliotheques/show.html.twig', [
            'bibliotheque' => $bibliotheque,
        ]);
    }

    /**
     * @Route("/admin/{id}/edit", name="bibliotheques_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Bibliotheques $bibliotheque): Response
    {
        $form = $this->createForm(BibliothequesType::class, $bibliotheque);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('bibliotheques_index');
        }

        return $this->render('bibliotheques/edit.html.twig', [
            'bibliotheque' => $bibliotheque,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/{id}", name="bibliotheques_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Bibliotheques $bibliotheque): Response
    {
        if ($this->isCsrfTokenValid('delete'.$bibliotheque->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($bibliotheque);
            $entityManager->flush();
        }

        return $this->redirectToRoute('bibliotheques_index');
    }
}