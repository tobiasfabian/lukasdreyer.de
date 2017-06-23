<?php snippet('head') ?>
<?php snippet('header') ?>
<?php snippet('nav') ?>
<div class="dates<?= $event ? ' has-active-event' : ' is-list-only' ?>">
  <div class="dates__list">
    <?php snippet('datesList', array('events' => $events, 'event' => $event)) ?>
  </div>
  <?php if ($event): ?>
    <?php snippet('show') ?>
    <a class="dates__close" href="<?= $page->url() ?>">
      <span>Termin schließen</span>
    </a>
  <?php else: ?>
    <div class="dates__sketch">
      <img src="<?= thumb($site->image('skizze--gray.png'), array('width' => 412))->url() ?>" srcset="<?= thumb($site->image('skizze--gray.png'), array('width' => 412))->url() ?> 412w, <?= thumb($site->image('skizze--gray.png'), array('width' => 412*2))->url() ?> 824w" sizes="412px" alt="Skizze von Lukas Dreyer">
    </div>
    <a class="dates__close" href="<?= $site->url() ?>">
      <span>Termine schließen</span>
    </a>
  <?php endif; ?>
</div>

<?php snippet('foot') ?>
