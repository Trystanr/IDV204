<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\EditType;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(){
        if (null !== $this->getUser()) {
            
            return $this->redirect($this->generateUrl('profile_route'));
        } else {
            return $this->redirect($this->generateUrl('app_login'));
        }

    }

    /**
     * @Route("/custom/{id}", name="custom", requirements={"id"="\d+"}))
     */
    public function custom(User $user){

        return $this->render('home/custom.html.twig', [
            'user' => $user
        ]);
    }
}
