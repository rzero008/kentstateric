(function ($) {
    Drupal.behaviors.kent_state_og_user_alert = {
        attach: function(context, settings) {
            $.ajax({
                type: 'GET',
                url: Drupal.settings.basePath + Drupal.settings.pathPrefix + Drupal.settings.user_alert.url_prefix + 'js/user-alert/get-message/'+settings.kentStateOg.nid,
                success: function(response) {
                    $('.block-user-alert').html(response[1].data);
                }
            });
    	    
            $('body').delegate('div.user-alert-close a', 'click', function() {
                id = $(this).attr('rel');
                $.ajax({
                    type: 'GET',
                    data: 'message=' + id,
                    url: Drupal.settings.basePath + Drupal.settings.user_alert.url_prefix + 'js/user-alert/close-message',
                    success: function(response) {
                        $('#user-alert-' + id).fadeOut('slow');
                    }
                });
            });
  	}
    };
}(jQuery));
