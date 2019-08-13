<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TaskListRepository")
 */
class TaskList
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $background;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $backgroundPath;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Product", mappedBy="list")
     */
    private $tasks;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Task", inversedBy="notes")
     */
    private $task;

    public function __construct()
    {
        $this->tasks = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getBackground(): ?string
    {
        return $this->background;
    }

    public function setBackground(string $background): self
    {
        $this->background = $background;

        return $this;
    }

    public function getBackgroundPath(): ?string
    {
        return $this->backgroundPath;
    }

    public function setBackgroundPath(string $backgroundPath): self
    {
        $this->backgroundPath = $backgroundPath;

        return $this;
    }

    /**
     * @return Collection|Product[]
     */
    public function getTasks(): Collection
    {
        return $this->tasks;
    }

    public function addTask(Product $task): self
    {
        if (!$this->tasks->contains($task)) {
            $this->tasks[] = $task;
            $task->setList($this);
        }

        return $this;
    }

    public function removeTask(Product $task): self
    {
        if ($this->tasks->contains($task)) {
            $this->tasks->removeElement($task);
            // set the owning side to null (unless already changed)
            if ($task->getList() === $this) {
                $task->setList(null);
            }
        }

        return $this;
    }

    public function getTask(): ?Task
    {
        return $this->task;
    }

    public function setTask(?Task $task): self
    {
        $this->task = $task;

        return $this;
    }
}
