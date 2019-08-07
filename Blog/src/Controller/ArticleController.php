<?php

namespace App\Controller;

use App\Entity\Article;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ArticleController extends Controller
{
    /**
     * @Route("/")
     * @Method({"GET"})
     */
    public function index()
    {
        return $this->render('articles/index.html.twig');
    }

    /**
     * @Route("/article/create")
     */
     public function save()
     {
         $entityManager = $this->getDoctrine()->getManager();

         $article = new Article();
         $article->setTitle("Article one");
         $article->setBody('body one');

         $entityManager->persist($article);

         $entityManager->flush();

         return new Response('save new article of id ' . $article->getId());
     }
}
