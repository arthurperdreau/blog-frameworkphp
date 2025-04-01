<?php

namespace App\Controller;

use App\Entity\Post;
use App\Form\PostType;
use App\Repository\CommentRepository;
use App\Repository\PostRepository;
use App\Repository\UserRepository;
use Attributes\DefaultEntity;
use Core\Attributes\Route;
use Core\Controller\Controller;
use Core\Http\Request;
use Core\Http\Response;
use Core\Routing\Router;

#[DefaultEntity(entityName: Post::class)]
class PostController extends Controller
{
    #[Route(uri:'/', routeName: 'posts')]
    public function index(){
        $userRepository=new UserRepository();
        $thePosts=$this->getRepository()->findAll();
        return $this->render('post/index', [
            'posts' => $thePosts,
            'userRepository' => $userRepository
        ]);
    }

    #[Route(uri:'/post/show', routeName: 'post')]
    public function show(): Response
    {

        $id=$this->getRequest()->get(["id"=>"number"]);
        if(!$id){
            return $this->redirectToRoute('posts');
        }
        $post=$this->getRepository()->find($id);
        if(!$post){
            return $this->redirectToRoute('posts');
        }
        $userRepository=new UserRepository();
        $commentRepository=new CommentRepository();
        return $this->render('post/show', [
            'post' => $post,
            'userRepository' => $userRepository,
            'commentRepository' => $commentRepository
        ]);
    }

    #[Route(uri:'/post/create', routeName: 'newPost')]
    public function create(): Response
    {
        if (!isset($_SESSION["user"])) {
            return $this->redirectToRoute("posts");
        }
        $repository=$this->getRepository();
        $post = new Post();
        $postForm = new PostType($repository);

        if ($postForm->isSubmitted()) {
            $id = $postForm->CreatePost($post, new Request());
            return $this->redirectToRoute('post', ["id" => $id]);
        }

        return $this->render('post/create', []);
    }



    #[Route(uri:'/post/update', routeName: 'editPost')]
    public function update(): Response
    {
        if (!isset($_SESSION["user"])) {
            return $this->redirectToRoute("posts");
        }
        $id=$this->getRequest()->get(["id"=>"number"]);
        if(!$id){
            return $this->redirectToRoute('posts');
        }
        $post=$this->getRepository()->find($id);
        if(!$post){
            return $this->redirectToRoute('posts');
        }
        if($_SESSION["user"]["id"]!= $post->getUserId()){
            return $this->redirectToRoute('posts');
        }
        $repository=$this->getRepository();

        $postForm=new PostType($repository);
        if($postForm->isSubmitted()) {
            $post->setTitle($postForm->getValue("title"));
            $post->setContent($postForm->getValue("content"));
            $post = $this->getRepository()->update($post);
            return $this->redirectToRoute('post', ["id" => $post->getId()]);
        }
        return $this->render('post/update', ["post" => $post]);
    }

    #[Route(uri:'/post/delete', routeName: 'deletePost')]
    public function delete(): Response
    {
        if (!isset($_SESSION["user"])) {
            return $this->redirectToRoute("posts");
        }
        $id=$this->getRequest()->get(["id"=>"number"]);
        if(!$id){
            return $this->redirectToRoute('posts');
        }
        $post=$this->getRepository()->find($id);
        if(!$post){
            return $this->redirectToRoute('posts');
        }
        if($_SESSION["user"]["id"]!= $post->getUserId()){
            return $this->redirectToRoute('posts');
        }
        $this->getRepository()->delete($post);
        return $this->redirectToRoute('posts');
    }
}