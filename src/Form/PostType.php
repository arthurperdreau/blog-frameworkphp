<?php

namespace App\Form;

use Core\Form\FormType;
use Core\Form\FormParam;
use App\Entity\Post;
use Core\Http\Request;
use App\Repository\PostRepository;
use Core\Routing\Router;

class PostType extends FormType
{
    private PostRepository $repository;

    public function __construct(PostRepository $repository)
    {
        $this->repository = $repository;
        $this->build();
    }

    private function build(): void
    {
        $this->add(new FormParam("title", "string"));
        $this->add(new FormParam("content", "string"));
    }

    public function CreatePost(Post $post, Request $request): int
    {
        $post->setTitle($this->getValue("title"));
        $post->setContent($this->getValue("content"));
        $post->setUserId($_SESSION["user"]["id"]);

        return $this->repository->save($post); //-> return de l'id
    }
}