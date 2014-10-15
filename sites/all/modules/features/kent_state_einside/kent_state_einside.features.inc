<?php
/**
 * @file
 * kent_state_einside.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function kent_state_einside_ctools_plugin_api($module = NULL, $api = NULL) {
  if ($module == "strongarm" && $api == "strongarm") {
    return array("version" => "1");
  }
}

/**
 * Implements hook_node_info().
 */
function kent_state_einside_node_info() {
  $items = array(
    'einside' => array(
      'name' => t('Einside'),
      'base' => 'node_content',
      'description' => '',
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
    'einside_profile' => array(
      'name' => t('Einside Profile'),
      'base' => 'node_content',
      'description' => '',
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  drupal_alter('node_info', $items);
  return $items;
}
