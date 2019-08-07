<?php

namespace App\Controller;

use App\Entity\Article;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\{Response, Request};
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\{TextType, SubmitType, TextareaType};

class ArticleController extends Controller
{
    /**
     * @Route("/", name="article_list")
     * @Method({"GET"})
     */
    public function index()
    {
        $articles = $this->getDoctrine()
                         ->getRepository(Article::class)
                         ->findAll();

        return $this->render('articles/index.html.twig', [
            'articles' => $articles
        ]);
    }

     /**
      * @Route("/article/new", name="new_article")
      * @Method({"GET", "POST"})
      */
      public function new(Request $request)
      {
          $article = new Article();

          $form = $this->createFormBuilder($article)
                       ->add('title', TextType::class, array('attr' => array('class' => 'form-control')))
                       ->add('body', TextareaType::class, array(
                           'required' => false,
                           'attr' => array('class' => 'form-control')
                       ))
                       ->add('save', SubmitType::class, array(
                           'label' => 'Create',
                           'attr' => array('class' => 'btn btn-primary mt-3')
                       ))
                       ->getForm();

            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $article = $form->getData();

                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($article);
                $entityManager->flush();

                return $this->redirectToRoute('article_list');
            }

            return $this->render('articles/new.html.twig', [
                'form' => $form->createView()
            ]);
      }

      /**
       * @Route("/article/{id}", name="article_show")
       */
       public function show($id)
       {
           $article = $this->getDoctrine()
                           ->getRepository(Article::class)
                           ->find($id);

          return $this->render('articles/show.html.twig', [
              'article' => $article
          ]);
       }

       /**
        * @Route("/article/delete/{id}")
        * @Method({"DELETE"})
        */
        public function delete(Request $request, $id)
        {
            $article = $this->getDoctrine()
                             ->getRepository(Article::class)
                             ->find($id);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($article);
            $entityManager->flush();

            $response = new Response();
            $response->send();
        }
}
