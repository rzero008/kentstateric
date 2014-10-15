<?php

/**
 * @file
 * Default theme implementation to display a block.
 *
 * Available variables:
 * - $block->subject: Block title.
 * - $content: Block content.
 * - $block->module: Module that generated the block.
 * - $block->delta: An ID for the block, unique within each module.
 * - $block->region: The block region embedding the current block.
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the
 *   following:
 *   - block: The current template type, i.e., "theming hook".
 *   - block-[module]: The module generating the block. For example, the user
 *     module is responsible for handling the default user navigation block. In
 *     that case the class would be 'block-user'.
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *
 * Helper variables:
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $block_zebra: Outputs 'odd' and 'even' dependent on each block region.
 * - $zebra: Same output as $block_zebra but independent of any block region.
 * - $block_id: Counter dependent on each block region.
 * - $id: Same output as $block_id but independent of any block region.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 * - $block_html_id: A valid HTML ID and guaranteed unique.
 *
 * @see template_preprocess()
 * @see template_preprocess_block()
 * @see template_process()
 *
 * @ingroup themeable
 */
//var_dump($block->variables['menu']);
?>

<div id="<?php print $block_html_id; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?>>

  <?php print render($title_prefix); ?>
  <?php if ($block->subject): ?>
    <h2<?php print $title_attributes; ?>><?php print $block->subject ?></h2>
  <?php endif;?>
  <?php print render($title_suffix); ?>

  <div class="small-12 medium-12 large-12 content left"<?php print $content_attributes; ?>>
    <div class="megamenu-wrapper">
      
      <div class="megamenu-menu-tabs-wrapper">
        <ul class="megamenu-menu-tabs">
          <?php foreach(element_children($block->variables['menu']) as $key): ?>   
            <li><a href="#panel-<?php echo $key; ?>"><?php echo $block->variables['menu'][$key]['#title']; ?></a></li>
          <?php endforeach; ?>   
        </ul>
      </div>

      <div class="megamenu-menu-tabs-content-wrapper">
        <ul class="megamenu-tabs-content">
          <?php foreach(element_children($block->variables['menu']) as $key): ?>   
            <li id="panel-<?php echo $key; ?>">
              <div class="megamenu-content-links">
                <ul>
                  <?php foreach(element_children($block->variables['menu'][$key]['#below']) as $below_key):?>
                    <li><?php echo l($block->variables['menu'][$key]['#below'][$below_key]['#title'], $block->variables['menu'][$key]['#below'][$below_key]['#href']); ?></li>
                  <?php endforeach; ?>
                </ul>
              </div>              
              <div class="megamenu-content-feature">
                <div class="megamenu-feature-image">
                  <?php if(!empty($block->variables['menu'][$key]['#original_link']['options']['og_menu_utilities_item_image'])): ?>
                    <img src="<?php echo image_style_url('large', $block->variables['menu'][$key]['#original_link']['options']['og_menu_utilities_item_image']['path']); ?>">
                  <?php endif; ?>
                </div>
                <div class="megamenu-feature-text">
                  <?php if(!empty($block->variables['menu'][$key]['#original_link']['options']['og_menu_utilities_item_body'])): ?>
                    <?php echo $block->variables['menu'][$key]['#original_link']['options']['og_menu_utilities_item_body']['value'];?>
                  <?php endif; ?>
                </div>
              </div>
            </li>
          <?php endforeach; ?>   
        </ul>
      </div>

    </div>
  </div>

</div>
