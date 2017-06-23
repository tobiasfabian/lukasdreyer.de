<?php snippet('head') ?>
<?php snippet('header') ?>
<?php snippet('nav') ?>

<main class="vita">
  <div class="vita__heading">
    <h3><?= $page->heading_1()->kt() ?></h3>
    <h2><?= $page->heading_2() ?></h2>
  </div>
  <div class="typo typo--text">
    <?= $page->text()->kt() ?>
  </div>
</main>

<?php snippet('foot') ?>
