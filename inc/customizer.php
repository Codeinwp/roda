<?php
/**
 * Roda Theme Customizer
 *
 * @package Roda
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function roda_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

    //___General___//
    $wp_customize->add_section(
        'roda_general',
        array(
            'title' => __('General', 'roda'),
            'priority' => 9,
        )
    );
    //Logo Upload
    $wp_customize->add_setting(
        'site_logo',
        array(
            'default-image' => '',
            'sanitize_callback' => 'esc_url_raw',

        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'site_logo',
            array(
               'label'          => __( 'Upload your logo', 'roda' ),
               'type'           => 'image',
               'section'        => 'roda_general',
               'settings'       => 'site_logo',
               'priority' => 9,
            )
        )
    );
    //Favicon Upload
    $wp_customize->add_setting(
        'site_favicon',
        array(
            'default-image' => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'site_favicon',
            array(
               'label'          => __( 'Upload your favicon', 'roda' ),
               'type'           => 'image',
               'section'        => 'roda_general',
               'settings'       => 'site_favicon',
               'priority' => 10,
            )
        )
    );
  	//***ABOUT ME SECTION***//
    $wp_customize->add_section(
        'roda_about',
        array(
            'title' => __('About me section', 'roda'),
            'priority' => 11,
        )
    );
    //Blog page display
    $wp_customize->add_setting(
        'blog_display',
        array(
            'sanitize_callback' => 'roda_sanitize_checkbox',
        )       
    );
    $wp_customize->add_control(
        'blog_display',
        array(
            'type' 		=> 'checkbox',
            'label' 	=> __('Display the About me section on the blog page?', 'roda'),
            'section' 	=> 'roda_about',
            'priority'  => 8,
        )
    );        
  	//Photo
  	$wp_customize->add_setting(
  		'about_photo',
  		array(
  			'default-image' => '',
            'sanitize_callback' => 'esc_url_raw',
  		)
  	);
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'about_photo',
            array(
               'label'          => __( 'Upload your photo', 'roda' ),
			   'type' 			=> 'image',
               'section'        => 'roda_about',
               'settings'       => 'about_photo',
               'priority' => 9,
            )
        )
    );
     //About title
  	$wp_customize->add_setting(
  	    'about_title',
  	    array(
  	        'default' => '',
  	        'sanitize_callback' => 'roda_sanitize_text',
  	    )
  	);
  	$wp_customize->add_control(
  	    'about_title',
  	    array(
  	        'label' => __( 'Title for the about me section', 'roda' ),
  	        'section' => 'roda_about',
  	        'type' => 'text',
  	        'priority' => 10
  	    )
  	);
    //Textarea
    $wp_customize->add_setting(
        'about_text',
        array(
            'default' => '',
            'sanitize_callback' => 'roda_sanitize_text',
        )
    );
    $wp_customize->add_control(
        'about_text',
        array(
            'label' => __( 'Add some info about yourself', 'roda' ),
            'section' => 'roda_about',
            'type' => 'textarea',
            'priority' => 11
        )
    );

    //***DECORATIONS***//
    $wp_customize->add_section(
        'roda_decorations',
        array(
            'title' => __('Decorations', 'roda'),
            'priority' => 12,
        )
    );
    $wp_customize->add_setting(
        'svg_type',
        array(
            'default' => 'straight',
            'sanitize_callback' => 'roda_sanitize_radio',
        )
    );
     
    $wp_customize->add_control(
        'svg_type',
        array(
            'type' => 'radio',
            'label' => __( 'Decorations type', 'roda' ),
            'section' => 'roda_decorations',
            'choices' => array(
                'straight' => __( 'Straight', 'roda' ),
                'rounded' => __( 'Rounded', 'roda' ),
            ),
        )
    );
    //___Slider___//
    $wp_customize->add_section(
        'roda_slider',
        array(
            'title' => __('Slider', 'roda'),
            'priority' => 10,
        )
    );
    //Display
    $wp_customize->add_setting(
        'slider_display',
        array(
            'sanitize_callback' => 'roda_sanitize_checkbox',
        )       
    );
    $wp_customize->add_control(
        'slider_display',
        array(
            'type' => 'checkbox',
            'label' => __('Check this box to display the slider.', 'roda'),
            'section' => 'roda_slider',
            'priority'       => 10,
        )
    );
    //Image 1
    $wp_customize->add_setting(
        'slider_image_1',
        array(
            'default-image' => '',
            'sanitize_callback' => 'esc_url_raw'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'slider_image_1',
            array(
               'label'          => __( 'Upload your first image for the slider', 'roda' ),
               'type'           => 'image',
               'section'        => 'roda_slider',
               'settings'       => 'slider_image_1',
               'priority'       => 11,
            )
        )
    );
    //Image 2
    $wp_customize->add_setting(
        'slider_image_2',
        array(
            'default-image' => '',
            'sanitize_callback' => 'esc_url_raw'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'slider_image_2',
            array(
               'label'          => __( 'Upload your second image for the slider', 'roda' ),
               'type'           => 'image',
               'section'        => 'roda_slider',
               'settings'       => 'slider_image_2',
               'priority'       => 12,
            )
        )
    );
    //Image 3
    $wp_customize->add_setting(
        'slider_image_3',
        array(
            'default-image' => '',
            'sanitize_callback' => 'esc_url_raw'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'slider_image_3',
            array(
               'label'          => __( 'Upload your third image for the slider', 'roda' ),
               'type'           => 'image',
               'section'        => 'roda_slider',
               'settings'       => 'slider_image_3',
               'priority'       => 13,
            )
        )
    );        
    //Image 4
    $wp_customize->add_setting(
        'slider_image_4',
        array(
            'default-image' => '',
            'sanitize_callback' => 'esc_url_raw'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'slider_image_4',
            array(
               'label'          => __( 'Upload your fourth image for the slider', 'roda' ),
               'type'           => 'image',
               'section'        => 'roda_slider',
               'settings'       => 'slider_image_4',
               'priority'       => 14,
            )
        )
    );
    //Image 5
    $wp_customize->add_setting(
        'slider_image_5',
        array(
            'default-image' => '',
            'sanitize_callback' => 'esc_url_raw'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'slider_image_5',
            array(
               'label'          => __( 'Upload your fifth image for the slider', 'roda' ),
               'type'           => 'image',
               'section'        => 'roda_slider',
               'settings'       => 'slider_image_5',
               'priority'       => 15,
            )
        )
    );

    //___Blog layout___//
    $wp_customize->add_section(
        'blog_options',
        array(
            'title' => __('Blog options', 'roda'),
            'priority' => 15,
        )
    );
    //Excerpt
    $wp_customize->add_setting(
        'exc_lenght',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '55',
        )       
    );
    $wp_customize->add_control( 'exc_lenght', array(
        'type'        => 'number',
        'priority'    => 10,
        'section'     => 'blog_options',
        'label'       => __('Excerpt lenght', 'roda'),
        'description' => __('Choose your excerpt length here. Default: 55 words', 'roda'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 200,
            'step'  => 5,
            'style' => 'padding: 15px;',
        ),
    ) );

    //Single width
    $wp_customize->add_setting(
        'single_width',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '1170',
            'transport'         => 'postMessage'            
        )       
    );
    $wp_customize->add_control( 'single_width', array(
        'type'        => 'number',
        'priority'    => 11,
        'section'     => 'blog_options',
        'label'       => __('Single post width', 'roda'),
        'description' => __('Set a max. width for your single posts.', 'roda'),
        'input_attrs' => array(
            'min'   => 700,
            'max'   => 1170,
            'step'  => 5,
            'style' => 'padding: 15px;',
        ),
    ) );
    //Page width
    $wp_customize->add_setting(
        'page_width',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '1170',
            'transport'         => 'postMessage'            
        )       
    );
    $wp_customize->add_control( 'page_width', array(
        'type'        => 'number',
        'priority'    => 12,
        'section'     => 'blog_options',
        'label'       => __('Single page width', 'roda'),
        'description' => __('Set a max. width for your pages.', 'roda'),
        'input_attrs' => array(
            'min'   => 700,
            'max'   => 1170,
            'step'  => 5,
            'style' => 'padding: 15px;',
        ),
    ) );
    //Index, archives width
    $wp_customize->add_setting(
        'index_width',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '1170',
            'transport'         => 'postMessage'            
        )       
    );
    $wp_customize->add_control( 'index_width', array(
        'type'        => 'number',
        'priority'    => 13,
        'section'     => 'blog_options',
        'label'       => __('Index, categories, tags post width', 'roda'),
        'description' => __('Set a max. width for your index, categories, tags etc. post width.', 'roda'),
        'input_attrs' => array(
            'min'   => 700,
            'max'   => 1170,
            'step'  => 5,
            'style' => 'padding: 15px;',
        ),
    ) );
    //___Colors___//
    //Primary color
    $wp_customize->add_setting(
        'primary_color',
        array(
            'default'           => '#556270',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'primary_color',
            array(
                'label' => __('Primary color', 'roda'),
                'section' => 'colors',
                'settings' => 'primary_color',
                'priority' => 12
            )
        )
    );
    //About me
    $wp_customize->add_setting(
        'about_color',
        array(
            'default'           => '#FFCC99',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'about_color',
            array(
                'label' => __('About me section', 'roda'),
                'section' => 'colors',
                'settings' => 'about_color',
                'priority' => 13
            )
        )
    );         
    //Site title
    $wp_customize->add_setting(
        'site_title_color',
        array(
            'default'           => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'site_title_color',
            array(
                'label' => __('Site title', 'roda'),
                'section' => 'colors',
                'settings' => 'site_title_color',
                'priority' => 14
            )
        )
    );
    //Site description
    $wp_customize->add_setting(
        'site_desc_color',
        array(
            'default'           => '#ffcc99',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'site_desc_color',
            array(
                'label' => __('Site description', 'roda'),
                'section' => 'colors',
                'settings' => 'site_desc_color',
                'priority' => 15
            )
        )
    );
    //Body
    $wp_customize->add_setting(
        'body_text_color',
        array(
            'default'           => '#272F36',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'body_text_color',
            array(
                'label' => __('Body text', 'roda'),
                'section' => 'colors',
                'settings' => 'body_text_color',
                'priority' => 16
            )
        )
    );
    //Body
    $wp_customize->add_setting(
        'body_text_color',
        array(
            'default'           => '#272F36',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'body_text_color',
            array(
                'label' => __('Body text', 'roda'),
                'section' => 'colors',
                'settings' => 'body_text_color',
                'priority' => 16
            )
        )
    );    
    //Footer
    $wp_customize->add_setting(
        'footer_color',
        array(
            'default'           => '#1a2227',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'footer_color',
            array(
                'label' => __('Footer', 'roda'),
                'section' => 'colors',
                'settings' => 'footer_color',
                'priority' => 17
            )
        )
    ); 
    //___Fonts___//
    $wp_customize->add_section(
        'roda_typography',
        array(
            'title' => __('Fonts', 'roda' ),
            'priority' => 15,
        )
    );
    $font_choices = 
        array(
            'Fira Sans:400,700,400italic,700italic' => 'Fira Sans',  
            'Source Sans Pro:400,700,400italic,700italic' => 'Source Sans Pro',     
            'Droid Sans:400,700' => 'Droid Sans',
            'Lato:400,700,400italic,700italic' => 'Lato',
            'Arvo:400,700,400italic,700italic' => 'Arvo',
            'Lora:400,700,400italic,700italic' => 'Lora',
            'PT Sans:400,700,400italic,700italic' => 'PT Sans',
            'PT+Sans+Narrow:400,700' => 'PT Sans Narrow',
            'Arimo:400,700,400italic,700italic' => 'Arimo',
            'Ubuntu:400,700,400italic,700italic' => 'Ubuntu',
            'Bitter:400,700,400italic' => 'Bitter',
            'Droid Serif:400,700,400italic,700italic' => 'Droid Serif',
            'Open+Sans:400italic,700italic,400,700' => 'Open Sans',
            'Roboto:400,400italic,700,700italic' => 'Roboto',
            'Oswald:400,700' => 'Oswald',
            'Open Sans Condensed:700,300italic,300' => 'Open Sans Condensed',
            'Roboto Condensed:400italic,700italic,400,700' => 'Roboto Condensed',
            'Raleway:400,700' => 'Raleway',
            'Roboto Slab:400,700' => 'Roboto Slab',
            'Yanone Kaffeesatz:400,700' => 'Yanone Kaffeesatz',
            'Rokkitt:400' => 'Rokkitt',
        );
    
    $wp_customize->add_setting(
        'roda_fonts',
        array(
            'sanitize_callback' => 'roda_sanitize_fonts',
        )
    );
    
    $wp_customize->add_control(
        'roda_fonts',
        array(
            'type' => 'select',
            'label' => __('Fonts (default: Fira Sans)', 'roda'),
            'section' => 'roda_typography',
            'choices' => $font_choices
        )
    );

}
add_action( 'customize_register', 'roda_customize_register' );

/**
 * Sanitize options
 */
//Text
function roda_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}
//Checkboxes
function roda_sanitize_checkbox( $input ) {
	if ( $input == 1 ) {
		return 1;
	} else {
		return '';
	}
}
//Radio
function roda_sanitize_radio( $input ) {
    $valid = array(
        'straight' => __( 'Straight', 'roda' ),
        'rounded' => __( 'Rounded', 'roda' ),
    );
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}
//Fonts
function roda_sanitize_fonts( $input ) {
    $valid = array(
            'Fira Sans:400,700,400italic,700italic' => 'Fira Sans',  
            'Source Sans Pro:400,700,400italic,700italic' => 'Source Sans Pro',     
            'Droid Sans:400,700' => 'Droid Sans',
            'Lato:400,700,400italic,700italic' => 'Lato',
            'Arvo:400,700,400italic,700italic' => 'Arvo',
            'Lora:400,700,400italic,700italic' => 'Lora',
            'PT Sans:400,700,400italic,700italic' => 'PT Sans',
            'PT+Sans+Narrow:400,700' => 'PT Sans Narrow',
            'Arimo:400,700,400italic,700italic' => 'Arimo',
            'Ubuntu:400,700,400italic,700italic' => 'Ubuntu',
            'Bitter:400,700,400italic' => 'Bitter',
            'Droid Serif:400,700,400italic,700italic' => 'Droid Serif',
            'Open+Sans:400italic,700italic,400,700' => 'Open Sans',
            'Roboto:400,400italic,700,700italic' => 'Roboto',
            'Oswald:400,700' => 'Oswald',
            'Open Sans Condensed:700,300italic,300' => 'Open Sans Condensed',
            'Roboto Condensed:400italic,700italic,400,700' => 'Roboto Condensed',
            'Raleway:400,700' => 'Raleway',
            'Roboto Slab:400,700' => 'Roboto Slab',
            'Yanone Kaffeesatz:400,700' => 'Yanone Kaffeesatz',
            'Rokkitt:400' => 'Rokkitt',
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function roda_customize_preview_js() {
	wp_enqueue_script( 'roda_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'roda_customize_preview_js' );
