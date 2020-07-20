<?php

namespace App\Repository;

use App\Entity\Category;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Category|null find($id, $lockMode = null, $lockVersion = null)
 * @method Category|null findOneBy(array $criteria, array $orderBy = null)
 * @method Category[]    findAll()
 * @method Category[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategoryRepository extends ServiceEntityRepository implements CategoryRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Category::class);
    }

    public function getAllCategory(): array
    {
        // TODO: Implement getAllCategory() method.
    }

    public function getOneCategory(): object
    {
        // TODO: Implement getOneCategory() method.
    }

    public function setCreateCategory(Category $category): object
    {
        // TODO: Implement setCreateCategory() method.
    }

    public function setDeleteCategory(Category $category): object
    {
        // TODO: Implement setDeleteCategory() method.
    }
}
