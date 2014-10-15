(function ($) {
    Drupal.behaviors.ksu_custom_tweaks =  {
        attach: function(context, settings) {
            var $OGSelects = $('.field-name-og-group-ref select');
            $OGSelects.each(function(){
                var optCount = $(this).find('option').length;
                var optGroupCount = $(this).find('optgroup').length;
                console.log(optCount);
                console.log(optGroupCount);
                $(this).css({'height' : (18*(optCount+optGroupCount))+'px'});
            });

            //prevent navigating away when the user forgot to save
            window.onbeforeunload = function() {
                return "\nHeads up! You haven't saved this yet!";
            };

            $('#edit-submit').on('click', function(e){
                window.onbeforeunload = function() {
                };
            });

            $('#edit-preview').on('click', function(e){
                window.onbeforeunload = function() {
                };
            });
            $('#edit-delete').on('click', function(e){
                window.onbeforeunload = function() {
                };
            });
        }
    };
})(jQuery);
