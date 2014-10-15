
<?php

/**
 * Implements hook_panels_layouts()
 */
function ksu_zurb_5_ksu_zurb_5_blog_panels_layouts() {
    $items['ksu_zurb_5_blog'] = array(
        'title' => t('KSU Foundation: Blog Template'),
        'category' => t('KSU Foundation Pages'),
        'icon' => 'ksu_zurb_5_blog.png',
        'theme' => 'ksu_zurb_5_blog',
        'admin css' => '../foundation_panels_admin.css',
        'regions' => array(
            'feature_top' => t('Feature Row'),
            'title_top' => t('Title Column'),
            'body' => t('Body Column'),
            'sidebar' => t('Sidebar'),
            'footer' => t('Footer'),
        ),
    );
    return $items;
}

