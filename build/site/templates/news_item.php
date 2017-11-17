<?php snippet('head') ?>
<?php snippet('header') ?>
<?php snippet('nav') ?>

<main class="news-item">
  <h2 class="typo-h2"><?= $page->title() ?></h2>
  <time class="news-item__date" datetime="<?= date('c', strtotime($page->published())) ?>">
    <?= strftime('%e. %B %Y', strtotime($page->published())) ?>
  </time>
  <div class="typo typo--text">
    <?= $page->text()->kt() ?>
  </div>
</main>
<aside class="news-related">
  <div class="news-related__content">
    <h2><?= l::get('more news') ?></h2>
    <ul class="news-list">
    <?php
    foreach($page->siblings(false)->visible()->flip() as $news_item):
      $date = strtotime($news_item->published());
    ?>
    <li class="news-list__item">
      <a href="<?= $news_item->url() ?>">
        <time datetime="<?= date('c', $date) ?>">
          <?= strftime('%e. %B %Y', $date) ?>
        </time>
        <strong>
          <?= $news_item->title() ?>
        </strong>
      </a>
    </li>
      </li>
    <?php endforeach; ?>
    </ul>
  </div>
</aside>

<?php snippet('foot') ?>
