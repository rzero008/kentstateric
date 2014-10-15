(function ($) {
    Drupal.behaviors.kent_state_blocks = {
        attach: function (context, settings) {

            $('body').on('click', function(e){
                $('.megamenu-wrapper').find('.megamenu-container.active').removeClass('active');
            });


            $('.megamenu-container').on('click', function(e){
                e.stopPropagation();
            });
            
            $('.megamenu-title').on('click', function(e){
                //e.preventDefault();
                //e.stopPropagation();
                //toggleMenu($(this));
            });
            
            $('.megamenu-title').on('mouseover', function(e){
                e.stopPropagation();
                if(!$(this).parent().find('.megamenu-container').hasClass('active')){
                    toggleMenu($(this));
                }
            })

            $('.megamenu-container').on('mouseover', function(e){
                e.stopPropagation();
            })

            $('body').on('mouseover', function(e){
                $('.megamenu-wrapper').find('>li.active').removeClass('active');
            });
            
            function toggleMenu($that){                
                var $wrapper = $that.closest('.megamenu-wrapper');                
                $wrapper.find('>li.active').removeClass('active');
                $that.parent('li').addClass('active');
            }
        },
    };
})(jQuery);
