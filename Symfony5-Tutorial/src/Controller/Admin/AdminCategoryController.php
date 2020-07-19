<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AdminCategoryController extends AdminBaseController
{
    /**
     * @Route("/admin/category", name="admin_category")
     */
    public function index()
    {
        $category = $this->getDoctrine()->getRepository(Category::class)->findAll();
        $forRender = parent::renderDefault();
        $forRender['title'] = 'Категории';
        $forRender['category'] = $category;

        return $this->render('admin/category/index.html.twig', $forRender);
    }

    /**
     * @Route("/admin/category/create", name="admin_category_create")
     * @param Request $request
     */
    public function create(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $category = new Category();
    }
}
