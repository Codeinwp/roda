<?php
/**
 * Slider template
 *
 * @package Roda
 */

//Load the script for the slider
function roda_slider_scripts() {
	if ( get_theme_mod('slider_display') ) {
			
		wp_enqueue_script( 'roda-superslides', get_template_directory_uri() . '/js/jquery.superslides.min.js', array(), true );

		wp_enqueue_script( 'roda-slides-init', get_template_directory_uri() . '/js/slides-init.js', array('jquery'), true );
					
	}		
}
add_action( 'wp_enqueue_scripts', 'roda_slider_scripts' );

//Slider template
function roda_slider_template() { ?>
	<div class="overlay"></div>
	<div id="slides" class="full-slider">
		<div class="slider-close"><i class="fa fa-close"></i></div>
	    <div class="slides-container">
		    <?php 
			    if ( get_theme_mod('slider_image_1') ) {
					echo '<img src="' . esc_url(get_theme_mod('slider_image_1')) . '">';
				}
			    if ( get_theme_mod('slider_image_2') ) {
					echo '<img src="' . esc_url(get_theme_mod('slider_image_2')) . '">';
				}			
			    if ( get_theme_mod('slider_image_3') ) {
					echo '<img src="' . esc_url(get_theme_mod('slider_image_3')) . '">';
				}
			    if ( get_theme_mod('slider_image_4') ) {
					echo '<img src="' . esc_url(get_theme_mod('slider_image_4')) . '">';
				}
			    if ( get_theme_mod('slider_image_5') ) {
					echo '<img src="' . esc_url(get_theme_mod('slider_image_5')) . '">';
				}				
			?>	
	    </div>
		<nav class="slides-navigation">
			<a href="#" class="prev"><i class="fa fa-angle-left"></i></a>
			<a href="#" class="next"><i class="fa fa-angle-right"></i></a>
		</nav>	    
	</div>
	<?php	
}