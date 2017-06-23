# Kirby Enhanced Textarea v1.4 <a href="https://www.paypal.me/medienbaecker"><img width="99" src="http://www.medienbaecker.com/beer.png" alt="Buy me a beer" align="right"></a>

This textarea extends the built-in textarea without reinventing the wheel. Handy and customizable headline functions, intelligent list buttons and a custom page selector make editing textareas a breeze.

![Preview](https://cloud.githubusercontent.com/assets/7975568/26114866/b3d1ee64-3a5e-11e7-8da6-0154f5e3399f.gif)

## Installation

Download or clone this repository, put the folder into your `site/fields` folder and rename it to `textarea`. Alternatively you can also use the [Kirby CLI](https://github.com/getkirby/cli).

## Configuration

### Headlines

You can change the headline buttons to any headline from 1-6 in the `site/config.php`. The function, the shortcut (meta+1, meta+2, ...) as well as the icon number will adjust accordingly.

Example:
````
c::set('textarea.h1', 'h2');
c::set('textarea.h2', 'h3');
c::set('textarea.h3', 'h4');
````

### Buttons

You can globally define default buttons for any textarea on your site by setting the `textarea.buttons` variable in your `config.php`. By default the buttons `h2` (headline 2), `h3` (headline 3), `bold`, `italic`, `ulist` (unordered list), `olist` (ordered list), `link`, `page` and `email` are displayed. There's also a `blockquote` and `h1` button you can use.

````
c::set('textarea.buttons', array(
  "h1"
  "blockquote",
  "link",
  "page"
));
````


If you want to override this for a single field just use `buttons:` as you would with the built-in textarea:

````
test:
  type: textarea
  buttons:
    - h1
    - h2
    - bold
    - olist
    - link
````
