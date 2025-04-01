<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Form\CommentType;
use Attributes\DefaultEntity;
use Core\Attributes\Route;
use Core\Controller\Controller;
use Core\Http\Response;

#[DefaultEntity(entityName: Comment::class)]
class CommentController extends Controller
{
    #[Route("/comment/new", routeName: "newComment", methods: ["POST"])]
public function save(): Response
{

    $commentForm=new CommentType();
    if($commentForm->isSubmitted()){
        if (!isset($_SESSION["user"])) {
            return $this->redirectToRoute("posts");
        }
        $comment=new Comment();
        $comment->setContent($commentForm->getValue('content'));
        $comment->setPostId($commentForm->getValue('postId'));
        $comment->setUserId($_SESSION["user"]["id"]);
        $this->getRepository()->save($comment);
        return $this->redirectToRoute('post', ['id' => $comment->getPostId()]);

    }
    return $this->redirectToRoute('posts');
}

}