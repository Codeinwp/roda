<?php
/**
 * Roda functions and definitions
 *
 * @package Roda
 */


if ( ! function_exists( 'roda_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function roda_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Roda, use a find and replace
	 * to change 'roda' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'roda', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Set the content width based on the theme's design and stylesheet.
	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 640;
	}

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size('roda-thumb', 720, 500);

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'roda' ),
		'social' => __( 'Social', 'roda' ),		
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'roda_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // roda_setup
add_action( 'after_setup_theme', 'roda_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function roda_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'roda' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'roda_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function roda_scripts() {

	wp_enqueue_style( 'roda-bootstrap', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css', array(), true );

	wp_enqueue_style( 'roda-style', get_stylesheet_uri() );

	$fonts = get_theme_mod('roda_fonts');
	if( $fonts ) {
		wp_enqueue_style( 'roda-fonts', '//fonts.googleapis.com/css?family='. esc_attr($fonts) );	
	} else {
		wp_enqueue_style( 'roda-fonts', '//fonts.googleapis.com/css?family=Fira+Sans:400,700,400italic,700italic');
	}

	wp_enqueue_style( 'roda-font-awesome', get_template_directory_uri() . '/fonts/font-awesome.min.css' );

	wp_enqueue_script( 'roda-bootstrap-js', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js', array('jquery'), true );

	wp_enqueue_script( 'roda-fitvids', get_template_directory_uri() . '/js/jquery.fitvids.js', array('jquery'), true );	

	wp_enqueue_script( 'roda-slicknav', get_template_directory_uri() . '/js/jquery.slicknav.min.js', array(), true );	

	wp_enqueue_script( 'roda-scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), true );

	wp_enqueue_script( 'roda-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'roda_scripts' );

/**
 * Change the excerpt length
 */
function roda_excerpt_length( $length ) {
	
	$excerpt = get_theme_mod('exc_lenght', '55');
	return $excerpt;

}
add_filter( 'excerpt_length', 'roda_excerpt_length', 999 );

/**
 * Load html5shiv
 */
function roda_html5shiv() {
    echo '<!--[if lt IE 9]>' . "\n";
    echo '<script src="' . esc_url( get_template_directory_uri() . '/js/html5shiv.js' ) . '"></script>' . "\n";
    echo '<![endif]-->' . "\n";
}
add_action( 'wp_head', 'roda_html5shiv' ); 

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Dynamic styles
 */
require get_template_directory() . '/styles.php';

/**
 * SVGs
 */
require get_template_directory() . '/inc/svg.php';


/**
 * Slider
 */
require get_template_directory() . '/inc/slider.php';