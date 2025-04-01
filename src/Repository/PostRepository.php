<?php

namespace App\Repository;

use App\Entity\Post;
use Attributes\TargetEntity;

use Core\Repository\Repository;
#[TargetEntity(entityName: Post::class)]
class PostRepository extends Repository
{
    public function save(Post $post):int
    {
        $this->pdo->prepare("INSERT INTO $this->tableName (title, content, user_id) VALUES (:title, :content, :user_id)")->execute(["title" => $post->getTitle(), "content" => $post->getContent(), "user_id" => $post->getUserId()]);
        return $this->pdo->lastInsertId();
    }

    public function update(Post $post):Post
    {
        $this->pdo->prepare("UPDATE $this->tableName SET title=:title, content=:content, user_id=:user_id WHERE id=:id")->execute([
            "title" => $post->getTitle(),
            "content" => $post->getContent(),
            "id" => $post->getId(),
            "user_id" => $post->getUserId()
        ]);
        return $this->find($post->getId());
    }

}