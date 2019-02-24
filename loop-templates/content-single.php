<?php
/**
 * Single post partial template.
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
$genre = get_field('genre');
$images = [];
for($i=1; $i<6; $i++) {
$image = 'image' . $i;
array_push($images,  get_field($image));
}
$images = array_filter($images);
?>


<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">
    <div class="col-12">
      	<!-- <?php the_title( '<h1 class="entry-title mb-3">', '</h1>' ); ?> -->
        <p class="contact-header mb-2"><?php echo $genre ?></p>
        <h1 class="entry-title mb-3 contact-welcome"><?php the_title();?></h1>
    </div>
	</header><!-- .entry-header -->

	<div class="entry-content">
    <div class="container">
      <div class="row mb-3 mb-md-5">

        <div class="portfolio-images col-md-8 d-flex mb-3 mb-md-5" >
          <div class="portfolio-slick w-100 position-relative">
            <?php

          for($j=0; $j<count($images); $j++) { ?>
            <div><img src="<?php echo $images[$j]['url']; ?>" alt="..."></div>
            <?php } ?>
          </div>
        </div>

        <div class="col-md-4" >
        <?php if(get_field('description')) { ?>
        <div class="portfolio-description col-md-12" >
        <h2 class="mb-3 mb-md-4 secondary-header ">Project Description</h2>
    		<?php the_field('description'); ?>
        </div>
          <?php } ?>

        <div class="portfolio-meta col-md-12" >
        <h2 class="mb-3 mb-md-4 secondary-header ">Project Details</h2>
          <?php if(get_field('role')) { ?>
          <p class="d-flex"><span class="w-50 detail-header">Role</span> <span class="w-50 color-highlight "><?php the_field('role') ?></span></p>
          <?php } ?>

          <?php if(get_field('year')) { ?>
          <p class="d-flex"><span class="w-50 detail-header">Year</span> <span class="w-50  color-highlight"><?php the_field('year') ?></span></p>
          <?php } ?>

          <?php if(get_field('director')) { ?>
          <p class="d-flex"><span class="w-50 detail-header">Director</span> <span class="w-50  color-highlight"><?php the_field('director') ?></span></p>
          <?php } ?>

          <?php if(get_field('company')) { ?>
          <p class="d-flex"><span class="w-50 detail-header">Production</span> <span class="w-50  color-highlight"><?php the_field('company') ?></span></p>
          <?php } ?>
        </div>
        </div>
      </div>


        <?php if(get_field('video')) { ?>
          <div class="row mb-3 mb-md-5">
            <div class="portfolio-meta col-12" >
              <div class="fluid-width-video-wrapper" >
                <?php the_field('video') ?>
              </div>
            </div>
          </div>
        <?php } ?>

    </div>
  </div>


	</div><!-- .entry-content -->

</article><!-- #post-## -->
