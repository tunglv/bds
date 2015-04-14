/*
 * Yii EAuth extension.
 * @author Maxim Zemskov
 * @link http://code.google.com/p/yii-eauth/
 * @license http://www.opensource.org/licenses/bsd-license.php
 */
jQuery(function($) {
    var popup;

	$.fn.eauth = function() {

        var width = 880, height = 520;
        
		return this.each(function() {
		    var el = $(this);
		    el.click(function() {

	            if (popup !== undefined)
	                popup.close();

	            var redirect_uri, url = redirect_uri = this.href;
				url += (url.indexOf('?') >= 0 ? '&' : '?') + 'redirect_uri=' + encodeURIComponent(redirect_uri);
				url += '&js';
				
	            /*var remember = $(this).parents('.auth-services').parent().find('.auth-services-rememberme');
	            if (remember.size() > 0 && remember.find('input').is(':checked')) 
					url += (url.indexOf('?') >= 0 ? '&' : '?') + 'remember';*/

	            var centerWidth = ($(window).width() - width) / 2;
	            var centerHeight = ($(window).height() - height) / 2;
				
	            popup = window.open(url, "openid_popup_window", "width=" + width + ",height=" + height + ",left=" + centerWidth + ",top=" + centerHeight + ",resizable=yes,scrollbars=no,toolbar=no,menubar=no,location=no,directories=no,status=yes");
	            popup.focus();
	            
	            return false;
	        });
		});
	};
    
    $("a.openid_popup").eauth();
});
