<?php

$plugin = array(
    'single' => TRUE,
    'title' => t('OG Menu'),
    'description' => t('Renders an OG menu in a specified format'),
    'category' => t('OG Menus'),
    'edit form' => 'og_menu_utilities_og_menu_edit_form',
    'render callback' => 'og_menu_utilities_og_menu_render',
    'admin info' => 'og_menu_utilities_og_menu_admin_info',
    'defaults' => array(
        'og_menu_style' => 'default',
        'og_menu' => '',
        'og_menu_style_html_grid_items_per_row' => 0,
    )
);

/**
 * 'admin info' callback for panel pane.
 */
function og_menu_utilities_og_menu_admin_info($subtype, $conf, $contexts) {
    if (!empty($conf)) {
        $block = new stdClass;
        $block->title = $conf['override_title'] ? $conf['override_title_text'] : '';
        $block->content = t('Showing @og_menu_style menu styles as @og_menu_style.', array(
            '@og_menu_style' => $conf['og_menu_style'],
        ));
        return $block;
    }
}


/**
 * 'Edit form' callback for the content type.
 */
function og_menu_utilities_og_menu_edit_form($form, &$form_state) {
    kent_state_og\OGContext::init($form_state['contexts']['panelizer']->data->nid);
    $menus = _og_menu_utilities_og_menu_get_group_menus(array('node'=>array(kent_state_og\OGContext::$nid)));
    
    $menu_options = array();
    
    foreach($menus as $menu){
        $menu_options[$menu['menu_name']] = $menu['title'];
    }
    
    $conf = $form_state['conf'];
    
    $form['og_menu_style'] = array(
        '#title' => t('Menu Style'),
        '#description' => t('The display mode of your menu'),
        '#type' => 'select',
        '#options' => array(
            'default' => 'Default List',
            'inline_icon' => 'Inline Icons',
            'list_icon' => 'List Icons',
            'html_grid' => 'HTML Grid',
        ),
        '#default_value' => $conf['og_menu_style'],
        '#required' => TRUE,
    );

    $form['og_menu_style_html_grid_items_per_row'] = array(
        '#title' => t('OG Menu Style HTML Grid Items Per Row'),
        '#description' => t('Set the number of items in a row for the grid'),
        '#type' => 'select',
        '#options' => array(0,1,2,3,4,5,6,7,8,9,10,11,12),
        '#default_value' => $conf['og_menu_style_html_grid_items_per_row'],
        '#states' => array(
            'visible' => array(
                ':input[name="og_menu_style"]' => array('value' => 'html_grid'),
            ),
        ),
        '#required' => FALSE,
    );
    
    $form['og_menu'] = array(
        '#title' => t('OG Menu'),
        '#description' => t('The OG Menu to display'),
        '#type' => 'select',
        '#options' => $menu_options,
        '#default_value' => $conf['og_menu'],
        '#required' => TRUE,
    );
    
    return $form;
}

/**
 * The submit form stores the data in $conf.
 */
function og_menu_utilities_og_menu_edit_form_submit($form, &$form_state) {
    foreach (array_keys($form_state['plugin']['defaults']) as $key) {
        if (isset($form_state['values'][$key])) {
            $form_state['conf'][$key] = $form_state['values'][$key];
        }
    }
}

/**
 * Run-time rendering of the body of the block (content type)
 * See ctools_plugin_examples for more advanced info
 */
function og_menu_utilities_og_menu_render($subtype, $conf, $panel_args, $context = NULL) {
    $block = new stdClass();
    
    $output = '';
    //var_dump($conf['og_menu_style']);exit;
    if($conf['og_menu_style'] === 'list_icon'){
        $output = _og_menu_utilities_og_menu_render_list_icons($conf['og_menu'], $conf['og_menu_style']);
    }
    else if($conf['og_menu_style'] === 'inline_icon'){
        $output = _og_menu_utilities_og_menu_render_list_icons($conf['og_menu'], $conf['og_menu_style']);
    }
    else if($conf['og_menu_style'] === 'html_grid'){
        $output = _og_menu_utilities_og_menu_render_html_grid($conf['og_menu'], $conf['og_menu_style'], $conf['og_menu_style_html_grid_items_per_row']);
    }
    else{
        drupal_add_css(OG_MENU_UTILITIES_PATH.'/menu_styles.css', array('type'=>'file'));
        $menu = menu_tree_output(menu_tree_all_data($conf['og_menu'], NULL, 1));
        $output = render($menu);
    }
    
    // initial content is blank
    $block->title = '';
    $block->content = '';
    
    // Add in the content
    $block->content .= $output;    
    
    return $block;
}

function _og_menu_utilities_og_menu_render_list_icons($menu_name, $style=NULL){
    drupal_add_css(OG_MENU_UTILITIES_PATH.'/menu_styles.css', array('type'=>'file'));
    $menu = menu_tree_output(menu_tree_all_data($menu_name, NULL, 1));
    $list = '';
    foreach(element_children($menu) as $key){
        $image = '';
        if(!empty($menu[$key]['#localized_options']['og_menu_utilities_item_image']['path'])){
            $file = file_load($menu[$key]['#localized_options']['og_menu_utilities_item_image']['fid']);
            $image = '<img src="'.file_create_url($file->uri).'" title="'.$file->title.'" alt="'.$file->alt.'">';
        }
        
        $menu[$key]['#localized_options']['html'] = true;
        $link = l($image.$menu[$key]['#title'], $menu[$key]['#href'], $menu[$key]['#localized_options']);
        $list .= '<li>'.$link.'</li>';
    }
    $classes = array('og_menu', $menu_name.'-'.$style, $style);
    return '<ul class="'.implode(' ', $classes).'">'.$list.'<ul>';
}

function _og_menu_utilities_og_menu_render_html_grid($menu_name, $style=NULL, $items_per_row = 0){
    drupal_add_css(OG_MENU_UTILITIES_PATH.'/menu_styles.css', array('type'=>'file'));
    $menu = menu_tree_output(menu_tree_all_data($menu_name, NULL, 1));
    $list = '';
    foreach(element_children($menu) as $key){
        $image = '';
        if(!empty($menu[$key]['#localized_options']['og_menu_utilities_item_image']['path'])){
            $file = file_load($menu[$key]['#localized_options']['og_menu_utilities_item_image']['fid']);
            $image = '<img src="'.file_create_url($file->uri).'" title="'.$file->title.'" alt="'.$file->alt.'">';
        }

        $text = '';
        if(!empty($menu[$key]['#localized_options']['og_menu_utilities_item_body']['value'])){
            $text = '<span class="text">'.$menu[$key]['#localized_options']['og_menu_utilities_item_body']['value'].'</span>';
        }
        
        $menu[$key]['#localized_options']['html'] = true;
        $link = l($image.$text.$menu[$key]['#title'], $menu[$key]['#href'], $menu[$key]['#localized_options']);
        $list .= '<li>'.$link.'</li>';
    }
    $classes = array('og_menu', $menu_name.'-'.$style, $style, 'large-block-grid-'.$items_per_row, 'medium-block-grid-2', 'small-block-grid-1');
    return '<ul class="'.implode(' ', $classes).'">'.$list.'<ul>';
}
