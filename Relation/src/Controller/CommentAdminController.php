<?php

namespace App\Controller;

use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Repository\CommentRepository;

class CommentAdminController extends Controller
{
    /**
     * @Route("/admin/comment", name="comment_admin")
     */
    public function index(
        CommentRepository $repository,
        Request $request,
        PaginatorInterface $paginator
    )
    {
        $q = $request->query->get('q');
        $queryBuilder = $repository->getWithSearchQueryBuilder($q);

        // $comments = $repository->findAllBySearch($q);

        $pagination = $paginator->paginate(
            $queryBuilder, /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            10 /*limit per page*/
        );

        return $this->render('comment_admin/index.html.twig', [
            'pagination' => $pagination
        ]);
    }
}
