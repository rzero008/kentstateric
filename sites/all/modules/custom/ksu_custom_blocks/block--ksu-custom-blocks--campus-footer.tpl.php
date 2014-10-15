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

//var_dump($block->variables);
$address = array();
$address[0] = array('safe_value'=>'');
if(!empty($block->variables['campus'])){
    $address = field_get_items('taxonomy_term', $block->variables['campus'], 'field_campus_address');
}
$mailing_address = array();
$mailing_address[0] = array('safe_value'=>'');
if(!empty($block->variables['campus'])){
    $mailing_address = field_get_items('taxonomy_term', $block->variables['campus'], 'field_campus_mailing_address');
}
$phone = array();
$phone[0] = array('safe_value'=>'');
if(!empty($block->variables['campus'])){
    $phone = field_get_items('taxonomy_term', $block->variables['campus'], 'field_campus_phone');
}
$email = array();
$email[0] = array('safe_value'=>'');
if(!empty($block->variables['campus'])){
    $email = field_get_items('taxonomy_term', $block->variables['campus'], 'field_campus_email');
}
?>
<div id="<?php print $block_html_id; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?>>

  <?php print render($title_prefix); ?>
  <?php if ($block->subject): ?>
    <h2<?php print $title_attributes; ?>><?php print $block->subject ?></h2>
  <?php endif;?>
  <?php print render($title_suffix); ?>

  <div class="content"<?php print $content_attributes; ?>>
    <a class="site-logo" href="/"></a>
    <div class="footer-social">
      <?php echo $block->variables['social_media']; ?>
    </div>
    <div class="footer-menu">
      <ul>
        <?php foreach(element_children($block->variables['menu']) as $key): ?>
          <li>
            <?php echo l($block->variables['menu'][$key]['#title'], $block->variables['menu'][$key]['#href']); ?>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
    <div class="campus-phone">
      <dl>
        <dt>Phone</dt>
        <dd><?php echo $phone[0]['safe_value']; ?></dd>
      </dl>
    </div>
    <div class="campus-address">
      <dl>
        <dt>Address</dt>
        <dd><?php echo $address[0]['safe_value']; ?></dd>
        <dd><?php echo $mailing_address[0]['safe_value']; ?></dd>
      </dl>
    </div>
    <div class="campus-email">
      <dl>
        <dt>Email</dt>
        <dd><?php echo $email[0]['safe_value']; ?></dd>
      </dl>      
    </div>
    <div class="campus-descritpion"><?php echo $block->variables['campus']->description; ?></div>
  </div>
</div>
