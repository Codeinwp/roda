<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Roda
 */
?>

	</div><!-- #content -->
	<div class="footer-separator">  
		<?php echo roda_footer_svg(); ?>
	</div>
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info container">
			<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'roda' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'roda' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( __( 'Theme: %1$s by %2$s.', 'roda' ), 'Roda', '<a href="http://flyfreemedia.com/themes/roda" rel="designer">Fly Free Media</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
