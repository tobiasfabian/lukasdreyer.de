<div class="show">
<?php if ($event): ?>
  <time class="show__date" datetime="<?= date('c', $event->date()) ?>">
    <div class="show__date-day">
      <?= strftime('%A', $event->date()) ?>,<br>
      <?= date('j', $event->date()) ?>. <?= strftime('%B', $event->date()) ?>
      <?php if (!$event->enddate()): ?>
        <br><?= date('Y', $event->date()) ?>
      <?php endif; ?>
      <?php if (date('G:i', $event->date()) !== '0:00') : ?>
      <div class="show__date-hour">
        <?= l::get('start') ?>: <?= date('G', $event->date()) ?><?=  date('i', $event->date()) !== '00' ? date(':i', $event->date()) : '' ?> <?= l::get('o’ clock') ?>
      </div>
      <?php endif; ?>
      <?php if ($event->enddate()): ?>
        <?php if (date('ymd', $event->date()) !== date('ymd', $event->enddate())): ?>
          <div class="show__until" aria-label="<?= l::get('until') ?>">—</div>
          <?= strftime('%A', $event->enddate()) ?>,<br>
          <?= date('j', $event->enddate()) ?>. <?= strftime('%B', $event->enddate()) ?>
          <br><?= date('Y', $event->enddate()) ?>
        <?php endif; ?>
        <?php if (date('G:i', $event->enddate()) !== '0:00') : ?>
          <div class="show__date-hour">
            <?= l::get('end') ?>: <?= date('G', $event->enddate()) ?><?=  date('i', $event->enddate()) !== '00' ? date(':i', $event->enddate()) : '' ?> <?= l::get('o’ clock') ?>
          </div>
        <?php endif; ?>
      <?php endif; ?>
    </div>
  </time>
  <div class="show__location">
    <?= !$event->venue()->isEmpty() ? $event->venue().'<br>' : '' ?>
    <?= !$event->street()->isEmpty() ? $event->street().'<br>' : '' ?>
    <?= $event->city() ?>
  </div>
  <h2>
    <?php if (!$event->project()->isEmpty()): ?>
    <em><?= $event->project() ?></em>
    <?php endif; ?>
    <strong><?= $event->title() ?></strong>
    <?= $event->subtitle() ?>
  </h2>
  <div class="typo">
  <?php if ($event->text()): ?>
    <?= $event->text()->kt() ?>
  <?php endif; ?>
  </div>
  <?php if ($relatedEvents->count() > 0): ?>
  <div class="related-events">
    <h3><?= l::get('more dates') ?></h3>
    <ol class="related-events__list">
    <?php foreach($relatedEvents->flip() as $relatedEvent): ?>
      <li class="related-events__item">
        <a class="related-events__link" href="<?= $relatedEvent->url() ?>">
          <time class="related-events__time">
            <span class="related-events__time-wd"><?= strftime('%a,', $relatedEvent->date()) ?></span>
            <span class="related-events__time-d"><?= strftime('%d.', $relatedEvent->date()) ?></span>
            <?= strftime('%b %Y', $relatedEvent->date()) ?>
          </time>
          <span class="related-events__place">
            <?= $relatedEvent->city() ?>
          </span>
        </a>
      </li>
    <?php endforeach; ?>
    </ol>
  </div>
  <?php endif; ?>
<?php endif;?>
</div>
<?php
$json = array();
$json['@context'] = 'http://schema.org';
$json['@type'] = 'Event';
$json['name'] = (string)$event->title();
if ($event->subtitle()->isNotEmpty()) {
  $json['name'] = (string)$event->title() . ' – ' . (string)$event->subtitle();
}
$json['description'] = (string)$event->text();
$json['startDate'] = date('Y-m-d\TH:i:s', $event->date());
if ($event->enddate()) {
  $json['endDate'] = date('Y-m-d\TH:i:s', $event->enddate());
}
$json['location'] = array();
$json['location']['@type'] = 'place';
$json['location']['name'] = (string)$event->venue();
$json['location']['address'] = array();
$json['location']['address']['@type'] = 'PostalAddress';
$json['location']['address']['streetAddress'] = (string)$event->street();
$json['location']['address']['addressLocality'] = (string)$event->city();
$json['performer']['@type'] = 'Person';
$json['performer']['name'] = (string)$site->title();
if ($event->project()->isNotEmpty()) {
  $json['performer']['@type'] = 'PerformingGroup';
  $json['performer']['name'] = (string)$event->project();
}
?>
<script type="application/ld+json">
<?= json_encode($json) ?>
</script>
