
<div class="card mt-4">
  <div class="card-header">Title : <?= $songs['title']; ?></div>
  <div class="card-body">
    <h3 class="card-title">Artist : <?= $songs['artist']; ?></h3>
    <h5 class="card-title">Created At: <?= $songs['artist']; ?></h5>

    <p class="card-text mt-4"><p>Lyrics:</p><?= $songs['lyrics']; ?></p>
    <a href="<?= base_url();?>" class="btn btn-primary" style="float: right;">Return to List</a>
  </div>
</div>