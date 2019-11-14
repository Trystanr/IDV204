<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use App\Form\RegisterType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

use Aws\S3\S3Client;

class RegistrationController extends AbstractController
{
    /**
     * @Route("/register", name="register")
     */
    public function register(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        $s3 = new S3Client([
            'version'  => 'latest',
            'region'   => 'eu-north-1'
        ]);

        $bucket = getenv('S3_BUCKET')?: die('No "S3_BUCKET" config var in found in env!');

        $form = $this->createForm(RegisterType::class);
        $form->handleRequest($request);

        if($form->isSubmitted()){
            $data =  $form->getData();
            
            $user = new User();
            $user->setUsername($data['username']);
            $user->setEmail($data['email']);
            $user->setPassword(
                $passwordEncoder->encodePassword($user, $data['password'])
            );
            
            $file = $request->files->get('register')['image'];

            if($file){
                $filename = md5(uniqid()) . '.' . $file->guessClientExtension();
                $file->move(
                    $this->getParameter('uploads_dir'),
                    $filename
                );

                $user->setImage($filename);

                try {
                    $upload = $s3->putObject([
                        'Bucket' => $bucket, // REQUIRED
                        'Key' => $filename, // REQUIRED
                        'SourceFile' => $this->getParameter('uploads_dir').$filename,
                        'ContentType' => 'image/jpeg',
                        'ACL' => 'public-read'
                    ]);

                    $key = $filename;
                } catch(Exception $e) {

                }
            }

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->redirect($this->generateUrl('app_login'));
        }

        return $this->render('registration/index.html.twig', [
            'form' =>  $form->createView()
        ]);
    }
}
