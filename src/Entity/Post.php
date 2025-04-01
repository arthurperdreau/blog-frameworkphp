<?php

namespace App\Entity;
use App\Repository\CommentRepository;
use App\Repository\PostRepository;
use Attributes\TargetRepository;
use Core\Attributes\Table;
use DateTime;

#[Table(name: 'posts')]
#[TargetRepository(repoName: PostRepository::class)]
class Post
{
    private int $id;
    private string $title;
    private string $content;
    private int $user_id;

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function getComments()
    {
        $commentRepository = new CommentRepository();
        return $commentRepository-> getCommentsByPost($this);

    }

    public function getUserId(): string
    {
        return $this->user_id;
    }

    public function setUserId(string $user_id): void
    {
        $this->user_id = $user_id;
    }


}