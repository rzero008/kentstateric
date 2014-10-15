<?php

$plugin = array(
    'title' => t('Owl Carousel'),
    'description' => t('Show panel panes in a region in an Owl Carousel.'),
    'render region' => 'kent_state_panels_slideshow_style_render_region',
    //'render pane' => 'kent_state_panels_slideshow_style_render_pane',
    'settings form' => 'kent_state_panels_slideshow_style_settings_form',
    //'pane settings form' => 'kent_state_panels_slideshow_style_settings_form',
);

//returns output;
function theme_kent_state_panels_slideshow_style_render_region($vars) {
    drupal_add_css(KENT_STATE_PANELS_PATH.'/libraries/owl.carousel.2.0.0-beta.2.4/assets/owl.carousel.css', array('type'=>'file'));
    drupal_add_css(KENT_STATE_PANELS_PATH.'/kent_state_panels.css', array('type'=>'file'));
    drupal_add_js(KENT_STATE_PANELS_PATH.'/libraries/owl.carousel.2.0.0-beta.2.4/owl.carousel.min.js', array('type'=>'file', 'scope'=>'footer'));
    drupal_add_js(KENT_STATE_PANELS_PATH.'/kent_state_panels.js', array('type'=>'file', 'scope'=>'footer'));
    drupal_add_js(array('kentStatePanels'=> array('carousel'=>null)), 'setting');
    
    $content = implode("\n",$vars['panes']);
    
    return '<div class="owl-carousel">'.$content.'</div>';
}

//returns form
function kent_state_panels_slideshow_style_settings_form($style_settings) {
    $form = array();
    return $form;
}

function theme_kent_state_panels_slideshow_style_render_pane($vars){
}
