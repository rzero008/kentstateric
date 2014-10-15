<?php
/**
 * @file
 * kent_state_events_feeds.features.defaultconfig.inc
 */

/**
 * Implements hook_defaultconfig_features().
 */
function kent_state_events_feeds_defaultconfig_features() {
  return array(
    'kent_state_events_feeds' => array(
      'feeds_tamper_default' => 'feeds_tamper_default',
    ),
  );
}

/**
 * Implements hook_defaultconfig_feeds_tamper_default().
 */
function kent_state_events_feeds_defaultconfig_feeds_tamper_default() {
  $export = array();

  $feeds_tamper = new stdClass();
  $feeds_tamper->disabled = FALSE; /* Edit this to true to make a default feeds_tamper disabled initially */
  $feeds_tamper->api_version = 2;
  $feeds_tamper->id = 'event-xpathparser_5-array_filter';
  $feeds_tamper->importer = 'event';
  $feeds_tamper->source = 'xpathparser:5';
  $feeds_tamper->plugin_id = 'array_filter';
  $feeds_tamper->settings = '';
  $feeds_tamper->weight = 2;
  $feeds_tamper->description = 'Filter empty items';
  $export['event-xpathparser_5-array_filter'] = $feeds_tamper;

  $feeds_tamper = new stdClass();
  $feeds_tamper->disabled = FALSE; /* Edit this to true to make a default feeds_tamper disabled initially */
  $feeds_tamper->api_version = 2;
  $feeds_tamper->id = 'event-xpathparser_5-explode';
  $feeds_tamper->importer = 'event';
  $feeds_tamper->source = 'xpathparser:5';
  $feeds_tamper->plugin_id = 'explode';
  $feeds_tamper->settings = array(
    'separator' => ',',
    'limit' => '',
    'real_separator' => ',',
  );
  $feeds_tamper->weight = 0;
  $feeds_tamper->description = 'Explode';
  $export['event-xpathparser_5-explode'] = $feeds_tamper;

  $feeds_tamper = new stdClass();
  $feeds_tamper->disabled = FALSE; /* Edit this to true to make a default feeds_tamper disabled initially */
  $feeds_tamper->api_version = 2;
  $feeds_tamper->id = 'event-xpathparser_5-trim';
  $feeds_tamper->importer = 'event';
  $feeds_tamper->source = 'xpathparser:5';
  $feeds_tamper->plugin_id = 'trim';
  $feeds_tamper->settings = array(
    'mask' => '',
    'side' => 'trim',
  );
  $feeds_tamper->weight = 1;
  $feeds_tamper->description = 'Trim';
  $export['event-xpathparser_5-trim'] = $feeds_tamper;

  $feeds_tamper = new stdClass();
  $feeds_tamper->disabled = FALSE; /* Edit this to true to make a default feeds_tamper disabled initially */
  $feeds_tamper->api_version = 2;
  $feeds_tamper->id = 'event-xpathparser_7-array_filter';
  $feeds_tamper->importer = 'event';
  $feeds_tamper->source = 'xpathparser:7';
  $feeds_tamper->plugin_id = 'array_filter';
  $feeds_tamper->settings = '';
  $feeds_tamper->weight = 4;
  $feeds_tamper->description = 'Filter empty items';
  $export['event-xpathparser_7-array_filter'] = $feeds_tamper;

  $feeds_tamper = new stdClass();
  $feeds_tamper->disabled = FALSE; /* Edit this to true to make a default feeds_tamper disabled initially */
  $feeds_tamper->api_version = 2;
  $feeds_tamper->id = 'event-xpathparser_7-explode';
  $feeds_tamper->importer = 'event';
  $feeds_tamper->source = 'xpathparser:7';
  $feeds_tamper->plugin_id = 'explode';
  $feeds_tamper->settings = array(
    'separator' => ',',
    'limit' => '',
    'real_separator' => ',',
  );
  $feeds_tamper->weight = 2;
  $feeds_tamper->description = 'Explode';
  $export['event-xpathparser_7-explode'] = $feeds_tamper;

  $feeds_tamper = new stdClass();
  $feeds_tamper->disabled = FALSE; /* Edit this to true to make a default feeds_tamper disabled initially */
  $feeds_tamper->api_version = 2;
  $feeds_tamper->id = 'event-xpathparser_7-find_replace_regex';
  $feeds_tamper->importer = 'event';
  $feeds_tamper->source = 'xpathparser:7';
  $feeds_tamper->plugin_id = 'find_replace_regex';
  $feeds_tamper->settings = array(
    'find' => '/<img src="(.*?)".*?\\/>/',
    'replace' => '$1',
    'limit' => '',
    'real_limit' => -1,
  );
  $feeds_tamper->weight = 1;
  $feeds_tamper->description = 'Find replace REGEX';
  $export['event-xpathparser_7-find_replace_regex'] = $feeds_tamper;

  $feeds_tamper = new stdClass();
  $feeds_tamper->disabled = FALSE; /* Edit this to true to make a default feeds_tamper disabled initially */
  $feeds_tamper->api_version = 2;
  $feeds_tamper->id = 'event-xpathparser_7-html_entity_decode';
  $feeds_tamper->importer = 'event';
  $feeds_tamper->source = 'xpathparser:7';
  $feeds_tamper->plugin_id = 'html_entity_decode';
  $feeds_tamper->settings = '';
  $feeds_tamper->weight = 0;
  $feeds_tamper->description = 'HTML entity decode';
  $export['event-xpathparser_7-html_entity_decode'] = $feeds_tamper;

  $feeds_tamper = new stdClass();
  $feeds_tamper->disabled = FALSE; /* Edit this to true to make a default feeds_tamper disabled initially */
  $feeds_tamper->api_version = 2;
  $feeds_tamper->id = 'event-xpathparser_7-trim';
  $feeds_tamper->importer = 'event';
  $feeds_tamper->source = 'xpathparser:7';
  $feeds_tamper->plugin_id = 'trim';
  $feeds_tamper->settings = array(
    'mask' => '',
    'side' => 'trim',
  );
  $feeds_tamper->weight = 3;
  $feeds_tamper->description = 'Trim';
  $export['event-xpathparser_7-trim'] = $feeds_tamper;

  return $export;
}
