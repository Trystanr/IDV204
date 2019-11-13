<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Form\PostType;
use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Psr\Log\LoggerInterface;

/**
 * * @Route("/comment", name="post.")
*/

class CommentController extends AbstractController
{   
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @Route("/create", name="create")
     * @return Response
     */
    public function create(Request $request){
        // create a new post with title
        $post = new Post();

        $form = $this->createForm(PostType::class, $post);

        $form->handleRequest($request);
        $form->getErrors();
        if($form->isSubmitted()){
             //entity manager
            
            $em = $this->getDoctrine()->getManager();

            $post->setUser($this->getUser());
            
            //** @var UploadedFile $file  */
            $file = $request->files->get('post')['attachment'];

            if($file){
                $filename = md5(uniqid()) . '.' . $file->guessClientExtension();
                $file->move(
                    $this->getParameter('uploads_dir'),
                    $filename
                );

                $post->setImage($filename);
                $em->persist($post);
                $em->flush();
            }
            

            return $this->redirect($this->generateUrl('post.index'));
        }

        //return a response

        return $this->render('post/show.html.twig', [
            'form' => $form->createView()
        ]);

    }

}
