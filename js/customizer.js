/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );
	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					'clip': 'auto',
					'color': to,
					'position': 'relative'
				} );
			}
		} );
	} );
	//Single post width
	wp.customize('single_width',function( value ) {
		value.bind( function( newval ) {
			$('.single .hentry').css('max-width', newval + 'px' );
		} );
	});
	//Single page width
	wp.customize('page_width',function( value ) {
		value.bind( function( newval ) {
			$('.page .site-content').css('max-width', newval + 'px' );
		} );
	});	
	//Index width
	wp.customize('index_width',function( value ) {
		value.bind( function( newval ) {
			$('.blog .hentry, .page-header, .archive .hentry').css('max-width', newval + 'px' );
		} );
	});

	// Primary color
	wp.customize('primary_color',function( value ) {
		value.bind( function( newval ) {
			$('.comment-form-author:before, .comment-form-email:before, .comment-form-url:before, .comment-form-comment:before, a.comment-reply-link, button, input[type="button"], input[type="reset"], input[type="submit"], .entry-title a:hover').css('color', newval );
			$('.comment-reply-link, .comment-body, button, input[type="button"], input[type="reset"], input[type="submit"], input[type="text"], input[type="email"], input[type="url"], input[type="password"], input[type="search"], textarea').css('border-color', newval );
			$('.meta-icon, .site-header, button:hover, input[type="button"]:hover, input[type="reset"]:hover, input[type="submit"]:hover, .paging-navigation').css('background-color', newval );
			$('.post-separator path, .svg-separator path').css('stroke', newval );
			$('.svg-header path, .svg-header rect').css('fill', newval );
		} );
	});
	// About me
	wp.customize('about_color',function( value ) {
		value.bind( function( newval ) {
			$('.about-me, .home .svg-header, .blog .svg-header').css('background-color', newval );
			$('.svg-about path, .svg-about rect').css('fill', newval );
		} );
	});	
	// Site title
	wp.customize('site_title_color',function( value ) {
		value.bind( function( newval ) {
			$('.site-title a').css('color', newval );
		} );
	});
	// Site description
	wp.customize('site_desc_color',function( value ) {
		value.bind( function( newval ) {
			$('.site-description').css('color', newval );
		} );
	});
	// Body text color
	wp.customize('body_text_color',function( value ) {
		value.bind( function( newval ) {
			$('body').css('color', newval );
		} );
	});
	//Footer color
	wp.customize('footer_color',function( value ) {
		value.bind( function( newval ) {
			$('.site-footer').css('background-color', newval );
			$('.footer-separator path, .footer-separator rect').css('fill', newval );
		} );
	});	

} )( jQuery );
