/*
Upsells
*/

jQuery(document).ready(function() {

	/* Upsells in customizer (Documentation link and Upgrade to PRO link */


	if( !jQuery( ".roda-upsells" ).length ) {
		jQuery('#customize-theme-controls > ul').prepend('<li class="accordion-section roda-upsells" style="padding-bottom: 15px">');
		}

    if( jQuery( ".roda-upsells" ).length ) {

  		jQuery('.roda-upsells').append('<a style="width: 80%; margin: 5px auto 5px auto; display: block; text-align: center;" href="https://github.com/Codeinwp/roda" class="button" target="_blank">{github}</a>'.replace('{github}', rodaCustomizerObject.github));
  		jQuery('.roda-upsells').append('<a style="width: 80%; margin: 5px auto 5px auto; display: block; text-align: center;" href="https://wordpress.org/support/view/theme-reviews/roda#postform" class="button" target="_blank">{review}</a>'.replace('{review}', rodaCustomizerObject.review));

  	}

	if ( !jQuery( ".roda-upsells" ).length ) {
		jQuery('#customize-theme-controls > ul').prepend('</li>');
	}
});
