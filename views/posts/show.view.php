<?php view('partials.head') ?>
    <div class="container">
        <header class="row mt-3 mb-3">
            <div class="col-md-6">
                <h3>
                    <a href="<?= route('/') ?>">Posts</a>
                    - <?= $post->title ?>
                </h3>
            </div>
            <div class="col-md-6 text-right">
                <a href="<?= route('/') ?>" class="btn btn-success">All</a>
                <a href="<?= route('posts.edit', [
                        'post' => $post->id
                    ]) ?>" class="btn btn-info">Edit</a>
                    <a href="javascript:void(0)" class="btn btn-danger"
                        onclick="event.preventDefault();
                                    if(confirm('Are you sure you want to delete this?')) {
                                        document.getElementById('delete-post-form-<?= $post->id ?>').submit();
                                    }">Delete</a>
                    <form action="<?= route('posts.destroy', [
                            'post' => $post->id
                        ]) ?>" method="post" id="delete-post-form-<?= $post->id ?>"
                        style="display:none;"></form>
            </div>
        </header>
    </div>
    <hr>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-8">
                                <h2 class="card-title"><?= $post->title ?></h2>
                            </div>
                            <div class="col-md-4 text-right">
                                <span class="text-muted">Published at: <?= $post->created_at ?></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <p class="card-text">
                                    <?= $post->body ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php view('partials.foot') ?>
