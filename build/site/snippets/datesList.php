<?php
$isSeparatorShown = false;
?>
<ol class="dates-list">
<?php foreach(($event === false ? $events : $events->flip()) as $eventsItem): ?>
  <?php
    if (!$isSeparatorShown
    && date('ymd', time()) >= date('ymd', ($eventsItem->enddate() ? $eventsItem->enddate() : $eventsItem->date()))
    && !$page->isHomePage()):
      $isSeparatorShown = true;
  ?>
  <li class="event-thumb-seperator">
    <span><?= l::get('today') ?>, <?= strftime('%e. %b %Y', time()) ?></span>
  </li>
  <?php endif; ?>
  <li>
    <a class="event-thumb<?= $eventsItem === $event ? ' is-active' : '' ?>" href="<?= $eventsItem->url() ?>">
      <span class="event-thumb__city">
        <?= $eventsItem->city() ?>
      </span>
      <?php if (!$eventsItem->project()->isEmpty()): ?>
      <em class="event-thumb__project">
        <?= $eventsItem->project() ?>
      </em>
      <?php endif; ?>
      <br>
      <strong class="event-thumb__title">
        <?= $eventsItem->title() ?>
      </strong>
      <span class="event-thumb__subtitle">
        <?= $eventsItem->subtitle() ?>
      </span>
      <div class="event-thumb__date">
        <time datetime="<?= date('c', $eventsItem->date()) ?>">
          <?php if ($eventsItem->enddate() && date('m', $eventsItem->date()) === date('m', $eventsItem->enddate())) : ?>
            <?= date('d', $eventsItem->date()) ?>
          <?php else: ?>
            <?= date('d', $eventsItem->date()) ?>
            <span><?= strftime('%b', $eventsItem->date()) ?></span>
          <?php endif; ?>
        </time>
        <?php if ($eventsItem->enddate()) :?>
          <time datetime="<?= date('c', $eventsItem->enddate()) ?>">
            <?= date('d', $eventsItem->enddate()) ?>
            <span><?= strftime('%b', $eventsItem->enddate()) ?></span>
          </time>
        <?php endif; ?>
      </div>
    </a>
  </li>
<?php endforeach; ?>
</ol>
