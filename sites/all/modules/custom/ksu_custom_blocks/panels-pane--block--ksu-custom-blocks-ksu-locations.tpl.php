<?php
/**
 * @file panels-pane.tpl.php
 * Main panel pane template
 *
 * Variables available:
 * - $pane->type: the content type inside this pane
 * - $pane->subtype: The subtype, if applicable. If a view it will be the
 *   view name; if a node it will be the nid, etc.
 * - $title: The title of the content
 * - $content: The actual content
 * - $links: Any links associated with the content
 * - $more: An optional 'more' link (destination only)
 * - $admin_links: Administrative links associated with the content
 * - $feeds: Any feed icons or associated with the content
 * - $display: The complete panels display object containing all kinds of
 *   data including the contexts and all of the other panes being displayed.
 */
?>
<?php if ($pane_prefix): ?>
  <?php print $pane_prefix; ?>
<?php endif; ?>
<div class="<?php print $classes; ?>" <?php print $id; ?>>
  <?php if ($admin_links): ?>
    <?php print $admin_links; ?>
  <?php endif; ?>

  <?php print render($title_prefix); ?>
  <?php if ($title): ?>
    <h2<?php print $title_attributes; ?>><?php print $title; ?></h2>
  <?php endif; ?>
  <?php print render($title_suffix); ?>

  <?php if ($feeds): ?>
    <div class="feed">
      <?php print $feeds; ?>
    </div>
  <?php endif; ?>

  <div class="pane-content small-12 medium-12 large-12 left">
    <div class="small-12 large-3 medium-3 left hide-for-medium-down">
      <img alt="Kent State Ohio campus locations chart" title="Kent State Ohio Locations" src="/sites/all/themes/custom/ksu_zurb_5/images/ohio.png">
    </div>
    <div class="small-12 medium-12 large-6 left text-center">
      <h2>Where is <span>KENT STATE</span>?</h2>
      <ul class="small-block-grid-1 medium-block-grid-3 large-block-grid-3 no-bullet">
        <?php foreach(element_children($content_data['menu']) as $key): ?>
          <?php echo decode_entities(render($content_data['menu'][$key])); ?>
        <?php endforeach; ?>
      </ul>
    </div>
    <div class="small-12 large-3 medium-3 right hide-for-medium-down">
      <img alt="Kent State international locations chart" title="Kent State International Locations" src="/sites/all/themes/custom/ksu_zurb_5/images/world.png">
    </div>
    <?php //print render($content); ?>
  </div>

  <?php if ($links): ?>
    <div class="links">
      <?php print $links; ?>
    </div>
  <?php endif; ?>

  <?php if ($more): ?>
    <div class="more-link">
      <?php print $more; ?>
    </div>
  <?php endif; ?>
</div>
<?php if ($pane_suffix): ?>
  <?php print $pane_suffix; ?>
<?php endif; ?>
