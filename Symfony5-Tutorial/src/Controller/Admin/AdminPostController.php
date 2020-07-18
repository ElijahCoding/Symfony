<?php

namespace App\Controller\Admin;

use Symfony\Component\Routing\Annotation\Route;

class AdminPostController extends AdminBaseController
{
    /**
     * @Route("/admin/admin/post", name="admin_admin_post")
     */
    public function index()
    {
        return $this->render('admin/admin_post/index.html.twig', [
            'controller_name' => 'AdminPostController',
        ]);
    }
}
