<h3>Edit the post</h3>
<form action="/post/update?id=<?= $post->getId() ?>" method="post" class="form form-control:post">
    <input type="text" name="title" value="<?= $post->getTitle() ?>" placeholder="Title">
    <input type="text" name="content" value="<?= $post->getContent() ?>" placeholder="Content">
    <button class="btn btn-success" type="submit">Edit post</button>
</form>
<a href="/" class="btn btn-secondary">Return</a>
