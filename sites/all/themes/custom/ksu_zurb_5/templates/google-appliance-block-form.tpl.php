<?php
// $Id$
/**
 * @file
 *    default theme implementation for the search block form
 * variables of interest
 * - variables['form'] : the form elements array, pre-render
 * - variables['block_search_form']['hidden'] : hidden form elements collapsed + rendered 
 * - variables['block_serach_form'] : form elements rendered and keyed by original form keys
 * - variables['block_search_form_complete'] : the entire form collapsed and rendered
 *
 * @see template_preprocess_google_appliance_block_form()
 */
//dsm($variables);
?>

<form method="post" action="<?php echo $variables['form']['#action']; ?>" id="<?php echo $variables['form']['#id'] ?>" accept-charset="UTF-8">
  <div class="row collapse">
    <div class="small-10 medium-10 large-10 columns">
      <?php echo $variables['block_search_form']['search_keys']; ?>
      <?php echo $variables['block_search_form']['hidden']; ?>
	  <span class="az"><?php echo $variables['glossary_link']; ?></span>
    </div>
    <div class="small-2 medium-2 large-2 columns">
      <button class="button postfix">
        <i class="fa fa-search fa-2x"></i>
      </button>
    </div>
  </div>

</form>
