<div class="border border-dark">
    <?php $user=$userRepository->findByUser_id($post->getUserId()) ?>
    <h3><?=  $post->getTitle() ?></h3>
    <p><?=  $post->getContent() ?></p>
    <p>From : <?= $user[0]->getUsername() ?></p>

    <a href="/" class="btn btn-secondary">Back</a>
    <a href="/post/delete?id=<?= $post->getId() ?>" class="btn btn-danger">Delete</a>
    <a href="/post/update?id=<?= $post->getId() ?>" class="btn btn-warning">Edit</a>

</div>
<div class="border border-blue mt-3 p-3">
    <?php foreach ($post->getComments() as $comment){ ?>
        <?php $user=$userRepository->findByUser_id($comment->getUserId()) ?>
        <p>From : <?= $user[0]->getUsername() ?></p>
        <span class="fs-4 bolder"><?= $comment->getContent() ?></span>
        <br>
    <?php } ?>

</div>
<div class="border border-dark">
    <form class="form form-control" action="/comment/new?postId=" method="post">
        <input type="text" name="content" class="form-control:text">
        <input type="hidden" name="postId" value="<?=$post->getId()?>">
        <button type="submit">Send</button>
    </form>

</div>
