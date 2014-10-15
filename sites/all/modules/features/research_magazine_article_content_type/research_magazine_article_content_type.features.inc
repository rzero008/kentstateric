<?php
/**
 * @file
 * research_magazine_article_content_type.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function research_magazine_article_content_type_ctools_plugin_api($module = NULL, $api = NULL) {
  if ($module == "strongarm" && $api == "strongarm") {
    return array("version" => "1");
  }
}

/**
 * Implements hook_node_info().
 */
function research_magazine_article_content_type_node_info() {
  $items = array(
    'research_magazine_article' => array(
      'name' => t('Research Magazine Article'),
      'base' => 'node_content',
      'description' => t('Articles for the research magazine'),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  drupal_alter('node_info', $items);
  return $items;
}
