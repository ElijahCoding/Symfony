<?php

namespace App\Controller\Admin;

use Symfony\Component\Routing\Annotation\Route;

class AdminHomeController extends AdminBaseController
{
    /**
     * @Route("/admin/admin/home", name="admin_admin_home")
     */
    public function index()
    {
        return $this->render('admin/admin_home/index.html.twig', [
            'controller_name' => 'AdminHomeController',
        ]);
    }
}
