<?php snippet('head') ?>
<?php snippet('header') ?>
<?php snippet('nav') ?>

<?php snippet('cross') ?>

<div class="info">
<?php foreach($page->info()->toStructure() as $item):
  $image = $item->picture()->toFile() ?>
  <div class="info__item">
    <img src="<?= thumb($image, array('width' => 464, 'height' => 298, 'crop' => true))->url() ?>" srcset="<?= thumb($image, array('width' => 464, 'height' => 298, 'crop' => true))->url() ?> 464w, <?= thumb($image, array('width' => 464*2, 'height' => 298*2, 'crop' => true))->url() ?> 928w" sizes="464px" alt="">
    <h2><span><?= $item->title() ?></span></h2>
    <p class="info__text">
      <?= $item->text() ?>
    </p>
  </div>
<?php endforeach; ?>
</div>

<?php snippet('foot') ?>
