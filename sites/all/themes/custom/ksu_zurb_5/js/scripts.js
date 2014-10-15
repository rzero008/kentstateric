(function ($, Drupal) {

    Drupal.behaviors.ksu_zurb_5 = {
        attach: function(context, settings) {
            if(typeof $.fn.owlCarousel !== 'undefined'){
                $('.field-name-field-news-featured-images [data-owl]').owlCarousel({
                    loop:false,
                    items:1,
                    margin:1,
                    nav:true,
                    navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'],
                    animateIn: 'fadeIn',
                    animateOut: 'fadeOut',
                });

                $('.field-name-field-location-media [data-owl]').owlCarousel({
                    loop:false,
                    items:1,
                    margin:1,
                    nav:true,
                    navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'],
                    animateIn: 'fadeIn',
                    animateOut: 'fadeOut',
                });

                $('.field-name-field-success-featured-images [data-owl]').owlCarousel({
                    loop:false,
                    items:1,
                    margin:1,
                    nav:true,
                    navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'],
                    animateIn: 'fadeIn',
                    animateOut: 'fadeOut',
                });    
                
                $('.field-name-field-success-stories [data-owl]').owlCarousel({
                    loop:false,
                    items:1,
                    margin:1,
                    nav:true,
                    navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'],
                    animateIn: 'fadeIn',
                    animateOut: 'fadeOut',
                });    

                $('.field-name-field-featured-medias [data-owl]').owlCarousel({
                    loop:false,
                    items:1,
                    margin:1,
                    nav:true,
                    navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'],
                    animateIn: 'fadeIn',
                    animateOut: 'fadeOut',
                });    

                $('.pane-ksu-custom-blocks-og-success-story-slider-cta [data-owl]').owlCarousel({
                    loop:false,
                    items:1,
                    margin:1,
                    nav:true,
                    navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'],
                    animateIn: 'fadeIn',
                    animateOut: 'fadeOut',
                });    
            }
        }
    };
	
	$(".navMobile input[name=search_block_form]").attr("placeholder", "Enter Keyword");

})(jQuery, Drupal);
