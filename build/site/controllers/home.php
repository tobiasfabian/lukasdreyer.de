<?php
return function($site, $pages, $page) {
  function getEvents($site) {
    $dates = page('termine');
    $shows = $dates->children()->visible();
    $events = new Collection();
    foreach($dates->content('de')->dates()->toStructure() as $date) {
      $event = new Collection();
      $showId = str::slug($date->title());
      $slug = $showId . '-' . date('d-m-y', $date->date());
      $url = $site->page('termine')->url().'/'.$slug;
      $enddate = $date->enddate()->isEmpty() ? false : strtotime($date->enddate());
      $event->append('showId', $showId);
      $event->append('id', $slug);
      $event->append('url', $url);
      $event->append('date', $date->date());
      $event->append('enddate', $enddate);
      $event->append('title', $date->title());
      $event->append('subtitle', $date->subtitle());
      $event->append('project', $date->project());
      $event->append('venue', $date->venue());
      $event->append('city', $date->city());
      $event->append('street', $date->street());
      $events->append($events->count(), $event);
    }
    foreach($shows as $show) {
      foreach($show->dates()->toStructure() as $date) {
        $event = new Collection();
        $showId = str::slug($show->title());
        $slug = $showId . '-' . date('d-m-y', $date->date());
        $url = $site->page('termine')->url().'/'.$slug;
        $enddate = $date->enddate()->isEmpty() ? false : strtotime($date->enddate());
        $event->append('id', $slug);
        $event->append('showId', $showId);
        $event->append('url', $url);
        $event->append('date', $date->date());
        $event->append('enddate', $enddate);
        $event->append('project', $show->project());
        if (!$date->title()->isEmpty()) {
          $event->append('title', $date->title());
        } else {
          $event->append('title', $show->title());
        }
        if (!$date->subtitle()->isEmpty()) {
          $event->append('subtitle', $date->subtitle());
        } else {
          $event->append('subtitle', $show->subtitle());
        }
        if (!$date->venue()->isEmpty()) {
          $event->append('venue', $date->venue());
        } else {
          $event->append('venue', $show->venue());
        }
        if (!$date->city()->isEmpty()) {
          $event->append('city', $date->city());
        } else {
          $event->append('city', $show->city());
        }
        if (!$date->street()->isEmpty()) {
          $event->append('street', $date->street());
        } else {
          $event->append('street', $show->street());
        }
        if (!$date->text()->isEmpty()) {
          $event->append('text', $date->text());
        } else {
          $event->append('text', $show->text());
        }
        $events->append($events->count(), $event);
      }
    }
    $events = $events->sortBy('date');
    return $events;
  }
  $events = getEvents($site);
  return array(
    'events' => $events
  );
};
