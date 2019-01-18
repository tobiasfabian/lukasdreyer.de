<?php snippet('head') ?>
<?php snippet('header') ?>
<?php snippet('nav') ?>

<main class="cross cross--projects projects">
  <div class="projects__text">
    <ul>
    <?php foreach($site->page('projekte')->children()->visible() as $project): ?>
      <li class="cross-projects__item">
        <a href="<?= $project->url() ?>">
          <strong><?= $project->title() ?></strong>
          <em><?= $project->teaser() ?></em>
        </a>
      </li>
    <?php endforeach; ?>
    </ul>
  </div>
</main>

<?php snippet('foot') ?>
