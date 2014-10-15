<?php
/**
 * @file
 * kent_state_core.features.uuid_term.inc
 */

/**
 * Implements hook_uuid_features_default_terms().
 */
function kent_state_core_uuid_features_default_terms() {
  $terms = array();

  $terms[] = array(
    'name' => 'Default',
    'description' => '',
    'format' => 'filtered_html',
    'weight' => 0,
    'uuid' => '14f13638-4c4f-4842-9a56-00a3311fd13d',
    'vocabulary_machine_name' => 'themes',
    'field_theme_color_style' => array(
      'und' => array(
        0 => array(
          'value' => 'light',
        ),
      ),
    ),
    'field_theme_css_path' => array(
      'und' => array(
        0 => array(
          'value' => 'sites/all/themes/custom/ksu_zurb_5/css/themes/default/default.css',
          'format' => NULL,
          'safe_value' => 'sites/all/themes/custom/ksu_zurb_5/css/themes/default/default.css',
        ),
      ),
    ),
  );
  $terms[] = array(
    'name' => 'College',
    'description' => '',
    'format' => 'filtered_html',
    'weight' => 0,
    'uuid' => 'd3be76f6-a1f9-4e7d-b454-1626898c45d8',
    'vocabulary_machine_name' => 'academic_group_types',
  );
  $terms[] = array(
    'name' => 'Department',
    'description' => '',
    'format' => 'filtered_html',
    'weight' => 0,
    'uuid' => 'd91e6be6-6f03-4070-bf2b-9a465a30ed28',
    'vocabulary_machine_name' => 'academic_group_types',
  );
  $terms[] = array(
    'name' => 'Kent',
    'description' => '<p>As a top Ohio undergraduate and graduate school, Kent State\'s eight campuses offer the resources of a large university with the friendly atmosphere of a liberal arts college. Enroll today to start pursuing your future at one of the best colleges in Ohio. We’ve been educating graduates for over 100 years; join us today.</p>
',
    'format' => 'filtered_html',
    'weight' => 0,
    'uuid' => 'df29fe33-f5a0-472d-bc23-654513209c74',
    'vocabulary_machine_name' => 'campus',
    'field_campus_address' => array(
      'und' => array(
        0 => array(
          'value' => '800 E. Summit St., Kent, OH 44240',
          'format' => NULL,
          'safe_value' => '800 E. Summit St., Kent, OH 44240',
        ),
      ),
    ),
    'field_campus_dark_logo' => array(),
    'field_campus_dark_logo_fallback' => array(),
    'field_campus_donate_image' => array(),
    'field_campus_donate_link' => array(
      'und' => array(
        0 => array(
          'url' => 'advancement/givetokent',
          'title' => '',
          'attributes' => array(),
        ),
      ),
    ),
    'field_campus_email' => array(
      'und' => array(
        0 => array(
          'value' => 'info@kent.edu',
          'format' => NULL,
          'safe_value' => 'info@kent.edu',
        ),
      ),
    ),
    'field_campus_glossary_link' => array(),
    'field_campus_group_ref' => array(
      'und' => array(
        0 => array(
          'target_id' => 'e484bdc7-a346-4bf1-ba0e-135b83a91fbf',
        ),
      ),
    ),
    'field_campus_light_logo' => array(),
    'field_campus_light_logo_fallback' => array(),
    'field_campus_mailing_address' => array(
      'und' => array(
        0 => array(
          'value' => 'P.O. Box 5190, Kent, OH 44242-0001',
          'format' => NULL,
          'safe_value' => 'P.O. Box 5190, Kent, OH 44242-0001',
        ),
      ),
    ),
    'field_campus_phone' => array(
      'und' => array(
        0 => array(
          'value' => '330-672-3000',
          'format' => NULL,
          'safe_value' => '330-672-3000',
        ),
      ),
    ),
  );
  $terms[] = array(
    'name' => 'Other',
    'description' => NULL,
    'format' => NULL,
    'weight' => 0,
    'uuid' => 'e4d88211-e95e-4d86-aeac-61f25701f7e3',
    'vocabulary_machine_name' => 'academic_group_types',
  );
  return $terms;
}
