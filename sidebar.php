<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Roda
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<div id="secondary" class="widget-area" role="complementary">
	<div class="sidebar-toggle-inside">
		<i class="fa fa-close"></i>
	</div>
	<div class="toggles">
		<div class="sidebar-toggle" data-toggle="tooltip" data-placement="left" title="<?php echo __('Toggle the sidebar', 'roda'); ?>">
			<i class="fa fa-angle-double-left"></i>
		</div>
		<?php if ( has_nav_menu( 'social' ) ) : ?>
			<div class="social-toggle" data-toggle="tooltip" data-placement="left" title="<?php echo __('See my social profile', 'roda'); ?>">
				<i class="fa fa-facebook"></i>
			</div>
		<?php endif; ?>
		<?php if (get_theme_mod('slider_display')) : ?>
			<div class="slider-toggle" data-toggle="tooltip" data-placement="left" title="<?php echo __('See my latest photos', 'roda'); ?>">
				<i class="fa fa-file-image-o"></i>
			</div>	
		<?php endif; ?>
	</div>		
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div><!-- #secondary -->
