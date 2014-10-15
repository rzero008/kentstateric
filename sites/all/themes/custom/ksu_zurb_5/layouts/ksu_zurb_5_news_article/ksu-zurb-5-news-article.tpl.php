<?php
/**
 * @file
 * Template for a 3 column panel layout.
 *
 * This template provides a very simple "one column" panel display layout.
 *
 * Variables:
 * - $id: An optional CSS id to use for the layout.
 * - $content: An array of content, each item in the array is keyed to one
 *   panel of the layout. This layout supports the following sections:
 *   $content['middle']: The only panel in the layout.
 */
?>
<div class="small-12" <?php !empty($css_id) ? print 'id="' . $css_id . '"' : ''; ?>>
  <div class="small-12 medium-12 large-12 left">
    <?php print $content['feature_image']; ?>
  </div>
  
  <div class="small-12 medium-12 large-12 left">
    <div class="small-12 medium-12 large-12 columns">
      <?php print $content['title']; ?>
    </div>
    <div class="small-12 medium-12 large-4 large-push-8 columns">

      <?php print $content['sidebar']; ?>
    </div>
    <div class="small-12 medium-12 large-8 large-pull-4 columns">
      <?php print $content['body']; ?>
    </div>
  </div>
  
  <div class="small-12 medium-12 large-12 left">
    <?php print $content['footer']; ?>
  </div>
</div>
