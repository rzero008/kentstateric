<?php

/**
 * Implements template_preprocess_html().
 *
 */

//function STARTER_preprocess_html(&$variables) {
//  // Add conditional CSS for IE. To use uncomment below and add IE css file
//  drupal_add_css(path_to_theme() . '/css/ie.css', array('weight' => CSS_THEME, 'browsers' => array('!IE' => FALSE), 'preprocess' => FALSE));
//
//  // Need legacy support for IE downgrade to Foundation 2 or use JS file below
//  // drupal_add_js('http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE7.js', 'external');
//}

function ksu_zurb_5_page_alter(&$vars) {
  $argument = isset($vars['content']['system_main']['kent_state_blocks_region_exports'])
    ? $vars['content']['system_main']['kent_state_blocks_region_exports']
    : null;

  if (!empty($argument) && $argument === 'header') {

    $content = '<header role="banner" class="l-header small-12 medium-12 large-12 left">';
    $content .= '<div class="header-top-container small-12 medium-12 large-12 left">';

    $content .= '<section class="header-top-left-region small-12 medium-12 large-8 columns"><div>';
    $content .= render($vars['header_top_left']);
    $content .= '</div></section>';

    $content .= '<section class="header-top-right-region small-12 medium-12 large-4 columns"><div>';
    $content .= render($vars['header_top_right']);
    $content .= '</div></section>';

    $content .= '<section class="campus-header-region small-12 medium-12 large-12 left"><div>';
    $content .= render($vars['campus_header']);
    $content .= '</div></section>';

    $content .= '</div>';
    $content .= '</header>';
    echo $content;
    exit;
  }

  if (!empty($argument) && $argument === 'footer') {

    $content = '<footer role="contentinfo" class="l-footer small-12 medium-12 large-12 left">';

    $content .= '<section class="footer-middle-region small-12 medium-12 large-12 left">';
    $content .= '<div class="small-12 medium-12 large-12 columns">';
    $content .= render($vars['footer_middle']);
    $content .= '</div></section>';

    $content .= '<section class="footer-bottom-region small-12 medium-12 large-12 left">';
    $content .= '<div class="small-12 medium-12 large-12 columns">';
    $content .= render($vars['footer_bottom']);
    $content .= '</div></section>';

    $content .= '</footer>';
    echo $content;
    exit;
  }
}

function ksu_zurb_5_theme_registry_alter(&$theme_registry) {
  //$theme_registry['filedepot_main_page']['template'] = 'sites/all/themes/custom/ksu_zurb_5/templates/filedepot/filedepot-mainpage';
  //$theme_registry['filedepot_toolbar_form']['template'] = 'sites/all/themes/custom/ksu_zurb_5/templates/filedepot/toolbar_form';
}

function ksu_zurb_5_breadcrumb(&$variables) {

  $breadcrumb = $variables['breadcrumb'];

  //do the og context bc dance.
  if (!function_exists('og_context')) {
    return $breadcrumb;
  }

  $og = og_context();
  $og_bcs = array();
  if (!empty($og)) {

    $nodeid = arg(0) === 'node' && is_numeric(arg(1)) ? arg(1) : null;
    $og_node = node_load($og['gid']);

    //this page is a group page. only get and show the parent
    if ($nodeid === $og['gid']) {
      //campus groups dont show breadcrumbs.
      //academic and administrative landers only include their parent group in the list
      if ($og_node->type === 'academic_group' || $og_node->type === 'administrative_group') {
        if (!empty($og_node->og_group_ref)) {
          $og_parent_node = node_load($og_node->og_group_ref[LANGUAGE_NONE][0]['target_id']);
          $og_bcs[] =  l($og_parent_node->title, 'node/'.$og_parent_node->nid);
        }
      }
    }
    //this isnt a group lander. get the current and parent group
    else {
      $og_bcs[] =  l($og_node->title, 'node/'.$og_node->nid);
      if (!empty($og_node->og_group_ref)) {
        $og_parent_node = node_load($og_node->og_group_ref[LANGUAGE_NONE][0]['target_id']);
        $og_bcs[] =  l($og_parent_node->title, 'node/'.$og_parent_node->nid);
      }
    }
  }
  else {
    $breadcrumbs = '<h2 class="element-invisible">' . t('You are here') . '</h2>';

    $breadcrumbs .= '<ul class="breadcrumbs">';

    foreach ($breadcrumb as $key => $value) {
      $breadcrumbs .= '<li>' . $value . '</li>';
    }

    $title = strip_tags(drupal_get_title());
    $breadcrumbs .= '<li class="current"><a href="#">' . $title. '</a></li>';
    $breadcrumbs .= '</ul>';
    return $breadcrumbs;
  }

  //kill the first link in the chain, replace it with
  unset($breadcrumb[0]);
  foreach($og_bcs as $item) {
    array_unshift($breadcrumb, $item);
  }

  if (!empty($breadcrumb)) {
    // Provide a navigational heading to give context for breadcrumb links to
    // screen-reader users. Make the heading invisible with .element-invisible.
    $breadcrumbs = '<h2 class="element-invisible">' . t('You are here') . '</h2>';

    $breadcrumbs .= '<ul class="breadcrumbs">';

    foreach ($breadcrumb as $key => $value) {
      $breadcrumbs .= '<li>' . $value . '</li>';
    }

    $title = strip_tags(drupal_get_title());
    $breadcrumbs .= '<li class="current"><a href="#">' . $title. '</a></li>';
    $breadcrumbs .= '</ul>';

    return $breadcrumbs;
  }
}

function ksu_zurb_5_preprocess_google_appliance_block_form(&$vars) {
  //bail if the ksu custom blocks module is AWOL
  if (!class_exists('kent_state_og\OGContext')) {
    return;
  }

  if (!empty(kent_state_og\OGContext::$campus->field_campus_glossary_link)) {
    $vars['glossary_link'] = l(kent_state_og\OGContext::$campus->field_campus_glossary_link[LANGUAGE_NONE][0]['title'],
      kent_state_og\OGContext::$campus->field_campus_glossary_link[LANGUAGE_NONE][0]['url']);
  }
  else {
    $vars['glossary_link'] = l('Glossary Default Link', '<front>');
  }
}

/**
 * Implements theme_links() targeting the main menu specifically.
 * Formats links for Top Bar http://foundation.zurb.com/docs/components/top-bar.html
 */
function ksu_zurb_5_links__topbar_og_menu($variables) {
  // We need to fetch the links ourselves because we need the entire tree.
  $output = _zurb_foundation_links($variables['links']);
  $variables['attributes']['class'][] = 'left';

  return '<ul' . drupal_attributes($variables['attributes']) . '>' . $output . '</ul>';
}





/**
 * Implements template_preprocess_page
 *
 */
function ksu_zurb_5_preprocess_page(&$variables) {

//mobile custom variables for page.tpl.php
 $menuUtility = menu_navigation_links('menu-site-utility-menu');
 $variables['custom_menu_utility'] = theme('links__menu_site-utility-menu', array('links' => $menuUtility));
 

    $search_box = module_invoke('search','block_view','search');
    $rendered_block = render($search_box);
    $variables['search_box_mobile'] = $rendered_block;

 
 
  $variables['main_grid'] = 'small-12 medium-12 large-12 left';
  //Conditionally load css based on the current page
  $page = current_path();
  switch ($page) {
    case 'research':
      drupal_add_css(path_to_theme() . 'css/ksu-research.css');
      break;
  }

  $variables['main_grid'] = 'small-12 medium-12 large-12 left';
  //bail if the ksu custom blocks module is AWOL
  if (!class_exists('ksu_custom_blocks\OGContext')) {
    return false;
  }

  //Use the KSU logo for the mobile toolbar
  $variables['linked_site_name'] = '<a href="'.url('node/'.ksu_custom_blocks\OGContext::$nid).'" rel="home" title="Kent State University" class="active site-logo"></a>';

  $variables['top_bar_main_menu'] = '';

  if (!empty(ksu_custom_blocks\OGContext::$primaryMenu)) {
    $variables['top_bar_main_menu'] = theme('links__topbar_og_menu', array(
      'links' => ksu_custom_blocks\OGContext::$primaryMenu,
      'attributes' => array(
      'id' => 'main-menu',
      'class' => array('main-nav'),
      ),
      'heading' => array(
      'text' => t('Main menu'),
      'level' => 'h2',
      'class' => array('element-invisible'),
      ),
    ));
  }
  
  


}

/**
 * Implements template_preprocess_node
 *
 */
function ksu_zurb_5_preprocess_node(&$variables) {
  $node = $variables['node'];
  // Display post information only on certain node types.
  if ($node->type == 'research_magazine_article') {
    $variables['field_article_image'] = isset($node->field_article_image[LANGUAGE_NONE][0]['uri']) ?
      l(theme('image',
        array(
          'path' => $node->field_article_image[LANGUAGE_NONE][0]['uri'],
          'alt' => $node->title,
        )),
        'node/' . $node->nid,
        array(
          'attributes' => array('title' => $node->title),
          'html' => TRUE,
        )
      )
      : '';
    $variables['safe_summary'] = isset($node->body[LANGUAGE_NONE][0]['safe_summary']) ? $node->body[LANGUAGE_NONE][0]['safe_summary'] : '';
    if (variable_get('node_submitted_' . $node->type, TRUE)) {
      $account = user_load($node->uid);
      $variables['date'] = format_date($node->created, 'custom', 'M d, Y - g:i A');
      $variables['author'] = (isset($account->field_profile_first_name[LANGUAGE_NONE][0]['safe_value']) && isset($account->field_profile_last_name[LANGUAGE_NONE][0]['safe_value'])) ?
        $account->field_profile_first_name[LANGUAGE_NONE][0]['safe_value'] . ' ' . $account->field_profile_last_name[LANGUAGE_NONE][0]['safe_value'] : $variables['name'];
      $variables['submitted'] = t('By !author on !datetime', array('!author' => $variables['author'], '!datetime' => $variables['date']));
    }
  }
}

/**
 * Implements template_preprocess_field
 *
 */
function ksu_zurb_5_preprocess_field(&$vars, $hook) {
  if ($vars['element']['#field_name'] === 'field_article_media'
    || $vars['element']['#field_name'] === 'field_page_media'
    || $vars['element']['#field_name'] === 'field_group_media') {
    if (!empty($vars['element'][0]['#view_mode']) && $vars['element'][0]['#view_mode'] === 'slideshow') {

      if (defined('KENT_STATE_PANELS_PATH')) {
        drupal_add_css(KENT_STATE_PANELS_PATH.'/libraries/owl.carousel.2.0.0-beta.2.4/assets/owl.carousel.css', array('type'=>'file'));
        drupal_add_css(KENT_STATE_PANELS_PATH.'/kent_state_panels.css', array('type'=>'file'));
        drupal_add_js(KENT_STATE_PANELS_PATH.'/libraries/owl.carousel.2.0.0-beta.2.4/owl.carousel.min.js', array('type'=>'file', 'scope'=>'footer'));
        drupal_add_js(KENT_STATE_PANELS_PATH.'/kent_state_panels.js', array('type'=>'file', 'scope'=>'footer'));
        drupal_add_js(array('kentStatePanels'=> array('carousel'=>null)), 'setting');

        //only carousel for more than 1 item
        if (count(element_children($vars['element'])) > 1) {
          $vars['classes_array'][] = 'owl-carousel';
        }

        foreach ($vars['items'] as $key=>$val) {
          //echo '<pre>';var_dump($val['#file']);exit;
          $content = '';
          if (!empty($val['#file']->title)) {
            $content .= '<div class="image-title">'.$val['#file']->title.'</div>';
          }
          if (!empty($val['#file']->alt)) {
            $content .= '<div class="image-alt">'.$val['#file']->alt.'</div>';
          }
          if (!empty($content)) {
            $vars['items'][$key][] = array(
              '#markup' => '<div class="image-info">' . $content . '</div>',
            );
          }
        }
      }
    }
  }
}

/**
 * Implements theme_field__field_type().
 * overrides f5's odd addition of an h2 tag for tax
 */
function ksu_zurb_5_field__taxonomy_term_reference($variables) {
  $output = '';

  // Render the label, if it's not hidden.
  if (!$variables['label_hidden']) {
    $output .= '<div class="field-label">' . $variables['label'] . ': </div>';
  }

  // Render the items.
  $output .= ($variables['element']['#label_display'] == 'inline') ? '<ul class="links inline">' : '<ul class="links">';
  foreach ($variables['items'] as $delta => $item) {
    $output .= '<li class="taxonomy-term-reference-' . $delta . '"' . $variables['item_attributes'][$delta] . '>' . drupal_render($item) . '</li>';
  }
  $output .= '</ul>';

  // Render the top-level DIV.
  $output = '<div class="' . $variables['classes'] . (!in_array('clearfix', $variables['classes_array']) ? ' clearfix' : '') . '">' . $output . '</div>';

  return $output;
}

/**
 * Implements template_preprocess_views_views().
 *
 */
function ksu_zurb_5_preprocess_views_view(&$variables) {
  $view = $variables['view'];
  $rows = $variables['rows'];
  $tid = isset($view->args[1]) ? $view->args[1] : 0;
  if ($tid):
    $rows .= views_embed_view('featured_research_articles', 'block', $tid);
  endif;
  $variables['rows'] = $rows;
}

function ksu_zurb_5_preprocess_block(&$vars) {
    if($vars['block']->delta === 'group_foundation_topbar'){
        $ga_search_form = module_invoke('google_appliance', 'block_view', 'ga_block_search_form');

        $menu_rendered = theme('links__topbar_og_menu', array(
            'links' => $vars['menu'],
            'attributes' => array(
                'id' => 'main-menu',
                'class' => array('main-nav'),
            ),
            'heading' => array(
                'text' => t('Main menu'),
                'level' => 'h2',
                'class' => array('element-invisible'),
            ),
        ));

        $site_utility_menu = menu_tree_output(menu_tree_all_data('menu-site-utility-menu'));
        $utility_menu_rendered = theme('links__topbar_og_menu', array(
            'links' => $site_utility_menu,
            'attributes' => array(
                'id' => 'main-menu',
                'class' => array('main-nav'),
            ),
            'heading' => array(
                'text' => t('Main menu'),
                'level' => 'h2',
                'class' => array('element-invisible'),
            ),
        ));

        $ga_search_form_rendered = '<ul><li class="has-form">'. render($ga_search_form['content']) . '</li></ul>';
        $title_area = '<ul class="title-area">' . '<li class="name"><h1>'.$vars['logo'].'</h1></li>' . '<li class="toggle-topbar menu-icon"><a href="#"></a></li>' . '</ul>';
        $section = '<section class="top-bar-section">' . $ga_search_form_rendered . $menu_rendered . $utility_menu_rendered . '</section>';
        $vars['content'] = '<nav class="top-bar hide-for-large" data-topbar>' . $title_area . $section . '</nav>';
/*
<nav class="top-bar" data-topbar <?php print $top_bar_options; ?>>
  <ul class="title-area">
    <li class="name"><h1><?php print $linked_site_name; ?></h1></li>
    <li class="toggle-topbar menu-icon"><a href="#"><span><?php print $top_bar_menu_text; ?></span></a></li>
  </ul>
  <section class="top-bar-section">
    <?php if ($top_bar_main_menu) :?>
      <?php print $top_bar_main_menu; ?>
    <?php endif; ?>
    <?php if ($top_bar_secondary_menu) :?>
      <?php print $top_bar_secondary_menu; ?>
    <?php endif; ?>
  </section>
</nav>
      */
    }
}

/**
 * Implements hook_preprocess_block()
 */
//function STARTER_preprocess_block(&$variables) {
//  // Add wrapping div with global class to all block content sections.
//  $variables['content_attributes_array']['class'][] = 'block-content';
//
//  // Convenience variable for classes based on block ID
//  $block_id = $variables['block']->module . '-' . $variables['block']->delta;
//
//  // Add classes based on a specific block
//  switch ($block_id) {
//    // System Navigation block
//    case 'system-navigation':
//      // Custom class for entire block
//      $variables['classes_array'][] = 'system-nav';
//      // Custom class for block title
//      $variables['title_attributes_array']['class'][] = 'system-nav-title';
//      // Wrapping div with custom class for block content
//      $variables['content_attributes_array']['class'] = 'system-nav-content';
//      break;
//
//    // User Login block
//    case 'user-login':
//      // Hide title
//      $variables['title_attributes_array']['class'][] = 'element-invisible';
//      break;
//
//    // Example of adding Foundation classes
//    case 'block-foo': // Target the block ID
//      // Set grid column or mobile classes or anything else you want.
//      $variables['classes_array'][] = 'six columns';
//      break;
//  }
//
//  // Add template suggestions for blocks from specific modules.
//  switch($variables['elements']['#block']->module) {
//    case 'menu':
//      $variables['theme_hook_suggestions'][] = 'block__nav';
//      break;
//  }
//}

/**
 * Implements template_preprocess_panels_pane().
 *
 */
//function STARTER_preprocess_panels_pane(&$variables) {
//}

/**
 * Implements template_preprocess_views_views_fields().
 *
 */
//function STARTER_preprocess_views_view_fields(&$variables) {
//}

/**
 * Implements theme_form_element_label()
 * Use foundation tooltips
 */
//function STARTER_form_element_label($variables) {
//  if (!empty($variables['element']['#title'])) {
//    $variables['element']['#title'] = '<span class="secondary label">' . $variables['element']['#title'] . '</span>';
//  }
//  if (!empty($variables['element']['#description'])) {
//    $variables['element']['#description'] = ' <span data-tooltip="top" class="has-tip tip-top" data-width="250" title="' . $variables['element']['#description'] . '">' . t('More information?') . '</span>';
//  }
//  return theme_form_element_label($variables);
//}

/**
 * Implements hook_preprocess_button().
 */
//function STARTER_preprocess_button(&$variables) {
//  $variables['element']['#attributes']['class'][] = 'button';
//  if (isset($variables['element']['#parents'][0]) && $variables['element']['#parents'][0] == 'submit') {
//    $variables['element']['#attributes']['class'][] = 'secondary';
//  }
//}

/**
 * Implements hook_form_alter()
 * Example of using foundation sexy buttons
 */
//function STARTER_form_alter(&$form, &$form_state, $form_id) {
//  // Sexy submit buttons
//  if (!empty($form['actions']) && !empty($form['actions']['submit'])) {
//    $classes = (is_array($form['actions']['submit']['#attributes']['class']))
//    ? $form['actions']['submit']['#attributes']['class']
//    : array();
//    $classes = array_merge($classes, array('secondary', 'button', 'radius'));
//    $form['actions']['submit']['#attributes']['class'] = $classes;
//  }
//}

/**
 * Implements hook_form_FORM_ID_alter()
 * Example of using foundation sexy buttons on comment form
 */
//function STARTER_form_comment_form_alter(&$form, &$form_state) {
// Sexy preview buttons
//  $classes = (is_array($form['actions']['preview']['#attributes']['class']))
//  ? $form['actions']['preview']['#attributes']['class']
//  : array();
//  $classes = array_merge($classes, array('secondary', 'button', 'radius'));
//  $form['actions']['preview']['#attributes']['class'] = $classes;
//}


/**
 * Implements template_preprocess_panels_pane().
 */
// function zurb_foundation_preprocess_panels_pane(&$variables) {
// }

/**
 * Implements template_preprocess_views_views_fields().
 */
/* Delete me to enable
function THEMENAME_preprocess_views_view_fields(&$variables) {
  if ($variables['view']->name == 'nodequeue_1') {

    // Check if we have both an image and a summary
    if (isset($variables['fields']['field_image'])) {

      // If a combined field has been created, unset it and just show image
      if (isset($variables['fields']['nothing'])) {
        unset($variables['fields']['nothing']);
      }

    }
    elseif (isset($variables['fields']['title'])) {
      unset ($variables['fields']['title']);
    }

    // Always unset the separate summary if set
    if (isset($variables['fields']['field_summary'])) {
      unset($variables['fields']['field_summary']);
    }
  }
}

// */

/**
 * Implements hook_css_alter().
 */
//function STARTER_css_alter(&$css) {
//  // Always remove base theme CSS.
//  $theme_path = drupal_get_path('theme', 'zurb_foundation');
//
//  foreach($css as $path => $values) {
//    if (strpos($path, $theme_path) === 0) {
//      unset($css[$path]);
//    }
//  }
//}

/**
 * Implements hook_js_alter().
 */
//function STARTER_js_alter(&$js) {
//  // Always remove base theme JS.
//  $theme_path = drupal_get_path('theme', 'zurb_foundation');
//
//  foreach($js as $path => $values) {
//    if (strpos($path, $theme_path) === 0) {
//      unset($js[$path]);
//    }
//  }
//}
