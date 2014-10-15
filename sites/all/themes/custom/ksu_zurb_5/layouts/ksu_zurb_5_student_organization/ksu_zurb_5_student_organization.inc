
<?php

/**
 * Implements hook_panels_layouts()
 */
function ksu_zurb_5_ksu_zurb_5_student_organization_panels_layouts() {
    $items['ksu_zurb_5_student_organization'] = array(
        'title' => t('KSU Foundation: Student Organization Template'),
        'category' => t('KSU Foundation Pages'),
        'icon' => 'ksu_zurb_5_student_organization.png',
        'theme' => 'ksu_zurb_5_student_organization',
        'admin css' => '../foundation_panels_admin.css',
        'regions' => array(
            'feature_image_full' => t('Feature Image and Title Full'),
            'feature_image_small' => t('Feature Image and Title Small'),
            'left_sidebar' => t('Left Sidebar'),
            'right_sidebar' => t('Right Sidebar'),
            'body' => t('Body Column'),
            'footer' => t('Footer Column'),
        ),
    );
    return $items;
}

