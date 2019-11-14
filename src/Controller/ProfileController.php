<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\EditType;
use App\Repository\UserRepository;
use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;


class ProfileController extends AbstractController
{


    /**
     * @Route("/custom/{id}", name="custom", requirements={"id"="\d+"}))
     * @return Response
     */
    public function custom(UserRepository $userRepository, PostRepository $postRepository, $id){
        //create the show view

        $user = $userRepository->find($id);

        $posts = $postRepository->findPostWithUser($user->getId());

        $postCount = $postRepository->findUserPostCount($user->getId());

        $bIsProfile = false;

        if ($user->getId() == $this->getUser()->getId()) {
            $bIsProfile = true;
        }

        return $this->render('home/custom.html.twig', [
            'user' => $user,
            'posts' => $posts,
            'isProfile' => $bIsProfile,
            'postCount' => $postCount
        ]);
    }

    /**
     * @Route("/profile", name="profile")
     * @return Response
     */
    public function profile(PostRepository $postRepository){
        //create the show view

        $user = $this->getUser();

        $posts = $postRepository->findPostWithUser($this->getUser()->getId());

        $postCount = $postRepository->findUserPostCount($user->getId());

        return $this->render('home/custom.html.twig', [
            'user' => $user,
            'posts' => $posts,
            'isProfile' => true,
            'postCount' => $postCount
        ]);
    }

    /**
     * @Route("/ban/{id}", name="ban")
     * @IsGranted("ROLE_ADMIN")
     * @return Response
     */
    public function ban(User $user){

        $em = $this->getDoctrine()->getManager();

        $user->setIsBanned(1);
        $em->persist($user);
        $em->flush();

        $this->addFlash('success', 'User was banned');
        return $this->redirect($this->generateUrl('custom', [
            'id' => $user->getId()
        ]));

    }

    /**
     * @Route("/unban/{id}", name="unban")
     * @IsGranted("ROLE_ADMIN")
     * @return Response
     */
    public function unban(User $user){

        $em = $this->getDoctrine()->getManager();

        $user->setIsBanned(0);
        $em->persist($user);
        $em->flush();

        $this->addFlash('success', 'User was unbanned');
        return $this->redirect($this->generateUrl('custom', [
            'id' => $user->getId()
        ]));

    }

}