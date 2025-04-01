<?php

namespace App\Entity;
use App\Repository\CommentRepository;
use Attributes\TargetRepository;
use Core\Attributes\Table;

#[Table(name: 'comments')]
#[TargetRepository(repoName: CommentRepository::class)]
class Comment
{
    private int $id;
    private int $post_id;
    private string $content;
    private int $user_id;

    public function getId(): int
    {
        return $this->id;
    }

    public function getPostId(): int
    {
        return $this->post_id;
    }

    public function setPostId(int $post_id): void
    {
        $this->post_id = $post_id;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): void
    {
        $this->user_id = $user_id;
    }

}