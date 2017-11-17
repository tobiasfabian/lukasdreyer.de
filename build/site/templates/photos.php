<?php snippet('head') ?>
<?php snippet('header') ?>
<?php snippet('nav') ?>

<main class="photos">
  <?php
    foreach($page->gallery()->toStructure() as $item):
      if ($image = $item->toFile()):
  ?>
  <figure class="photos__figure">
    <img class="photos__img" src="<?= thumb($image, array('width' => 872))->url() ?>" srcset="<?= thumb($image, array('width' => 872*2))->url() ?> 1744w, <?= thumb($image, array('width' => 872))->url() ?> 872w, <?= thumb($image, array('width' => 750))->url() ?> 750w, <?= thumb($image, array('width' => 436))->url() ?> 436w" alt="<?= $image->alt() ?>">
    <figcaption class="photos__figcaption">
      <?= $image->figcaption() ?>
      <a href="<?= $image->url() ?>" download><?= l::get('download') ?></a>
    </figcaption>
  </figure>
  <?php
      endif;
    endforeach;
  ?>
</main>

<?php snippet('foot') ?>
