<?php

/*

---------------------------------------
License Setup
---------------------------------------

Please add your license key, which you've received
via email after purchasing Kirby on http://getkirby.com/buy

It is not permitted to run a public website without a
valid license key. Please read the End User License Agreement
for more information: http://getkirby.com/license

*/

c::set('license', 'put your license key here');

/*

---------------------------------------
Kirby Configuration
---------------------------------------

By default you don't have to configure anything to
make Kirby work. For more fine-grained configuration
of the system, please check out http://getkirby.com/docs/advanced/options

*/

c::set('cachebuster', true);

c::set('debug', true);
c::set('thumbs.quality', 80);
c::set('thumbs.driver','im');
c::set('locale','de_DE');
c::set('languages', array(
  array(
    'default' => true,
    'code'    => 'de',
    'name'    => 'Deutsch',
    'locale'  => 'de_DE.utf-8',
    'url'     => '/',
  ),
  array(
    'code'    => 'en',
    'name'    => 'English',
    'locale'  => 'en_GB.utf-8',
    'url'     => '/en',
  ),
));
c::set('routes', array(
  array(
    'pattern' => 'termine/(:any)',
    'action'  => function() {
      return page('termine');
    }
  ),
  array(
    'pattern' => 'en/termine/(:any)',
    'action'  => function() {
      return site()->visit('termine', 'en');
    }
  )
));


c::set('textarea.autocomplete', true);
c::set('textarea.buttons', array(
  "h3",
  "bold",
  "link",
  "page"
));
