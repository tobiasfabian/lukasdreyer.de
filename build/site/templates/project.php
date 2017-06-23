<?php
$prevProject = $page->hasPrevVisible() ? $page->prevVisible() : $page->siblings()->visible()->last();
$nextProject = $page->hasNextVisible() ? $page->nextVisible() : $page->siblings()->visible()->first();
?>

<?php snippet('head') ?>
<?php snippet('header') ?>
<?php snippet('nav') ?>

<main class="cross cross--project project">
  <div class="project__text">
    <h2 class="typo-h3"><?= $page->title() ?></h2>
    <div class="typo">
      <?= $page->text()->kt() ?>
    </div>
    <?php if ($page->link()->isNotEmpty()): ?>
    <a class="bttn" href="<?= $page->link() ?>" target="_blank">
      <?= str::split($page->link(),'://')[1] ?>
    </a>
    <?php endif; ?>
  </div>
  <a href="<?= $prevProject->url() ?>" class="project__nav-item--prev">
    <strong><?= $prevProject->title() ?></strong>
  </a>
  <a href="<?= $nextProject->url() ?>" class="project__nav-item--next">
    <strong><?= $nextProject->title() ?></strong>
  </a>
</main>

<?php snippet('foot') ?>
