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
    public function custom(UserRepository $userRepository, $id){
        //create the show view

        $user = $userRepository->find($id);

        $bIsProfile = false;

        if ($user->getId() == $this->getUser()->getId()) {
            $bIsProfile = true;
        }

        return $this->render('home/custom.html.twig', [
            'user' => $user,
            'isProfile' => $bIsProfile
        ]);
    }

    /**
     * @Route("/profile", name="profile")
     * @return Response
     */
    public function profile(){
        //create the show view

        $user = $this->getUser();

        return $this->render('home/custom.html.twig', [
            'user' => $user,
            'isProfile' => true
        ]);
    }

}