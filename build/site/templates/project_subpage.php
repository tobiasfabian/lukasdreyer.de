<?php snippet('head') ?>
<?php snippet('header') ?>
<?php snippet('nav') ?>

<main class="project-subpage">
  <a href="<?= $page->parent()->url() ?>" class="project__nav-item--prev">
      <strong><?= $page->parent()->title() ?></strong>
    </a>
  <h2 class="typo-h2"><?= $page->title() ?></h2>
  <div class="typo typo--text">
    <?= $page->text()->kt() ?>
  </div>
</main>

<?php snippet('foot') ?>
