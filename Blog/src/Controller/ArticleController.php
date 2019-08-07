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
        $articles = $this->getDoctrine()
                         ->getRepository(Article::class)
                         ->findAll();

        return $this->render('articles/index.html.twig', [
            'articles' => $articles
        ]);
    }

    /**
     * @Route("/article/{id}")
     * @Method({"GET"})
     */
     public function show()
     {
         
     }
}
