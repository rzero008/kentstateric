<?php
/**
 * @file
 * kent_state_core.default_field_validation_rules.inc
 */

/**
 * Implements hook_default_field_validation_rule().
 */
function kent_state_core_default_field_validation_rule() {
  $export = array();

  $rule = new stdClass();
  $rule->disabled = FALSE; /* Edit this to true to make a default rule disabled initially */
  $rule->api_version = 2;
  $rule->rulename = 'Academic Group Short Name Allowed';
  $rule->name = 'academic_short_allow';
  $rule->field_name = 'field_group_short_name';
  $rule->col = 'value';
  $rule->entity_type = 'node';
  $rule->bundle = 'academic_group';
  $rule->validator = 'field_validation_regex_validator';
  $rule->settings = array(
    'data' => '^[a-z0-9\\-]+$',
    'bypass' => 0,
    'roles' => array(
      1 => 0,
      2 => 0,
      3 => 0,
    ),
    'errors' => 0,
  );
  $rule->error_message = 'Group Short Name must only contain lowercase letters, numbers, and hyphens';
  $export['academic_short_allow'] = $rule;

  $rule = new stdClass();
  $rule->disabled = FALSE; /* Edit this to true to make a default rule disabled initially */
  $rule->api_version = 2;
  $rule->rulename = 'Academic Group Short Name Unique';
  $rule->name = 'academic_short_uniq';
  $rule->field_name = 'field_group_short_name';
  $rule->col = 'value';
  $rule->entity_type = 'node';
  $rule->bundle = 'academic_group';
  $rule->validator = 'field_validation_unique_validator';
  $rule->settings = array(
    'data' => 'global',
    'per_user' => 0,
    'bypass' => 0,
    'roles' => array(
      1 => 0,
      2 => 0,
      3 => 0,
    ),
    'errors' => 0,
  );
  $rule->error_message = 'Group Short Name must be unique. Currently in use by [existing-entity-link]';
  $export['academic_short_uniq'] = $rule;

  $rule = new stdClass();
  $rule->disabled = FALSE; /* Edit this to true to make a default rule disabled initially */
  $rule->api_version = 2;
  $rule->rulename = 'Administrative Group Short Name Allowed';
  $rule->name = 'admin_short_allow';
  $rule->field_name = 'field_group_short_name';
  $rule->col = 'value';
  $rule->entity_type = 'node';
  $rule->bundle = 'administrative_group';
  $rule->validator = 'field_validation_regex_validator';
  $rule->settings = array(
    'data' => '^[a-z0-9\\-]+$',
    'bypass' => 0,
    'roles' => array(
      1 => 0,
      2 => 0,
      3 => 0,
    ),
    'errors' => 0,
  );
  $rule->error_message = 'Group Short Name must only contain lowercase letters, numbers, and hyphens';
  $export['admin_short_allow'] = $rule;

  $rule = new stdClass();
  $rule->disabled = FALSE; /* Edit this to true to make a default rule disabled initially */
  $rule->api_version = 2;
  $rule->rulename = 'Administrative Group Short Name Unique';
  $rule->name = 'admin_short_uniq';
  $rule->field_name = 'field_group_short_name';
  $rule->col = 'value';
  $rule->entity_type = 'node';
  $rule->bundle = 'administrative_group';
  $rule->validator = 'field_validation_unique_validator';
  $rule->settings = array(
    'data' => 'global',
    'per_user' => 0,
    'bypass' => 0,
    'roles' => array(
      1 => 0,
      2 => 0,
      3 => 0,
    ),
    'errors' => 0,
  );
  $rule->error_message = 'Group Short Name must be unique. Currently in use by [existing-entity-link]';
  $export['admin_short_uniq'] = $rule;

  $rule = new stdClass();
  $rule->disabled = FALSE; /* Edit this to true to make a default rule disabled initially */
  $rule->api_version = 2;
  $rule->rulename = 'Campus Group Short Name Allowed';
  $rule->name = 'campus_short_allow';
  $rule->field_name = 'field_group_short_name';
  $rule->col = 'value';
  $rule->entity_type = 'node';
  $rule->bundle = 'campus_group';
  $rule->validator = 'field_validation_regex_validator';
  $rule->settings = array(
    'data' => '^[a-z0-9\\-]+$',
    'bypass' => 0,
    'roles' => array(
      1 => 0,
      2 => 0,
      3 => 0,
    ),
    'errors' => 0,
  );
  $rule->error_message = 'Group Short Name must only contain lowercase letters, numbers, and hyphens';
  $export['campus_short_allow'] = $rule;

  $rule = new stdClass();
  $rule->disabled = FALSE; /* Edit this to true to make a default rule disabled initially */
  $rule->api_version = 2;
  $rule->rulename = 'Administrative Group Short Name Unique';
  $rule->name = 'campus_short_uniq';
  $rule->field_name = 'field_group_short_name';
  $rule->col = 'value';
  $rule->entity_type = 'node';
  $rule->bundle = 'campus_group';
  $rule->validator = 'field_validation_unique_validator';
  $rule->settings = array(
    'data' => 'global',
    'per_user' => 0,
    'bypass' => 0,
    'roles' => array(
      1 => 0,
      2 => 0,
      3 => 0,
    ),
    'errors' => 0,
  );
  $rule->error_message = 'Group Short Name must be unique. Currently in use by [existing-entity-link]';
  $export['campus_short_uniq'] = $rule;

  return $export;
}
