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
  <!-- Top Feature Row -->
  <div class="small-12 medium-12 large-12 left">
    <?php print $content['feature_top']; ?>
  </div>
  <!-- ./Top Feature Row -->
  <!-- Middle Asymmetrical -->
  <div class="small-12 medium-12 large-12 left asymmetrical-row">
    <div class="small-12 medium-4 large-3 columns top-left-asymmetrical">
      <?php print $content['top_left_asymmetrical']; ?>
    </div>
    <div class="small-12 medium-8 large-9 columns top-right-asymmetrical">
      <?php print $content['top_right_asymmetrical']; ?>
    </div>
  </div>
  <!-- ./ Middle 4col - 8col -->
  <!-- Middle Quad Row -->
  <div class="small-12 medium-12 large-12 left fourths-row">
    <div class="small-12 medium-6 large-3 columns left-fourth">
      <?php print $content['left_fourth']; ?>
    </div>
    <div class="small-12 medium-6 large-3 columns left-middle-fourth">
      <?php print $content['left_middle_fourth']; ?>
    </div>
    <div class="small-12 medium-6 large-3 columns right-middle-fourth">
      <?php print $content['right_middle_fourth']; ?>
    </div>
    <div class="small-12 medium-6 large-3 columns right-fourth">
      <?php print $content['right_fourth']; ?>
    </div>
  </div>
  <!-- ./Middle Quad Row -->
  <!-- Middle Tri Row -->
  <div class="small-12 medium-12 large-12 left thirds-row">
    <div class="small-12 medium-12 large-4 columns left-third">
      <?php print $content['left_third']; ?>
    </div>
    <div class="small-12 medium-6 large-4 columns middle-third">
      <?php print $content['middle_third']; ?>
    </div>
    <div class="small-12 medium-6 large-4 columns right-third">
      <?php print $content['right_third']; ?>
    </div>
  </div>
  <!-- ./Middle Tri Row -->
  <!-- Middle Dual Row -->
  <div class="small-12 medium-12 large-12 left halves-row">
    <div class="small-12 medium-12 large-6 columns left-half">
      <?php print $content['left_half']; ?>
    </div>
    <div class="small-12 medium-12 large-6 columns right-half">
      <?php print $content['right_half']; ?>
    </div>
  </div>
  <!-- ./Middle Tri Row -->
  <!-- Body Row Column -->
  <div class="small-12 medium-12 large-12 columns body">
    <?php print $content['body']; ?>
  </div>
  <!-- ./Body Row Column-->
  <!-- Bottom Feature -->
  <div class="small-12 medium-12 large-12 left feature-bottom">
    <?php print $content['feature_bottom']; ?>
  </div>
  <!-- ./Bottom Feature -->
  <!-- Bottom Footer -->
  <div class="small-12 medium-12 large-12 left footer">
    <?php print $content['footer']; ?>
  </div>
  <!-- ./Bottom Footer -->
</div>
