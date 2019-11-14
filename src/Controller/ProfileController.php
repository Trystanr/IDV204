<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\EditType;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ProfileController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(UserRepository $userRepository){

        $users = $userRepository->findAll();

        return $this->render('home/custom.html.twig', [
            'users' => $users
        ]);
    }

    /**
     * @Route("/custom/{id}", name="custom", requirements={"id"="\d+"}))
     * @return Response
     */
    public function custom(User $user){
        //create the show view

        return $this->render('home/custom.html.twig', [
            'user' => $user
        ]);
    }

}