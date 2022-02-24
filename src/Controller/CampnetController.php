<?php

namespace App\Controller;

use App\Entity\Campnet;
use App\Form\CampnetType;
use App\Repository\CampnetRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/campnet")
 */
class CampnetController extends AbstractController
{
    /**
     * @Route("/", name="campnet_index", methods={"GET"})
     */
    public function index(CampnetRepository $campnetRepository): Response
    {
        return $this->render('campnet/index.html.twig', [
            'campnets' => $campnetRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="campnet_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $campnet = new Campnet();
        $form = $this->createForm(CampnetType::class, $campnet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($campnet);
            $entityManager->flush();

            return $this->redirectToRoute('campnet_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('campnet/new.html.twig', [
            'campnet' => $campnet,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="campnet_show", methods={"GET"})
     */
    public function show(Campnet $campnet): Response
    {
        return $this->render('campnet/show.html.twig', [
            'campnet' => $campnet,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="campnet_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Campnet $campnet, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CampnetType::class, $campnet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('campnet_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('campnet/edit.html.twig', [
            'campnet' => $campnet,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="campnet_delete", methods={"POST"})
     */
    public function delete(Request $request, Campnet $campnet, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$campnet->getId(), $request->request->get('_token'))) {
            $entityManager->remove($campnet);
            $entityManager->flush();
        }

        return $this->redirectToRoute('campnet_index', [], Response::HTTP_SEE_OTHER);
    }
}
