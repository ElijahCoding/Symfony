<?php

namespace App\Repository;

use App\Entity\Post;
use Symfony\Component\HttpFoundation\File\UploadedFile;

interface PostRepositoryInterface
{
    public function getAllPost(): array;

    public function getOnePost(int $postId): object;

    public function setCreatePost(Post $post, UploadedFile $file): object;

    public function setUpdatePost(Post $post, UploadedFile $file): object;

    public function setDeletePost(Post $post): object;
}