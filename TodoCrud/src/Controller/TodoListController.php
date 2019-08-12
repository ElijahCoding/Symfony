<?php

namespace App\Controller;

use App\Entity\Task;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\{Request, Response};

class TodoListController extends AbstractController
{
    /**
     * @Route("/todo/list", name="todo_list")
     */
    public function index()
    {
        $tasks = $this->getDoctrine()
                      ->getRepository(Task::class)
                      ->findBy([], [ 'id' => 'Desc' ]);

        return $this->render('index.html.twig', [
            'tasks' => $tasks
        ]);
    }

    /**
     * @Route("/todo/create", name="create_task", methods={"POST"})
     */
    public function create(Request $request)
    {
        if(empty($title = trim($request->request->get('title'))))
        return $this->redirectToRoute('todo_list');

        $request->request->get('title');
        $entityManager = $this->getDoctrine()->getManager();

        $task = new Task();
        $task->setTitle($title);

        $entityManager->persist($task);
        $entityManager->flush();

        return $this->redirectToRoute('todo_list');
    }

    /**
     * @Route("/switch-status/{id}", name="switch_status")
     */
    public function switchStatus($id)
    {
          exit('to do: switch status of the task!'. $id);
    }

    /**
     * @Route("/delete/{id}", name="task_delete")
     */
    public function delete($id)
    {
        exit('to do: delete a task with the id of !'. $id);
    }
}
