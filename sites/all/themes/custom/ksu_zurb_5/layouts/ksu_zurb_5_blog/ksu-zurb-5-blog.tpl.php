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
<div class="small-12 medium-12 large-12 left" <?php !empty($css_id) ? print 'id="' . $css_id . '"' : ''; ?>>
  <div class="small-12 medium-12 large-12 left">
    <?php print $content['feature_top']; ?>
  </div>
  <div class="small-12 medium-12 large-12 columns">
    <?php print $content['title_top']; ?>
  </div>
  <!-- ./Title Row -->
  <div class="small-12 medium-8 large-9 columns">
    <?php print $content['body']; ?>
  </div>
  <div class="small-12 medium-4 large-3 columns">
    <?php print $content['sidebar']; ?>
  </div>
  <div class="small-12 medium-12 large-12 left">
    <?php print $content['footer']; ?>
  </div>
</div>
