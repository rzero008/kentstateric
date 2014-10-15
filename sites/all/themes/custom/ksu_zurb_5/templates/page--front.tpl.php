<!--.page -->

<div role="document" class="page small-12 medium-12 large-12 left">

  <!--.l-header -->
  <header role="banner" class="l-header small-12 medium-12 large-12 left">

    <div class="header-top-container small-12 medium-12 large-12 left">
      
      <?php if (!empty($page['header_top_left'])): ?>
        <!--.l-header-region -->
        <section class="header-top-left-region small-12 medium-12 large-8 columns">
          <div>
            <?php print render($page['header_top_left']); ?>
          </div>
        </section>
        <!--/.l-header-region -->
      <?php endif; ?>
      
      <?php if (!empty($page['header_top_right'])): ?>
        <!--.l-header-region -->
        <section class="header-top-right-region small-12 medium-12 large-4 columns">
          <div>
            <?php print render($page['header_top_right']); ?>
          </div>
        </section>
        <!--/.l-header-region -->
      <?php endif; ?>      

      <?php if (!empty($page['campus_header'])): ?>
        <!--.l-header-region -->
        <section class="campus-header-region small-12 medium-12 large-12 left">
          <div>
            <?php print render($page['campus_header']); ?>
          </div>
        </section>
        <!--/.l-header-region -->
      <?php endif; ?>
      
    </div>

    <?php if (!empty($page['group_header'])): ?>
      <!--.l-header-region -->
      <section class="group-header-region small-12 medium-12 large-12 left">
        <div>
          <?php print render($page['group_header']); ?>
        </div>
      </section>
      <!--/.l-header-region -->
    <?php endif; ?>

	  <section class="researchSponsoredProg">
	      <span><h2>Research and Sponsored Programs</h2></span>
	  </section>
	  <!--end of /. researchSponsoredProg -->

    <?php if (!empty($page['megamenu'])): ?>
      <!--.l-header-region -->
      <section class="megamenu-region small-12 medium-12 large-12 left">
        <div>
          <?php print render($page['megamenu']); ?>
        </div>
      </section>
      <!--/.l-header-region -->
    <?php endif; ?>
	
	  <!--In Mobile/Tablet Menu -->
	    <nav class="top-bar navMobile" data-topbar role="navigation">
			<ul class="title-area">
			   <li class="name"><h1> <?php if ($linked_logo): print $linked_logo; endif; ?></h1></li>
			   <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
			</ul>
        <section class="top-bar-section utilityBG">  
			<?php print $search_box_mobile; ?>
			<?php print render($page['header_top_right']); ?>
			<?php print $custom_menu_utility; ?>
            <?php print $top_bar_main_menu; ?>
            <?php if ($top_bar_secondary_menu) :?>
            <?php print $top_bar_secondary_menu; ?>
          <?php endif; ?>
        </section>
      </nav>

  </header>
  <!--/.l-header -->

  <?php if ($messages && !$zurb_foundation_messages_modal): ?>
    <!--.l-messages -->
    <section class="l-messages row">
      <div class="small-12 medium-12 large-12 columns">
        <?php if ($messages): ?>
          <?php echo $messages; ?>
        <?php endif; ?>
      </div>
    </section>
    <!--/.l-messages -->
  <?php endif; ?>
  
  <?php if (!empty($page['help'])): ?>
    <!--.l-help -->
    <section class="l-help row">
      <div class="small-12 medium-12 large-12 columns">
        <?php print render($page['help']); ?>
      </div>
    </section>
    <!--/.l-help -->
  <?php endif; ?>

  <main role="main" class="small-12 medium-12 large-12 left l-main">

    <div class="<?php print $main_grid; ?> main">
      <?php if (!empty($page['highlighted'])): ?>
        <div class="highlight panel callout">
          <?php print render($page['highlighted']); ?>
        </div>
      <?php endif; ?>

      <a id="main-content"></a>
      
      <?php if ($title && !$is_front): ?>
        <?php print render($title_prefix); ?>
        <h1 id="page-title" class="title"><?php print $title; ?></h1>
        <?php print render($title_suffix); ?>
      <?php endif; ?>
      
      <?php if (!empty($tabs)): ?>
        <?php print render($tabs); ?>
        <?php if (!empty($tabs2)): ?><?php print render($tabs2); ?><?php endif; ?>
      <?php endif; ?>
      
      <?php if ($action_links): ?>
        <ul class="action-links">
          <?php print render($action_links); ?>
        </ul>
      <?php endif; ?>
      
      <?php print render($page['content']); ?>
      
    </div>
    <!--/.l-main region -->

  </main>
  <!--/.l-main-->

  <footer role="contentinfo" class="l-footer small-12 medium-12 large-12 left">
    <?php if (!empty($page['footer_top'])): ?>
      <!--.l-header-region -->
      <section class="footer-top-region small-12 medium-12 large-12 left">
        <div class="small-12 medium-12 large-12 columns">
          <?php print render($page['footer_top']); ?>
        </div>
      </section>
      <!--/.l-header-region -->
    <?php endif; ?>

	<div class="ksu-backgroundBottom">
		<?php if (!empty($page['footer_middle'])): ?>
		  <!--.l-header-region -->
		  <section class="footer-middle-region small-12 medium-12 large-12 left">
			<div class="small-12 medium-12 large-12 columns">
			  <?php print render($page['footer_middle']); ?>
			</div>
		  </section>
		  <!--/.l-header-region -->
		<?php endif; ?>

		<?php if (!empty($page['footer_bottom'])): ?>
		  <!--.l-header-region -->
		  <section class="footer-bottom-region small-12 medium-12 large-12 left">
			<div class="small-12 medium-12 large-12 columns">
			  <?php print render($page['footer_bottom']); ?>
			</div>
		  </section>
		  <!--/.l-header-region -->
		<?php endif; ?>
	</div> <!--end of ksu-backgroundBottom -->
    
  </footer>

  <?php if ($messages && $zurb_foundation_messages_modal): print $messages; endif; ?>
</div>
<!--/.page -->
