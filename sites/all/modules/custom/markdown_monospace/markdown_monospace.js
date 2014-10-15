(function ($) {
    Drupal.behaviors.markdown_monospace = {
        attach: function(context){
            //run any other textarea behaviors first
            if (Drupal.behaviors.textarea && Drupal.behaviors.textarea.attach) {
                Drupal.behaviors.textarea.attach(context);
            }

            if(typeof Drupal.settings.markdown_monospace !== 'undefined'){
                var inputs = Drupal.settings.markdown_monospace.inputs;
                for(x in inputs){
                    if(!$('#'+inputs[x].filter_id).hasClass('markdown-processed')){
                        $('#'+inputs[x].filter_id).addClass('markdown-processed');
                        $('#'+inputs[x].filter_id).attr('data-markdown', '#'+inputs[x].textarea_id);
                        $('#'+inputs[x].textarea_id).addClass('markdown-processed');
                        $('#'+inputs[x].summary_id).addClass('markdown-processed');
                    }
                }
                $('.markdown-processed').each(function(){
                    if($(this)[0].tagName === 'SELECT'){
                        $(this).unbind('change.markdown').bind('change.markdown', function(){
                            var textarea_id = $(this).attr('data-markdown');
                            if(Drupal.settings.markdown_monospace.select_values.indexOf($(this).val()) !== -1){
                                $(textarea_id).addClass('markdown-active');
                            }
                            else{
                                $(textarea_id).removeClass('markdown-active');
                            }
                        });
                    }
                });
            }
        },
        detach: function(context, settings, trigger){
            $('.markdown-processed').each(function(){
                if($(this)[0].tagName === 'SELECT'){
                    $(this).unbind('change.markdown');
                }
                $(this).removeClass('markdown-processed');
            });
        }
    };
})(jQuery);
