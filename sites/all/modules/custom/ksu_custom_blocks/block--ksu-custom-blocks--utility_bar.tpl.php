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
global $user;
//echo '<pre>';var_dump(og_user_access('node', ksu_custom_blocks\OGContext::$nid, 'administer og menu'));exit;
?>
<div id="<?php print $block_html_id; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?>>

  <?php print render($title_prefix); ?>
  <?php if ($block->subject): ?>
    <h2<?php print $title_attributes; ?>><?php print $block->subject ?></h2>
  <?php endif;?>
  <?php print render($title_suffix); ?>
  <?php if($user->uid !== 0): ?>
    <div class="content"<?php print $content_attributes; ?>>
      <?php //echo '<pre>';var_dump($node_create_links['og_node_create_links']['#items']);exit; ?>
      <nav class="top-bar" data-topbar>
        
        <ul class="title-area">
          <li class="name"></li>
          <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
          <li class="toggle-topbar menu-icon"><a href="#"><span>Admin Menu</span></a></li>
        </ul>

        <section class="top-bar-section">
          <!-- Right Nav Section -->
          
          <ul class="right">
            
          </ul>

          <!-- Left Nav Section -->
          <ul class="left">
            
            <li class="has-dropdown">
              <a href="#">Hi <?php echo $user->name; ?></a>
              <ul class="dropdown">

                <?php if(current_path() === 'userdash'): ?>
                  <li class="active"><?php echo l('My Content Dashboard', 'userdash'); ?></li>
                <?php else: ?>
                  <li><?php echo l('My Content Dashboard', 'userdash'); ?></li>
                <?php endif; ?>
                
                <?php if(current_path() === 'blog/'.$user->uid): ?>
                  <li class="active"><?php echo l('View Blog Entries', 'blog/'.$user->uid); ?></li>
                <?php else: ?>
                  <li><?php echo l('View Blog Entries', 'blog/'.$user->uid); ?></li>
                <?php endif; ?>
                <li><?php echo l('Add Blog Entry', 'node/add/blog'); ?></li>
                
                <?php if(current_path() === 'user/'.$user->uid): ?>
                  <li class="active"><?php echo l('My Profile', 'user', array('attributes'=>array('style'=>'display:inline-block;'))); ?></li>
                <?php else: ?>
                  <li><?php echo l('My Profile', 'user', array('attributes'=>array('style'=>'display:inline-block;'))); ?></li>
                <?php endif; ?>
                
                <li><?php echo l('Logout', 'user/logout'); ?></li>
                
              </ul>
            </li>      
            
            <li class="divider"></li>

            <li class="has-form"><span class="label">Page Node ID: <?php echo $block->variables['nid']; ?></span></li>
            
            <li class="divider"></li>

            <li class="has-form"><span class="label">Current Group: <?php echo ksu_custom_blocks\OGContext::$name; ?></span></li>
            
            <li class="divider"></li>
            
            <li class="has-form">
              <span class="label">Current Group Roles: 
                <?php echo implode(', ', $block->variables['og_user_roles']); ?>
              </span>
            </li>
            
            <li class="divider"></li>

            <?php if(!empty(ksu_custom_blocks\OGContext::$name)): ?>
              
              <li class="has-dropdown">
                <a href="#"><?php echo ksu_custom_blocks\OGContext::$name; ?> Actions</a>
                <ul class="dropdown">
                  <?php if(!empty($block->variables['og_node_create_links']['og_node_create_links'])): ?>
                    <li class="has-dropdown">
                      <a href="#">Create Content</a>
                      <ul class="dropdown">
                        <li class="label secondary">Content Types</li>
                        <?php foreach($block->variables['og_node_create_links']['og_node_create_links']['#items'] as $item): ?>
                          <li><?php echo $item['data']; ?></li>
                        <?php endforeach; ?>
                      </ul>
                    </li>
                  <?php endif; ?>
                  <?php if(is_numeric($block->variables['nid']) && og_user_access('node', ksu_custom_blocks\OGContext::$nid, 'administer og menu')): ?>
                    <li>
                      <a href="<?php echo '/group/node/'.ksu_custom_blocks\OGContext::$nid.'/admin/menus/'.ksu_custom_blocks\OGContext::$primaryMenuName.'/add?nid='.$block->variables['nid'].'&title='.'Temp Title'; ?>">Add this page to group menu</a>
                    </li>
                  <?php endif; ?>
                  <li><?php echo l('Go to Group', 'node/'.ksu_custom_blocks\OGContext::$nid);  ?></li>
                  <li><?php echo l('View Group Content', 'groupdash/'.ksu_custom_blocks\OGContext::$nid);  ?></li>
                </ul>
              </li>
            <?php endif; ?>

          </ul>
          
        </section>
      </nav>


      <?php //print $content ?>
    </div>
  <?php endif; ?>
</div>
