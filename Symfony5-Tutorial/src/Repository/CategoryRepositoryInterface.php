<?php

namespace App\Repository;

use App\Entity\Category;

interface CategoryRepositoryInterface
{
    public function getAllCategory(): array;

    public function getOneCategory(int $categoryId): object;

    public function setCreateCategory(Category $category): object;

    public function setUpdateCategory(Category $category): object;

    public function setDeleteCategory(Category $category): object;
}