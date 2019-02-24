<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>

<?php if ( is_front_page() && is_home() ) : ?>
	<?php get_template_part( 'global-templates/hero' ); ?>
<?php endif; ?>

<div class="wrapper" id="index-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<!-- Do the left sidebar check and opens the primary div -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main" id="main">
<div class="col-sm-12">
    <ul id="portfolio-filter" class="portfolio-filter d-flex flex-column flex-md-row  justify-content-around align-items-center mb-5">
      <?php if( $terms = get_terms( array(
          'taxonomy' => 'category', // to make it simple I use default categories
          'orderby' => 'name'
      ) ) ) :
        // if categories exist, display the dropdown
      foreach ( $terms as $term ) :
            echo '<li data-catid="'. $term->term_id .'" id="'. $term->term_id .'">' . $term->name . ' </li>';
      endforeach;
      endif; ?>
    </ul>
</div>

				<?php if ( have_posts() ) : ?>

<div class="portfolio-content">
  <div class="container">
    <div class="row" id="portfolio-content">

				 <?php while ( have_posts() ) : the_post(); ?>

						<?php
						get_template_part( 'loop-templates/content', 'portfolio' );
						?>

				<?php endwhile; ?>

    </div>
</div>

				<?php else : ?>

					<?php get_template_part( 'loop-templates/content', 'none' ); ?>

				<?php endif; ?>

			</main><!-- #main -->

			<!-- The pagination component -->
			<?php understrap_pagination(); ?>

			<!-- Do the right sidebar check -->
			<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #index-wrapper -->

<?php get_footer(); ?>
