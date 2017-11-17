<div class="cross">
  <div class="cross__item cross-dates">
    <?php
      $events = $events = $events->filter(function($event) {
        return date('ymd', time()) <= date('ymd', $event->date());
      })->limit(3);
      snippet('datesList', array('events' => $events, 'event' => false));
    ?>
    <a class="bttn" href="<?= $site->page('termine')->url() ?>"><?= l::get('more dates') ?></a>
  </div>
  <div class="cross__item cross-sketch">
    <img src="<?= thumb($site->image('skizze.png'), array('width' => 412))->url() ?>" srcset="<?= thumb($site->image('skizze.png'), array('width' => 412))->url() ?> 412w, <?= thumb($site->image('skizze.png'), array('width' => 412*2))->url() ?> 824w" sizes="412px" alt="<?= l::get('drawing of') ?> Lukas Dreyer">
  </div>
  <div class="cross__item cross-projects">
    <ul>
    <?php foreach($site->page('projekte')->children()->visible()->limit(3) as $project): ?>
      <li class="cross-projects__item">
        <a href="<?= $project->url() ?>">
          <strong><?= $project->title() ?></strong>
          <em><?= $project->teaser() ?></em>
        </a>
      </li>
    <?php endforeach; ?>
    </ul>
  </div>
  <div class="cross__item cross-news">
    <?php
      $news = $site->page('neuigkeiten');
    ?>
    <ul class="news-list">
    <?php
      foreach($news->children()->visible()->flip()->limit(3) as $news_item):
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
    <?php endforeach; ?>
    </ul>
    <a class="bttn" href="<?= $news->url() ?>">
      <?= l::get('more news') ?>
    </a>
  </div>
</div>
