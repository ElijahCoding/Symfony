<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class ArticleController
{
    /**
     * @Route("/")
     * @Method({"GET"})
     */
    public function index()
    {
        return new Response('<h1>Hi</h1>');
    }
}
