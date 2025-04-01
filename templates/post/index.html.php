<h1>The posts</h1>
<?php //var_dump($_SESSION["user"]["id"]); ?>
<?php foreach ($posts as $post):
    $user=$userRepository->findByUser_id($post->getUserId());
    //var_dump($user); ?>
    <div class="border border-dark">
        <h3><?=  $post->getTitle() ?></h3>
        <p><?=  $post->getContent() ?></p>
        <p><?= $user[0]->getUsername() ?></p>
        <a href="/post/show?id=<?= $post->getId() ?>" class="btn btn-primary">Read</a>

    </div>
<?php endforeach; ?>

