<?php
// echo "<pre>"; var_dump($variables["element"]["#required"]); die();

/**
 * @file
 * This file is empty by default because the base theme chain (Alpha & Omega) provides
 * all the basic functionality. However, in case you wish to customize the output that Drupal
 * generates through Alpha & Omega this file is a good place to do so.
 *
 * Alpha comes with a neat solution for keeping this file as clean as possible while the code
 * for your subtheme grows. Please read the README.txt in the /preprocess and /process subfolders
 * for more information on this topic.
 */

/**
 * Implements hook_css_alter().
 */
function starterkit101_css_alter(&$css) {
  // Get current themes path.
  $theme_path = drupal_get_path('theme', variable_get('starterkit101', NULL));

  // Make alpha-reset.css be the first css to be loaded in HTML.
  $css['sites/all/themes/omega/alpha/css/alpha-reset.css']['group'] = -9999;

  // CSS to remove.
  $exclude = array(
      'misc/vertical-tabs.css' => FALSE,
      'modules/aggregator/aggregator.css' => FALSE,
      'modules/block/block.css' => FALSE,
      'modules/book/book.css' => FALSE,
      'modules/comment/comment.css' => FALSE,
      'modules/dblog/dblog.css' => FALSE,
      'modules/file/file.css' => FALSE,
      'modules/filter/filter.css' => FALSE,
      'modules/forum/forum.css' => FALSE,
      'modules/help/help.css' => FALSE,
      'modules/menu/menu.css' => FALSE,
      'modules/node/node.css' => FALSE,
      'modules/openid/openid.css' => FALSE,
      'modules/poll/poll.css' => FALSE,
    //'modules/profile/profile.css' => FALSE,
      'modules/search/search.css' => FALSE,
      'modules/statistics/statistics.css' => FALSE,
      'modules/syslog/syslog.css' => FALSE,
    //'modules/system/admin.css' => FALSE,
      'modules/system/maintenance.css' => FALSE,
    //'modules/system/system.css' => FALSE,
    //'modules/system/system.admin.css' => FALSE,
    //'modules/system/system.base.css' => FALSE,
      'modules/system/system.maintenance.css' => FALSE,
      'modules/system/system.menus.css' => FALSE,
      'modules/system/system.messages.css' => FALSE,
      'modules/system/system.theme.css' => FALSE,
      'modules/taxonomy/taxonomy.css' => FALSE,
      'modules/tracker/tracker.css' => FALSE,
      'modules/update/update.css' => FALSE,
      'modules/user/user.css' => FALSE,
      'sites/all/modules/views/css/views.css' => FALSE,
      'sites/all/modules/ctools/css/ctools.css' => FALSE,
      'sites/all/themes/omega/alpha/css/alpha-reset.css' => FALSE,
      'sites/all/modules/field_group/horizontal-tabs/horizontal-tabs.css' => FALSE,
      'sites/all/themes/omega/omega/css/formalize.css' => FALSE,
  );

  // Get omega-visuals.css from subthemes css folder.
  if (array_key_exists('sites/all/themes/omega/omega/css/omega-visuals.css', $css)) {
    $css['sites/all/themes/omega/omega/css/omega-visuals.css']['data'] = $theme_path . '/css/omega-visuals.css';
  }

  // Get formalize.css from subthemes css folder.
  if (array_key_exists('sites/all/themes/omega/omega/css/formalize.css', $css)) {
    $css['sites/all/themes/omega/omega/css/formalize.css']['data'] = $theme_path . '/css/formalize.css';
  }

  $css = array_diff_key($css, $exclude);
}

// Textfield
function starterkit101_textfield($variables) {
  $element = $variables ['element'];
  $element ['#attributes']['type'] = 'text';
  element_set_attributes($element, array('id', 'name', 'value', 'size', 'maxlength'));
  _form_set_class($element, array('form-text'));

  $extra = '';
  if ($element ['#autocomplete_path'] && drupal_valid_path($element ['#autocomplete_path'])) {
    drupal_add_library('system', 'drupal.autocomplete');
    $element ['#attributes']['class'][] = 'form-autocomplete';

    $attributes = array();
    $attributes ['type'] = 'hidden';
    $attributes ['id'] = $element ['#attributes']['id'] . '-autocomplete';
    $attributes ['value'] = url($element ['#autocomplete_path'], array('absolute' => TRUE));
    $attributes ['disabled'] = 'disabled';
    $attributes ['class'][] = 'autocomplete';
    $extra = '<input' . drupal_attributes($attributes) . ' />';
  }

  if ($element["#required"]) {
    $element ['#attributes']['required'] = 'required';
  }

  $output = '<input' . drupal_attributes($element ['#attributes']) . '/>';

  return $output . $extra;
}

// Password
function starterkit101_password($variables) {
  $element = $variables ['element'];
  $element ['#attributes']['type'] = 'password';
  element_set_attributes($element, array('id', 'name', 'size', 'maxlength'));
  _form_set_class($element, array('form-text'));

  if ($element["#required"]) {
    $element ['#attributes']['required'] = 'required';
  }

  return '<input' . drupal_attributes($element ['#attributes']) . ' />';
}

// Select
function starterkit101_select($variables) {
  $element = $variables ['element'];
  element_set_attributes($element, array('id', 'name', 'size'));
  _form_set_class($element, array('form-select'));

  if ($element["#required"]) {
    $element ['#attributes']['required'] = 'required';
  }

  return '<select' . drupal_attributes($element ['#attributes']) . '>' . form_select_options($element) . '</select>';
}

// Checkbox
function starterkit101_checkbox($variables) {
  $element = $variables ['element'];
  $element ['#attributes']['type'] = 'checkbox';
  element_set_attributes($element, array('id', 'name', '#return_value' => 'value'));

  // Unchecked checkbox has #value of integer 0.
  if (!empty($element ['#checked'])) {
    $element ['#attributes']['checked'] = 'checked';
  }
  _form_set_class($element, array('form-checkbox'));

  if ($element["#required"]) {
    $element ['#attributes']['required'] = 'required';
  }

  return '<input' . drupal_attributes($element ['#attributes']) . ' />';
}

function starterkit101_preprocess_node(&$vars) {
  if($vars['view_mode'] == 'teaser') {
    $vars['theme_hook_suggestions'][] = 'node__' . $vars['node']->type . '__teaser';
    $vars['theme_hook_suggestions'][] = 'node__' . $vars['node']->nid . '__teaser';
  }
  elseif($vars['view_mode'] == 'full') {
    $vars['theme_hook_suggestions'][] = 'node__' . $vars['node']->type;
    $vars['theme_hook_suggestions'][] = 'node__' . $vars['node']->nid;
  }
}

