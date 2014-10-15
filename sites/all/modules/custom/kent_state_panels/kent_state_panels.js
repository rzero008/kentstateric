(function ($) {
    Drupal.behaviors.kent_state_panels = {
        attach: function (context, settings) {
            
            if($(context).prop('tagName') !== 'FORM' && $(context).find('.panels-ipe-editing').length === 0){
                if(!settings.kentStatePanels.carousel){
                    settings.kentStatePanels.carousel = $('.owl-carousel').owlCarousel({
                        items: 1,
                        nav:true,
                        animateOut: 'fadeOut',
                        animateIn: 'fadeIn',
                        navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'],
                    });
                }


            }
            
            if($(context).find('.panels-ipe-editing').length > 0){
                if(settings.kentStatePanels.carousel){                
                    settings.kentStatePanels.carousel.trigger('destroy.owl.carousel');
                }
            }            
        }
    };
})(jQuery);
