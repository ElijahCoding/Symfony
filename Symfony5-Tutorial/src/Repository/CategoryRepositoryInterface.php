<?php

namespace App\Repository;

use App\Entity\Category;

interface CategoryRepositoryInterface
{
    public function getAllCategory(): array;

    public function getOneCategory(): object;

    public function setCreateCategory(Category $category): object;

    public function setDeleteCategory(Category $category): object;
}