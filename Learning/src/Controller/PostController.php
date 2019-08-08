<?php

namespace App\Controller;

use App\Entity\Post;
use App\Form\PostType;
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

         $form = $this->createForm(PostType::class, $post);

         // entity manager
         // $em = $this->getDoctrine()->getManager();
         // $em->persist($post);
         // $em->flush();

         return $this->render('post/create.html.twig', [
             'form' => $form->createView()
         ]);
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

     /**
      * @Route("/delete/{id}", name="delete")
      */
      public function remove($id, PostRepository $postRepository)
      {
          $post = $postRepository->find($id);

          $em = $this->getDoctrine()->getManager();
          $em->remove($post);
          $em->flush();

          $this->addFlash('success', 'Post removed');

          return $this->redirect($this->generateUrl('post.index'));
      }
}
