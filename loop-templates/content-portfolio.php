<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<div class="col-md-6 mb-2 mb-md-4 portfolio-item-container">
  <article <?php post_class('position-relative'); ?> id="post-<?php the_ID(); ?>">
    <a href="<?php echo esc_url( get_permalink() ); ?>">
      	<header class="entry-header">
          <figure>
        	 <?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>
          </figure>
          <h2 class="entry-title position-absolute">
            <a class="secondary-header" href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title() ?></a>
          </h2>
        </header><!-- .entry-header -->
    </a>
  </article><!-- #post-## -->
</div>
