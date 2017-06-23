<header class="header">
  <h1 class="logo">
    <a href="<?= $site->homePage()->url() ?>">
      <picture>
        <source srcset="<?= url('assets/images/logo-lukas-dreyer-2.png') ?> 1x, <?= url('assets/images/logo-lukas-dreyer-2@2x.png') ?> 2x" media="(max-width: 444px)">
        <img src="<?= url('assets/images/logo-lukas-dreyer.png') ?>" srcset="<?= url('assets/images/logo-lukas-dreyer.png') ?> 1x, <?= url('assets/images/logo-lukas-dreyer@2x.png') ?> 2x" alt="Logo: <?= $site->title()->html() ?>">
      </picture>
      <span class="is-hidden"><?= $site->title()->html() ?></span>
    </a>
  </h1>
</header>
