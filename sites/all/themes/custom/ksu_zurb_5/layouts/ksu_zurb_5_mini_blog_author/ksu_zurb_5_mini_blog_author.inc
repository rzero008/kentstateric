
<?php

/**
 * Implements hook_panels_layouts()
 */
function ksu_zurb_5_ksu_zurb_5_mini_blog_author_panels_layouts() {
    $items['ksu_zurb_5_mini_blog_author'] = array(
        'title' => t('KSU Foundation: Blog Author Minipanel'),
        'category' => t('KSU Foundation Mini Panels'),
        'icon' => 'ksu_zurb_5_mini_blog_author.png',
        'theme' => 'ksu_zurb_5_mini_blog_author',
        'admin css' => '../foundation_panels_admin.css',
        'regions' => array(
            'feature_top' => t('Feature Row'),
            'title_top' => t('Title Column'),
            'author_details' => t('Author Details'),
            'node_details' => t('Node Details'),
            'body' => t('Body Column'),
            'footer' => t('Footer'),
        ),
    );
    return $items;
}

