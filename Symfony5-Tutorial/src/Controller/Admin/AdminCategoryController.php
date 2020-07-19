<?php

namespace App\Controller\Admin;

use Symfony\Component\Routing\Annotation\Route;

class AdminCategoryController extends AdminBaseController
{
    /**
     * @Route("/admin/admin/category", name="admin_category")
     */
    public function index()
    {
        return $this->render('admin/admin_category/index.html.twig', [
            'controller_name' => 'AdminCategoryController',
        ]);
    }
}
