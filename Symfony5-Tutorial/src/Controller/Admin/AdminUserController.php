<?php

namespace App\Controller\Admin;

use Symfony\Component\Routing\Annotation\Route;

class AdminUserController extends AdminBaseController
{
    /**
     * @Route("/admin/admin/user", name="admin_admin_user")
     */
    public function index()
    {
        return $this->render('admin/admin_user/index.html.twig', [
            'controller_name' => 'AdminUserController',
        ]);
    }
}
