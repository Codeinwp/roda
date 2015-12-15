<?php
/**
 * @package Roda
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <?php if ( has_post_thumbnail() ) : ?>
    <div class="entry-thumb col-md-6">
      <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" >
        <?php the_post_thumbnail('roda-thumb'); ?>
      </a>         
    </div>  
  <?php endif; ?>

<?php if ( has_post_thumbnail() ) : ?>
  <div class="post-content col-md-6">
<?php else : ?>
  <div class="post-content">
<?php endif; ?>   
  	<header class="entry-header">
  		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
      <?php if ( 'post' == get_post_type() ) : ?>
        <div class="entry-meta">
          <?php roda_posted_on(); ?>
        </div>
      <?php endif; ?>  
  	</header><!-- .entry-header -->

  	<div class="entry-summary">
  		<?php the_excerpt(); ?>
  	</div>

    <div class="meta-container">
      <?php roda_entry_cats(); ?>
      <?php roda_entry_tags(); ?>
      <?php roda_entry_comms(); ?>
    </div>
  </div>   

</article><!-- #post-## -->

<div class="post-separator">  
  <?php echo roda_post_svg(); ?>
</div>