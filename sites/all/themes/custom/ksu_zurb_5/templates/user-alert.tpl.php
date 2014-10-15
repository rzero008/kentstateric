<?php
/**
 * @file
 * Displays a user alert.
 *
 * Available variables:
 * - $alert_label: The label of the alert, as set in the User Alerts settings.
 * - $body: The user alert message.
 *
 * @ingroup themeable
 */
?>

<style>
 div.user-alert{
   position:fixed;
   top:0;
   height:auto;
   z-index:600;
   background-color:#f04124;
   box-shadow:inset 0px 0px 2px 0px white;
   color:white;
 }
</style>

<div id="user-alert-<?php print $nid; ?>" class="user-alert small-12 left">
  <!--
   <?php if ($is_closeable) : ?><div class="user-alert-close"><a href="javascript:;" rel="<?php print $nid; ?>">x</a></div><?php endif; ?>
  -->
   <div class="user-alert-message"><?php if ($alert_label) : ?><span class="user-label"><?php print $alert_label; ?>:</span><?php endif; ?> <?php print $body; ?></div>
</div>
