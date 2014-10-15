<?php

function _og_menu_utilities_item_form_info(&$form, $form_state, $nid = null, $title = null){
    if($nid){
        $form['link_path']['#default_value'] = 'node/'.$nid;
    }

    if($title){
        $form['link_title']['#default_value'] = $title;
    }

    $options = unserialize(db_query('SELECT options FROM {menu_links} WHERE mlid = :mlid', array(':mlid' => $form['mlid']['#value']))->fetchField());

    $form['og_menu_utilities_show_advanced'] = array(
        '#title' => t('Show Advanced Settings'),
        '#description' => t('Select to show advanced settings such as Image, Body Text, Target, Attributes, etc.'),
        '#type' => 'checkbox',
        '#default' => '0',
    );

    $states = array(
        'visible' => array(
            ':input[name="og_menu_utilities_show_advanced"]' => array('checked' => true),
        ),
    );

    $form['og_menu_utilities_advanced_fieldset'] = array(
        '#type' => 'fieldset',
        '#title' => 'Advanced Options',
        '#states' => $states,
    );

    $form['og_menu_utilities_advanced_fieldset']['og_menu_utilities_item_class'] = array(
        '#title' => t('Classes'),
        '#description' => t('The value to be used in the "class" html attribute. Separate each class name with a space.'),
        '#type' => 'textfield',
        '#value' => isset($options['attributes']['class']) ? implode(' ', $options['attributes']['class']) : '',
        '#default' => '',
    );   

    $form['og_menu_utilities_advanced_fieldset']['og_menu_utilities_item_alt'] = array(
        '#title' => t('Alt Tag'),
        '#description' => t('The value to be used in the "alt" html attribute'),
        '#type' => 'textfield',
        '#value' => isset($options['attributes']['alt']) ? $options['attributes']['alt'] : '',
        '#default' => '',
    );   
    
    $formVal = '_self';
    if(isset($options['attributes']['target'])){
        preg_match('/^(_blank|_self|_parent|_top)$/', $options['attributes']['target'], $matches);
        if(!empty($matches)){
            $formVal = $options['attributes']['target'];
        }
        else{
            $formVal = 'framename';
        }
    }
    
    $form['og_menu_utilities_advanced_fieldset']['og_menu_utilities_item_target'] = array(
        '#title' => t('Target'),
        '#description' => t('The value to be used in the "target" html attribute'),
        '#type' => 'select',
        '#options' => array(
            '_blank' => '_blank: Link opens in new document or tab',
            '_self' => '_self: Default link behavior. Opens in current document or tab',
            '_parent' => '_parent: Open a document in the parent frame',
            '_top' => '_top: Open the document inside the topmost (in dom) frame',
            'framename' => '<framename>: Open the document inside the frame with name="<framename>"',
        ),
        '#value' => $formVal,
        '#default' => '_self',
    );

    $form['og_menu_utilities_advanced_fieldset']['og_menu_utilities_item_target_frame'] = array(
        '#title' => t('Frame Name'),
        '#description' => t('The frame targeted by the link. Your frame requires the attribute name="<framename>"'),
        '#type' => 'textfield',
        '#value' => isset($options['attributes']['target']) ? $options['attributes']['target'] : '',
        '#states' => array(
            'visible' => array(
                ':input[name="og_menu_utilities_item_target"]' => array('value' => 'framename'),
            ),
        ),
        '#default' => '',
    );   

    $form['og_menu_utilities_advanced_fieldset']['og_menu_utilities_item_attributes'] = array(
        '#title' => t('Additional attributes'),
        '#description' => t("Please enter one key value pair per line in the form of attribute_name=\"attribute_value\" or just attribute_name <br>Example: <br>data-name=\"mydataname\"<br>data-type=\"mydatatype\"<br>data-tabs<br>"),
        '#type' => 'textarea',
        '#value' => isset($options['og_menu_utilities_item_attributes']) ? $options['og_menu_utilities_item_attributes'] : '',
        '#default' => '',
    );   
    
    $form['og_menu_utilities_advanced_fieldset']['og_menu_utilities_item_image'] = array(
        '#type' => 'media',
        '#title' => t('Image'),
        '#description' => t('An image to be associated with this menu item. Max upload size 1MB.'),
        '#value' => array('fid' => isset($options['og_menu_utilities_item_image']) && isset($options['og_menu_utilities_item_image']['fid'])
                                                                                        ? $options['og_menu_utilities_item_image']['fid'] : 0),
        '#media_options' => array(
            'global' => array(
                'types' => array(
                    'image' => 'image',
                ),
                'enabledPlugins' => array(
                    'upload' => 'upload',
                    'media_internet' => 'media_internet',
                    'media_default--media_browser_1' => 'media_default--media_browser_1',
                    'media_default--media_browser_my_files' => 'media_default--media_browser_my_files',
                ),
                'schemes' => array(
                    'public' => 'public',
                ),
                'file_directory' => _og_menu_utilities_path(false),
                'file_extensions' => 'png gif jpg jpeg',
                'max_filesize' => '1 MB',
                'uri_scheme' => 'public',
            ),
        ),
        '#tree' => TRUE,
    );

    $form['og_menu_utilities_advanced_fieldset']['og_menu_utilities_item_body'] = array(
        '#title' => t('Body text'),
        '#description' => t('A text area to be included along with the above image.'),
        '#type' => 'text_format',
        '#value' => isset($options['og_menu_utilities_item_body']) ? $options['og_menu_utilities_item_body']['value'] : '',
        '#format'=> isset($options['og_menu_utilities_item_body']) ? $options['og_menu_utilities_item_body']['format'] : 'filtered_html',
        '#default' => '',
    );   

    $form['#attributes']['enctype'] = 'multipart/form-data';
    $form['#submit'][] = '_og_menu_utilities_form_og_menu_edit_item_form_submit';

}
