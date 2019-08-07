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
}
