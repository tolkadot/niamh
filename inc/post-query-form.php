<?php

//Get results for the Ajax posts query
add_action('wp_ajax_fetch_posts', 'fetch_posts');
add_action('wp_ajax_nopriv_fetch_posts', 'fetch_posts');

function fetch_posts() {
        $query_args = array(
                'post_type' => 'post',
                'cat' => $_POST['cat'],
            );
        $wp_query = new WP_Query( $query_args );

        if ( $wp_query->have_posts() ) :
             while ( $wp_query->have_posts() ) : $wp_query->the_post();
                 get_template_part( 'loop-templates/content', 'portfolio' );
            endwhile;
            wp_reset_postdata();
            else :
                get_template_part( 'loop-templates/content', 'none' );
        endif;

    die;
}
