<?php

/**
 * Implements hook_panels_layouts()
 */
function ksu_zurb_5_ksu_zurb_5_landing_1_panels_layouts() {
    $items['ksu_zurb_5_landing_1'] = array(
        'title' => t('KSU Foundation: Landing Page Template Version 1'),
        'category' => t('KSU Foundation Landing'),
        'icon' => 'ksu_zurb_5_landing_1.png',
        'theme' => 'ksu_zurb_5_landing_1',
        'admin css' => '../foundation_panels_admin.css',
        'regions' => array(
            'feature_top' => t('Feature Row'),
            'body' => t('Body Column'),
            'top_left_asymmetrical' => t('Asymmetrical Top Left'),
            'top_right_asymmetrical' => t('Asymmetrical Top Right'),
            'left_fourth' => t('Left Fourth'),
            'left_middle_fourth' => t('Left Middle Fourth'),
            'right_middle_fourth' => t('Right Middle Fourth'),
            'right_fourth' => t('Right Fourth'),
            'left_third' => t('Left Third'),
            'middle_third' => t('Middle Third'),
            'right_third' => t('Right Third'),
            'left_half' => t('Left Half'),
            'right_half' => t('Right Half'),
            'feature_bottom' => t('Feature Row'),
            'footer' => t('Footer'),
        ),
    );
    return $items;
}

