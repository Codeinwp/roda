<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Roda
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php if ( get_theme_mod('site_favicon') ) : ?>
  <link rel="shortcut icon" href="<?php echo esc_url(get_theme_mod('site_favicon')); ?>" />
<?php endif; ?>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'roda' ); ?></a>

  <?php if (get_theme_mod('slider_display')) : ?>
    <?php echo roda_slider_template(); ?>
  <?php endif; ?>

  <div class="mobile-toggles">
    <div class="sidebar-toggle" data-toggle="tooltip" data-placement="bottom" title="<?php echo __('Toggle the sidebar', 'roda'); ?>">
      <i class="fa fa-angle-double-left"></i>
    </div>
    <?php if ( has_nav_menu( 'social' ) ) : ?>
      <div class="social-toggle" data-toggle="tooltip" data-placement="bottom" title="<?php echo __('See my social profile', 'roda'); ?>">
        <i class="fa fa-facebook"></i>
      </div>
    <?php endif; ?>
    <?php if (get_theme_mod('slider_display')) : ?>
      <div class="slider-toggle" data-toggle="tooltip" data-placement="bottom" title="<?php echo __('See my latest photos', 'roda'); ?>">
        <i class="fa fa-file-image-o"></i>
      </div>  
    <?php endif; ?>
  </div>

	<header id="masthead" class="site-header" role="banner">
		<div class="container">
			<div class="site-branding">
        <?php if ( get_theme_mod('site_logo') ) : ?>
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo('name'); ?>"><img class="site-logo" src="<?php echo esc_url(get_theme_mod('site_logo')); ?>" alt="<?php bloginfo('name'); ?>" /></a>
        <?php else : ?>
          <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
          <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
        <?php endif; ?>
			</div>
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			</nav>
      <nav class="mobile-nav"></nav>
		</div>
	</header><!-- #masthead -->

  <?php if ( has_nav_menu( 'social' ) ) : ?>
    <nav class="social-navigation clearfix">
      <h2 class="social-title"><?php echo __('My social profile', 'athemes'); ?></h2>
      <div class="social-close"><i class="fa fa-close"></i></div>
      <?php wp_nav_menu( array( 'theme_location' => 'social', 'link_before' => '<span class="screen-reader-text">', 'link_after' => '</span>', 'container_class' => 'container', 'menu_class' => 'menu clearfix', 'fallback_cb' => false ) ); ?>
    </nav>
  <?php endif; ?>   

  <div class="svg-header">	
    <?php echo roda_header_svg(); ?>
  </div>

  <?php if ( is_home() && get_theme_mod('blog_display') ) : ?>
    <section id="about" class="about-me">
      <div class="container">
        <?php if ( get_theme_mod('about_photo') ) : ?>
          <div class="about-photo">
            <?php echo '<img class="about-img" src="' . esc_url(get_theme_mod('about_photo')) . '">';  ?>
          </div>
        <?php endif; ?>      
        <?php if ( get_theme_mod('about_title') ) : ?>
          <h2 class="about-title">
            <?php echo html_entity_decode( esc_html( get_theme_mod('about_title') ) );  ?>
          </h2>
        <?php endif; ?>
        <?php if ( get_theme_mod('about_text') ) : ?>
          <div class="about-text">
            <?php echo html_entity_decode( esc_html( get_theme_mod('about_text') ) );  ?>
          </div>
        <?php endif; ?>
      </div>
    </section>
    <div class="svg-about">  
      <?php echo roda_header_svg(); ?>
    </div>
  <?php endif; ?>

	<div id="content" class="site-content container">
