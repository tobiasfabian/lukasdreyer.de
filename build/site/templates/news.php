<?php snippet('head') ?>
<?php snippet('header') ?>
<?php snippet('nav') ?>

<main class="news">
  <ul class="news-list">
  <?php
  foreach($page->children()->visible()->flip() as $news_item):
    $date = strtotime($news_item->published());
  ?>
  <li class="news-list__item">
    <a href="<?= $news_item->url() ?>">
      <strong>
        <?= $news_item->title() ?>
      </strong>
      <time datetime="<?= date('c', $date) ?>">
        <?= strftime('%e. %B %Y', $date) ?>
      </time>
    </a>
  </li>
    </li>
  <?php endforeach; ?>
  </ul>

  <div class="news__footer">
    <a href="<?= $site->homePage()->url() ?>"><?= l::get('close news') ?></a>
  </div>

</main>

<?php snippet('foot') ?>
