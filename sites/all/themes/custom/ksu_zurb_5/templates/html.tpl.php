<?php

/**
 * @file
 * Default theme implementation to display the basic html structure of a single
 * Drupal page.
 *
 * Variables:
 * - $css: An array of CSS files for the current page.
 * - $language: (object) The language the site is being displayed in.
 *   $language->language contains its textual representation.
 *   $language->dir contains the language direction. It will either be 'ltr' or 'rtl'.
 * - $rdf_namespaces: All the RDF namespace prefixes used in the HTML document.
 * - $grddl_profile: A GRDDL profile allowing agents to extract the RDF data.
 * - $head_title: A modified version of the page title, for use in the TITLE
 *   tag.
 * - $head_title_array: (array) An associative array containing the string parts
 *   that were used to generate the $head_title variable, already prepared to be
 *   output as TITLE tag. The key/value pairs may contain one or more of the
 *   following, depending on conditions:
 *   - title: The title of the current page, if any.
 *   - name: The name of the site.
 *   - slogan: The slogan of the site, if any, and if there is no title.
 * - $head: Markup for the HEAD section (including meta tags, keyword tags, and
 *   so on).
 * - $styles: Style tags necessary to import all CSS files for the page.
 * - $scripts: Script tags necessary to load the JavaScript files and settings
 *   for the page.
 * - $page_top: Initial markup from any modules that have altered the
 *   page. This variable should always be output first, before all other dynamic
 *   content.
 * - $page: The rendered page content.
 * - $page_bottom: Final closing markup from any modules that have altered the
 *   page. This variable should always be output last, after all other dynamic
 *   content.
 * - $classes String of classes that can be used to style contextually through
 *   CSS.
 *
 * @see template_preprocess()
 * @see template_preprocess_html()
 * @see template_process()
 */
?>
<!DOCTYPE html>
<!-- Sorry no IE7 support! -->
<!-- @see http://foundation.zurb.com/docs/index.html#basicHTMLMarkup -->

<!--[if IE 8]><html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
  <head>
    
    <?php print $head; ?>
    <title><?php print $head_title; ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php print $styles; ?>
    <link href='//fonts.googleapis.com/css?family=News+Cycle:400,700' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Roboto+Slab:400,700' rel='stylesheet' type='text/css'>
    <?php print $scripts; ?>
    
    <!--[if lt IE 9]>
    <link rel="stylesheet" type="text/css" href="/sites/all/themes/custom/ksu_zurb_5/css/ksu-ie8.css"/>
    <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6.2/html5shiv.js"></script>
    <script src="//s3.amazonaws.com/nwapi/nwmatcher/nwmatcher-1.2.5-min.js"></script>
    <script src="//html5base.googlecode.com/svn-history/r38/trunk/js/selectivizr-1.0.3b.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.1.0/respond.min.js"></script>
    <![endif]-->

  </head>
  <body class="<?php print $classes; ?>" <?php print $attributes;?>>
    <div class="skip-link">
      <a href="#main-content" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>
    </div>
    <?php print $page_top; ?>
    <?php print $page; ?>
    <?php print $page_bottom; ?>
    <?php print _zurb_foundation_add_reveals(); ?>
    <!--[if IE 8]>
    <script>
    (function($) {
    if (!Foundation.stylesheet) {
    Foundation._style_element = $("<style></style>").appendTo("head")[0];
    Foundation.stylesheet = Foundation._style_element.styleSheet;
    if (Foundation.stylesheet) {
    Foundation.stylesheet.cssRules = {
    length: 0
    };
    Foundation.stylesheet.insertRule = function(rule, index) {
    var media, mediaMatch, mediaRegex, namespace, ruleMatch, ruleRegex;
    mediaRegex = /^\s*@media\s*(.*?)\s*\{\s*(.*?)\s*\}\s*$/;
    mediaMatch = mediaRegex.exec(rule);
    media = "";
    if (mediaMatch) {
    media = "@media " + mediaMatch[1] + " ";
    rule = mediaMatch[2];
    }
    ruleRegex = /^\s*(.*?)\s*\{\s*(.*?)\s*\}\s*$/;
    ruleMatch = ruleRegex.exec(rule);
    namespace = "" + media + ruleMatch[1];
    rule = ruleMatch[2];
    return this.addRule(namespace, rule);
    };
    } else if (window.console) {
    console.log("Could not fix Foundation css rules...");
    }
    }
    })(jQuery);
    </script>
    <![endif]-->
    <script>
     (function ($, Drupal, window, document, undefined) {
         $(document).foundation();
     })(jQuery, Drupal, this, this.document);
    </script>

    <!-- Pinterest Pin It Javascript -->
    <!-- <script type="text/javascript" async src="//assets.pinterest.com/js/pinit.js"></script>  -->
    <!-- ./Pinterest Pin It Javascript -->

    <!-- Twitter Widgets Javascript -->
    <!-- <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>  -->
    <!-- ./Twitter Widgets Javascript -->

    <!-- FB SDK Javascript -->
    <div id="fb-root"></div>
    <!-- <script>
     (function(d, s, id) {
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) return;
         js = d.createElement(s); js.id = id;
         js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
         fjs.parentNode.insertBefore(js, fjs);
     }(document, 'script', 'facebook-jssdk'));
    </script>  -->
    <!-- ./FB SDK Javascript -->
    <!-- Google +1 Button -->
    <!-- <script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>  -->
    <!-- ./Google +1 Button -->
  </body>
</html>
