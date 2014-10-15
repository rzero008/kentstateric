<?php
/**
 * @file
 * kent_state_core.features.menu_custom.inc
 */

/**
 * Implements hook_menu_default_menu_custom().
 */
function kent_state_core_menu_default_menu_custom() {
  $menus = array();

  // Exported menu: menu-campus-locations.
  $menus['menu-campus-locations'] = array(
    'menu_name' => 'menu-campus-locations',
    'title' => 'Campus Locations',
    'description' => 'Menu Items for various satellite campus locations',
  );
  // Exported menu: menu-site-utility-menu.
  $menus['menu-site-utility-menu'] = array(
    'menu_name' => 'menu-site-utility-menu',
    'title' => 'Site Utility Menu',
    'description' => 'Menu that contains sitewide utility links such as Employment Opportunities, Terms and Conditions, etc.',
  );
  // Translatables
  // Included for use with string extractors like potx.
  t('Campus Locations');
  t('Menu Items for various satellite campus locations');
  t('Menu that contains sitewide utility links such as Employment Opportunities, Terms and Conditions, etc.');
  t('Site Utility Menu');


  return $menus;
}
