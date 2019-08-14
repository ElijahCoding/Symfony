<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use App\Repository\{TaskListRepository, TaskRepository};
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Symfony\Component\HttpFoundation\{Response, Request};

class ListController extends AbstractFOSRestController
{
    /**
     * @var TaskListRepository
     */
    private $taskListRepository;

    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * @var TaskRepository
     */
    private $taskRepository;

    public function __construct(
            TaskListRepository $taskListRepository,
            TaskRepository $taskRepository,
            EntityManagerInterface $entityManager
        )
    {
        $this->taskListRepository = $taskListRepository;
    }

    /**
     * @return \FOS\RestBundle\View\View
     */
    public function getListsAction()
    {
        $data = $this->taskListRepository->findAll();

        return $this->view($data, Response::HTTP_OK);
    }

    public function postListsAction()
    {

    }
}
