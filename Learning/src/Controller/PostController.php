<?php

namespace App\Controller;

use App\Entity\Post;
use App\Repository\PostRepository;
use Symfony\Component\HttpFoundation\{Response, Request};
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/post", name="post.")
 */
class PostController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(PostRepository $postRepository)
    {
        $posts = $postRepository->findAll();

        return $this->render('post/index.html.twig', [
            'posts' => $posts
        ]);
    }

    /**
     * @Route("/create", name="create")
     */
     public function create(Request $request)
     {
         $post = new Post();

         $post->setTitle('Title one');

         // entity manager
         $em = $this->getDoctrine()->getManager();
         $em->persist($post);
         $em->flush();

         return new Response('Post created');
     }

     /**
      * @Route("/show/{id}", name="show")
      */
     public function show($id, PostRepository $postRepository)
     {
         $post = $postRepository->find($id);

         return $this->render('post/show.html.twig', [
             'post' => $post
         ]);
     }
}
