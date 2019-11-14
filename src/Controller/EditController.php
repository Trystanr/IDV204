<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class EditController extends AbstractController
{   
    /**
     * @Route("/profile/edit", name="edit")
     * @return Response
     */
    public function edit(Request $request, UserPasswordEncoderInterface $id)
    {
        $user = $this->getDoctrine()->getRepository(User::class)->find($id);

        $form =  $this->createFormBuilder($user)
        ->add('username', null, [
                'attr' => [
                        'class' => 'form-control'
                ]
            ]
        )
        ->add('email', null, [
            'attr' => [
                    'class' => 'form-control'
            ]
        ]
        )
        ->add('password', RepeatedType::class, [
            'type' => PasswordType::class,
            'required' => true,
            'first_options' => [
                'label' => 'Password',
                'attr' => [
                        'class' => 'form-control'
                ]
            ],
            'second_options' => [
                'label' => 'Repeat Password',
                'attr' => [
                        'class' => 'form-control'
                ]
            ],
        ])
        ->add('attachment', FileType::class, [
            'mapped' => false, 
        ])
        ->add('register', SubmitType::class, [
            'attr' => [
                'class' => 'btn btn-success float-right'
            ]
        ])->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() ){
            $em = $this->getDoctrine()->getManager();
            $data =  $form->getData();
            
            $user = new User();
            $user->setUsername($data['username']);
            $user->setEmail($data['email']);
            $user->setPassword(
                $passwordEncoder->encodePassword($user, $data['password'])
            );
            
            //** @var UploadedFile $file  */
            $file = $request->files->get('user')['attachment'];

            if($file){
                $filename = md5(uniqid()) . '.' . $file->guessClientExtension();
                $file->move(
                    $this->getParameter('uploads_dir'),
                    $filename
                );

                $user->setImage($filename);
                dump($user);
                dump($request->files);
                
            };

            $em->persist($user);
            $em->flush();

            return $this->redirect($this->generateUrl('app_login'));
        }

        return $this->render('registration/edit.html.twig', [
            'form' =>  $form->createView()
        ]);
    }

}