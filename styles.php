<?php


//Dynamic styles
function roda_custom_styles($custom) {


	//__WIDTHS
	//Single post width
	$single_width = get_theme_mod( 'single_width' );
	if ( get_theme_mod( 'single_width' )) {
		$custom .= ".single .site-content { max-width:" . intval($single_width) . "px; }"."\n";
	}	
	//Page post width
	$page_width = get_theme_mod( 'page_width' );
	if ( get_theme_mod( 'page_width' )) {
		$custom .= ".page .site-content { max-width:" . intval($page_width) . "px; }"."\n";
	}
	//Index post width
	$index_width = get_theme_mod( 'index_width' );
	if ( get_theme_mod( 'index_width' )) {
		$custom .= ".blog .site-content, .page-header, .archive .site-content { max-width:" . intval($index_width) . "px; }"."\n";
	}

	//__COLORS
	//Primary color
	$primary_color = get_theme_mod( 'primary_color' );
	if ( isset($primary_color) && ( $primary_color != '#556270' ) ) {
		$custom = ".comment-form-author:before, .comment-form-email:before, .comment-form-url:before, .comment-form-comment:before, a.comment-reply-link, button, input[type=\"button\"], input[type=\"reset\"], input[type=\"submit\"], .entry-title a:hover { color:" . esc_html($primary_color) . "}"."\n";
		$custom .= ".meta-icon, .site-header, button:hover, input[type=\"button\"]:hover, input[type=\"reset\"]:hover, input[type=\"submit\"]:hover, .paging-navigation { background-color:" . esc_html($primary_color) . "}"."\n";
		$custom .= ".comment-reply-link, .comment-body, button, input[type=\"button\"], input[type=\"reset\"], input[type=\"submit\"], input[type=\"text\"], input[type=\"email\"], input[type=\"url\"], input[type=\"password\"], input[type=\"search\"], textarea { border-color:" . esc_html($primary_color) . "}"."\n";
		$custom .= ".post-separator path, .svg-separator path { stroke:" . esc_html($primary_color) . "}"."\n";
		$custom .= ".svg-header path, .svg-header rect { fill:" . esc_html($primary_color) . "}"."\n";
	}	
	//Site title
	$site_title = esc_html(get_theme_mod( 'site_title_color' ));
	if ( isset($site_title) && ( $site_title != '#ffffff' )) {
		$custom .= ".site-title a { color:" . esc_html($site_title) . "}"."\n";
	}
	//Site description
	$site_desc = esc_html(get_theme_mod( 'site_desc_color' ));
	if ( isset($site_desc) && ( $site_desc != '#ffcc99' )) {
		$custom .= ".site-description { color:" . esc_html($site_desc) . "}"."\n";
	}	
	//Body text
	$body_text = get_theme_mod( 'body_text_color' );
	if ( isset($body_text) && ( $body_text != '#272F36' )) {
		$custom .= "body { color:" . esc_html($body_text) . "}"."\n";
	}
	//About
	$about_color = get_theme_mod( 'about_color' );
	if ( isset($about_color) && ( $about_color != '#ffcc99' )) {
		$custom .= ".about-me, .home .svg-header, .blog .svg-header { background-color:" . esc_html($about_color) . "}"."\n";
		$custom .= ".svg-about path, .svg-about rect { fill:" . esc_html($about_color) . "}"."\n";
	}
	//Blend About me section with the header
	if ( is_home() && get_theme_mod( 'blog_display' ) !=1 ) {
		$custom = ".home .svg-header, .blog .svg-header { background-color: transparent; }"."\n";
	}	
    //Footer
    $footer_color = get_theme_mod( 'footer_color' );
    if ( isset($footer_color) && ( $footer_color != '#1a2227' )) {
        $custom .= ".site-footer { background-color:" . esc_html($footer_color) . "}"."\n";
        $custom .= ".footer-separator path, .footer-separator rect { fill:" . esc_html($footer_color) . "}"."\n";
    }

	//Fonts
	$fonts = get_theme_mod('roda_fonts');	
	
	if ( $fonts ) {
		$font_pieces = explode(":", $fonts);
		$custom .= "body { font-family:" . esc_html($font_pieces[0]) . "}"."\n";
	}


	//Output all the styles
	wp_add_inline_style( 'roda-style', $custom );	
}
add_action( 'wp_enqueue_scripts', 'roda_custom_styles' );