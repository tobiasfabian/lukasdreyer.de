<?php
$isSubpage = $site->pages()->visible()->filterBy('isActive', 'true')->count() > 0;
?>
<nav class="nav<?= $isSubpage ? ' is-subpage' : '' ?>">
  <ul>
    <?php if ($isSubpage): ?>
    <li class="nav__item is-homepage">
      <a class="nav__link" href="<?= $site->homePage()->url() ?>"><?= $site->homePage()->title() ?></a>
    </li>
    <?php endif; ?>
  <?php foreach($site->pages()->visible() as $item): ?>
    <li class="nav__item">
      <a class="nav__link<?= $item->isActive() ? ' is-active' : '' ?>" href="<?= $item->url() ?>"><?= $item->title() ?></a>
    </li>
  <?php endforeach ?>
  </ul>
</nav>
