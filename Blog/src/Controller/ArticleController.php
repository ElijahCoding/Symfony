<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Controller\Controller;

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
}
