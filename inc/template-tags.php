<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Roda
 */

if ( ! function_exists( 'roda_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 */
function roda_paging_nav() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	?>
	<div class="nav-separator">  
		<?php echo roda_footer_svg(); ?>
	</div>	
	<nav class="navigation paging-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'roda' ); ?></h1>
		<div class="nav-links container">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link('<i class="fa fa-long-arrow-left"></i>'); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link('<i class="fa fa-long-arrow-right"></i>'); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->	
	<?php
}
endif;

if ( ! function_exists( 'roda_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 */
function roda_post_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<div class="svg-separator">  
		<?php echo roda_post_svg(); ?>
	</div>		
	<nav class="navigation post-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'roda' ); ?></h1>
		<div class="nav-links">
			<?php
				previous_post_link( '<div class="nav-previous">%link</div>', _x( '<i class="fa fa-long-arrow-left"></i>&nbsp;%title', 'Previous post link', 'roda' ) );
				next_post_link(     '<div class="nav-next">%link</div>',     _x( '%title&nbsp;<i class="fa fa-long-arrow-right"></i>', 'Next post link',     'roda' ) );
			?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<div class="svg-separator">  
		<?php echo roda_post_svg(); ?>
	</div>	
	<?php
}
endif;

if ( ! function_exists( 'roda_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function roda_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		_x( 'Posted on %s', 'post date', 'roda' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		_x( 'by %s', 'post author', 'roda' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>';

}
endif;

if ( ! function_exists( 'roda_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function roda_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' == get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( __( ', ', 'roda' ) );
		if ( $categories_list && roda_categorized_blog() ) {
			printf( '<span class="cat-links">' . __( 'Posted in %1$s', 'roda' ) . '</span>', $categories_list );
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', __( ', ', 'roda' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . __( 'Tagged %1$s', 'roda' ) . '</span>', $tags_list );
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( __( 'Leave a comment', 'roda' ), __( '1 Comment', 'roda' ), __( '% Comments', 'roda' ) );
		echo '</span>';
	}

	edit_post_link( __( 'Edit', 'roda' ), '<span class="edit-link">', '</span>' );
}
endif;

/**
 * Tags function for bootstrap popovers
 */
if ( ! function_exists( 'roda_entry_tags' ) ) :
function roda_entry_tags() {
	if ( 'post' == get_post_type() ) {
		$tags_list = get_the_tag_list( '', __( ', ', 'roda' ) );
		if ( $tags_list ) {
			echo '<div class="meta-icon">';
				echo '<span class="popover-button" data-container="body" data-toggle="popover" data-placement="bottom" data-content=\'';
				printf( '<span class="tags-links">' . __( 'Tagged %1$s', 'roda' ) . '</span>', $tags_list );
				echo '\'><i class="fa fa-tag"></i></span>';
		  	echo '</div>';					
		}
	}
}
endif;

/**
 * Categories function for bootstrap popovers
 */
if ( ! function_exists( 'roda_entry_comms' ) ) :
function roda_entry_comms() {
	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<div class="meta-icon">';
			echo '<span class="popover-button" data-container="body" data-toggle="popover" data-placement="bottom" data-content=\'';
			echo '<span class="comments-link">';
			comments_popup_link( __( 'Leave a comment', 'roda' ), __( '1 Comment', 'roda' ), __( '% Comments', 'roda' ) );
			echo '</span>';
			echo '\'><i class="fa fa-comment"></i></span>';	
		echo '</div>';		
	}
}
endif;

/**
 * Comments function for bootstrap popovers
 */
if ( ! function_exists( 'roda_entry_cats' ) ) :
function roda_entry_cats() {
	if ( 'post' == get_post_type() ) {
		$categories_list = get_the_category_list( __( ', ', 'roda' ) );
		if ( $categories_list && roda_categorized_blog() ) {
			echo '<div class="meta-icon">';
				echo '<span class="popover-button" data-container="body" data-toggle="popover" data-placement="bottom" data-content=\'';
				printf( '<span class="cat-links">' . __( 'Published in %1$s', 'roda' ) . '</span>', $categories_list );
				echo '\'><i class="fa fa-folder"></i></span>';
		  	echo '</div>';
		}
	}
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function roda_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'roda_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'roda_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so roda_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so roda_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in roda_categorized_blog.
 */
function roda_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'roda_categories' );
}
add_action( 'edit_category', 'roda_category_transient_flusher' );
add_action( 'save_post',     'roda_category_transient_flusher' );
