<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;


class ContactController extends AbstractController

{

    /**
     * @Route("/contact", name="contact")
     * @IsGranted("ROLE_ADMIN", message="No access! Get out!")

     */
    public function index(Request $request)
    {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contact = $form->getData();

            // Ici nous enverrons l'e-mail

            $this->addFlash('message', 'Votre message a été transmis, nous vous répondrons dans les meilleurs délais.'); // Permet un message flash de renvoi
        }
        return $this->render('contact/index.html.twig',['contactForm' => $form->createView()]);
    }

}
