<?php snippet('head') ?>
<?php snippet('header') ?>
<?php snippet('nav') ?>

<main class="contact">
  <div class="contact__links">
    <div class="contact__email">
      <h2 class="typo-h5">E-Mail</h2>
      <a href="mailto:<?= $page->email() ?>"><?= $page->email() ?></a>
    </div>
    <div class="contact__sm">
      <h2 class="typo-h5">Soziale Netzwerke</h2>
      <?php foreach($page->social_media()->toStructure() as $item): ?>
      <a href="<?= $item->url() ?>"><?= $item->title() ?></a>
      <?php endforeach; ?>
    </div>
  </div>
  <div class="contact__newsletter">
    <h2 class="typo-h5">Newsletter</h2>
    <form action="//hairdryermusic.us9.list-manage.com/subscribe/post?u=9ad7352889b6c2ec15d538ab6&amp;id=abac7d98f7" method="post">
      <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_9ad7352889b6c2ec15d538ab6_abac7d98f7" tabindex="-1" value=""></div>
      <input type="email" name="EMAIL" required placeholder=" ">
      <input type="submit" name="subscribe" value="eintragen">
    </form>
    <p><?= $page->newsletter_text() ?></p>
  </div>
  <div class="contact__text typo typo--text-2">
    <?= $page->text()->kt() ?>
  </div>
</main>

<?php snippet('foot') ?>
