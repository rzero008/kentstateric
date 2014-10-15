
<?php

/**
 * Implements hook_panels_layouts()
 */
function ksu_zurb_5_ksu_zurb_5_basic_page_panels_layouts() {
    $items['ksu_zurb_5_basic_page'] = array(
        'title' => t('KSU Foundation: Basic Page Template'),
        'category' => t('KSU Foundation Pages'),
        'icon' => 'ksu_zurb_5_basic_page.png',
        'theme' => 'ksu_zurb_5_basic_page',
        'admin css' => '../foundation_panels_admin.css',
        'regions' => array(
            'feature_top' => t('Feature Row'),
            'title_top' => t('Title Column'),
            'sidebar' => t('Sidebar'),
            'body' => t('Body Column'),
            'footer' => t('Footer'),
        ),
    );
    return $items;
}

