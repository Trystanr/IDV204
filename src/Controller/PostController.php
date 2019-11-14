<?php


namespace App\Controller;

use App\Entity\Post;
use App\Entity\Comment;
use App\Form\PostType;
use App\Form\CommentType;
use App\Repository\PostRepository;
use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Psr\Log\LoggerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

use Aws\S3\S3Client;

/**
 * * @Route("/post", name="post.")
*/

class PostController extends AbstractController
{   
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @Route("/", name="index")
     */
    public function index(PostRepository $postRepository)
    {

        $posts = $postRepository->findAll();

        return $this->render('post/index.html.twig', [
            'posts' => $posts,
            'catName' => "All Questions"
        ]);
    }

    /**
     * @Route("/category/{cat}", name="category")
     */
    public function findByCat(PostRepository $postRepository,CategoryRepository $categoryRepository, $cat)
    {

        $posts = $postRepository->findPostWithCategory($cat);

        $categoryName = $categoryRepository->find($cat)->getName();

        return $this->render('post/index.html.twig', [
            'posts' => $posts,
            'catName' => $categoryName
        ]);
    }

    /**
     * @Route("/create", name="create")
     * @return Response
     */
    public function create(Request $request){
        // create a new post with title
        $post = new Post();


        $s3 = new S3Client([
            'version'  => 'latest',
            'region'   => 'eu-north-1'
        ]);

        $bucket = getenv('S3_BUCKET')?: die('No "S3_BUCKET" config var in found in env!');

        $form = $this->createForm(PostType::class, $post);

        $form->handleRequest($request);
        $form->getErrors();
        if($form->isSubmitted()){
             //entity manager
            
            $em = $this->getDoctrine()->getManager();

            $post->setUser($this->getUser());

            $post->setCommentText("");
            
            //** @var UploadedFile $file  */
            $file = $request->files->get('post')['attachment'];

            if($file){
                $filename = md5(uniqid()) . '.' . $file->guessClientExtension();
                
                try {
                    // FIXME: do not use 'name' for upload (that's the original filename from the user's computer)
                    $upload = $s3->upload($bucket, $filename, $file, 'public-read');

                    $key = $filename;

                } catch(Exception $e) {

                }

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

        return $this->render('post/create.html.twig', [
            'form' => $form->createView()
        ]);

    }

    /**
     * @Route("/show/{id}", name="show")
     * @return Response
     */
    public function show(Post $post, Request $request){
        //create the show view
        $em = $this->getDoctrine()->getManager();
        
        $views = $post->getViewCount();
        $post->setViewCount($views + 1);
        

        $comm = new Comment();

        $form = $this->createForm(CommentType::class, $post);

        $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {

                $comm->setUser($this->getUser());

                $newCom = $post->getCommentText();
                // $newCom = nl2br($newCom, false);
                $comm->setCommentText($newCom);

                $post->setComment($comm);

                $em->persist($comm);

            }

        $em->persist($post);
        $em->flush();

        return $this->render('post/show.html.twig', [
            'post' => $post,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/delete/{id}", name="delete")
     * @IsGranted("ROLE_ADMIN")
     * @return Response
     */
    public function remove(Post $post){

        $em = $this->getDoctrine()->getManager();

        $em->remove($post);
        $em->flush();

        $this->addFlash('success', 'Post was removed');
        return $this->redirect($this->generateUrl('post.index'));

    }
}
