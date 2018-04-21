<?php
$metaTitle = $page->title() . ' – ' . $site->title();
if ($page->isHomePage()) {
  $metaTitle = $site->title();
}
if ($page->meta_title()->isNotEmpty()) {
  $metaTitle = $page->meta_title();
}
if (isset($event)) {
  if ($event->subtitle->isNotEmpty()) {
    $metaTitle = $event->title() . ' (' . $event->subtitle()  . ') – ' . $site->title();
  } else {
    $metaTitle = $event->title() . ' – ' . $site->title();
  }
}
?>
<!DOCTYPE html>
<html lang="de">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">

  <?= css('assets/css/style.css') ?>
  <?= js('assets/js/script.js', ['defer' => true]) ?>

  <?php if (isset($event)): ?>
    <meta property="og:url" content="<?= $event->url() ?>" />
  <?php else: ?>
    <meta property="og:url" content="<?= $page->url() ?>" />
  <?php endif; ?>
  <?php if ($page->intendedTemplate() === 'news_item'): ?>
  <meta property="og:type" content="article" />
  <?php endif; ?>
  <meta property="og:title" content="<?= $metaTitle ?>" />
  <?php if (isset($event)) : ?>
    <meta name="description" content="<?= $event->text() ?>">
    <meta property="og:description" content="<?= $event->text() ?>" />
  <?php else: ?>
    <meta name="description" content="<?= $page->meta_description() ?>">
    <meta property="og:description" content="<?= $page->meta_description() ?>" />
  <?php endif; ?>
  <meta property="og:image" content="<?= $site->open_graph_image()->toFile()->url() ?>" />


  <title><?= $metaTitle ?></title>

</head>
<body>
