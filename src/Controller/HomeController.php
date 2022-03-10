<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="app_home")
     */
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    /**
     * @Route("/admin", name="admin")
     */
    public function admin()
    {
        $homes = $this->getDoctrine()->getRepository(HomeController::class)->findAll();
        $users = $this->getDoctrine()->getRepository(User::class)->findAll();




        return $this->render('admin/index.html.twig', [
            'homes' => $homes,
            'users' => $users
        ]);
    }
    

}
