(function ($) {
    Drupal.behaviors.ksu_custom_blocks =  {
        attach: function(context, settings) {
            $('.megamenu-menu-tabs a').on('click', function(e){
                e.preventDefault();
                
                var panelID = $(this).attr('href');
                
                if($(this).hasClass('active')){
                    $(this).removeClass('active');
                    $(panelID).removeClass('active');
                    return false;
                }
                
                var $menuWrapper = $(this).closest('.megamenu-wrapper');
                
                $menuWrapper.find('.megamenu-menu-tabs a.active').removeClass('active');
                $menuWrapper.find('.megamenu-tabs-content li.active').removeClass('active');
                
                $(this).addClass('active');
                $(panelID).addClass('active');
            });       
            $('body').on('click', function(e){
                var $target = $(e.target);
                if($target.closest('.block-ksu-custom-blocks-og-megamenu').length === 0){
                    var $menuWrappers = $('.block-ksu-custom-blocks-og-megamenu .megamenu-wrapper');
                    $menuWrappers.find('.megamenu-menu-tabs a.active').removeClass('active');
                    $menuWrappers.find('.megamenu-tabs-content li.active').removeClass('active');
                };
                
                if($target.attr('class') === 'megamenu-menu-tabs-wrapper'){
                    var $menuWrappers = $('.block-ksu-custom-blocks-og-megamenu .megamenu-wrapper');
                    $menuWrappers.find('.megamenu-menu-tabs a.active').removeClass('active');
                    $menuWrappers.find('.megamenu-tabs-content li.active').removeClass('active');
                }
            });
        }
    };
})(jQuery);
