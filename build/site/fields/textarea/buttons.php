<?php

class Buttons {

  static public $setup = array();

  public $texarea = null;
  public $buttons = array();

  public function __construct($textarea, $buttons = array()) {

    $this->textarea = $textarea;

    if(!is_array($buttons)) {
      $this->buttons = c::get('textarea.buttons', array(
        "h2",
        "h3",
        "bold",
        "italic",
        "ulist",
        "olist",
        "link",
        "page",
        "email"
      ));
    } else {
      $this->buttons = $buttons;
    }

  }

  public function __toString() {

    $html  = '<nav class="field-buttons">';
    $html .= '<ul class="nav nav-bar">';

    foreach(static::$setup as $key => $button) {

      if(!in_array($key, $this->buttons)) continue;

      if(!empty($button['action'])) {
        $action = $this->textarea->model()->url('field/' . $this->textarea->name() . '/textarea/' . $button['action']);
      } else {
        $action = null;
      }

      $icon  = '<i class="icon fa fa-' . $button['icon'] . '"></i>';

      if(!empty($button['btext'])) {
        $btext = '<span class="btext">' . $button['btext'] . '</span>';
      } else {
        $btext = null;
      }
      if ($button['icon'])
      $html .= '<li class="field-button-' . $key . '">';
      $html .= html::tag('button', $icon . $btext , array(
        'type'                 => 'button',
        'tabindex'             => '-1',
        'title'                => @$button['label'] . ' (' . @$button['shortcut'] . ')',
        'class'                => 'btn ' . @$button['class'],
        'data-editor-shortcut' => @$button['shortcut'],
        'data-tpl'             => @$button['template'],
        'data-text'            => @$button['text'],
        'data-action'          => $action
      ));

      $html .= '</li>';

    }

    $html .= '</ul>';
    $html .= '</nav>';

    return $html;

  }

}

$h1 = c::get('textarea.h1', 'h1');
$h2 = c::get('textarea.h2', 'h2');
$h3 = c::get('textarea.h3', 'h3');

buttons::$setup = array(
  'h1' => array(
    'label'    => $this->translation['buttons.h1.label'],
    'btext'    => substr($h1, 1),
    'text'     => ' ',
    'shortcut' => 'meta+' . substr($h1, 1),
    'template' => str_repeat("#",substr($h1, 1)) . ' ',
    'class'    => "header",
    'icon'     => 'header'
  ),
  'h2' => array(
    'label'    => $this->translation['buttons.h2.label'],
    'btext'    => substr($h2, 1),
    'text'     => ' ',
    'shortcut' => 'meta+' . substr($h2, 1),
    'template' => str_repeat("#",substr($h2, 1)) . ' ',
    'class'    => "header",
    'icon'     => 'header'
  ),
  'h3' => array(
    'label'    => $this->translation['buttons.h3.label'],
    'btext'    => substr($h3, 1),
    'text'     => ' ',
    'shortcut' => 'meta+' . substr($h3, 1),
    'template' => str_repeat("#",substr($h3, 1)) . ' ',
    'class'    => "header",
    'icon'     => 'header'
  ),
  'bold' => array(
    'label'    => $this->translation['buttons.bold.label'],
    'text'     => $this->translation['buttons.bold.text'],
    'shortcut' => 'meta+b',
    'template' => '**{text}**',
    'icon'     => 'bold'
  ),
  'italic' => array(
    'label'    => $this->translation['buttons.italic.label'],
    'text'     => $this->translation['buttons.italic.text'],
    'shortcut' => 'meta+i',
    'template' => '*{text}*',
    'icon'     => 'italic'
  ),
  'blockquote' => array(
    'label'    => $this->translation['buttons.blockquote.label'],
    'text'     => ' ',
    'shortcut' => 'meta+shift+b',
    'template' => '> ',
    'class'    => "list",
    'icon'     => 'quote-left'
  ),
  'ulist' => array(
    'label'    => $this->translation['buttons.ulist.label'],
    'text'     => ' ',
    'shortcut' => 'meta+u',
    'template' => '- ',
    'class'    => "list",
    'icon'     => 'list-ul'
  ),
  'olist' => array(
    'label'    => $this->translation['buttons.olist.label'],
    'text'     => ' ',
    'shortcut' => 'meta+o',
    'template' => '1. ',
    'class'    => "list",
    'icon'     => 'list-ol'
  ),
  'link' => array(
    'label'    => $this->translation['buttons.link.label'],
    'shortcut' => 'meta+shift+l',
    'action'   => 'link',
    'icon'     => 'chain'
  ),
  'page' => array(
    'label'    => $this->translation['buttons.pagelink.label'],
    'shortcut' => 'meta+shift+p',
    'action'   => 'pagelink',
    'icon'     => 'file'
  ),
  'email' => array(
    'label'    => $this->translation['buttons.email.label'],
    'shortcut' => 'meta+shift+e',
    'action'   => 'email',
    'icon'     => 'envelope'
  ),
);
