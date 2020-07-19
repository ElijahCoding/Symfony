<?php

namespace App\Controller\Admin;

use Symfony\Component\Routing\Annotation\Route;

class AdminHomeController extends AdminBaseController
{
    /**
     * @Route("/admin/admin/home", name="admin_home")
     */
    public function index()
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminHomeController',
        ]);
    }
}