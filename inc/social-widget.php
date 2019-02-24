<?php
// Register and load the widget
function socials_load_widget() {
    register_widget( 'socials_widget' );
}
add_action( 'widgets_init', 'socials_load_widget' );

// Creating the widget
class socials_widget extends WP_Widget {

function __construct() {
parent::__construct(

// Base ID of your widget
'socials_widget',

// Widget name will appear in UI
__('Social Links', 'socials_widget_domain'),

// Widget description
array( 'description' => __( 'Add your socials', 'socials_widget_domain' ), )
);
}

// Widget Backend
public function form( $instance ) {
 isset($instance['title']) ? $title = $instance['title'] : null;


isset($instance['facebook']) ? $facebook = $instance['facebook'] : null;
isset($instance['twitter']) ? $twitter = $instance['twitter'] : null;
isset($instance['linkedin']) ? $linkedin = $instance['linkedin'] : null;
isset($instance['instagram']) ? $instagram = $instance['instagram'] : null;
isset($instance['imdb']) ? $imdb = $instance['imdb'] : null;

// Widget admin form
?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
<label for="<?php echo $this->get_field_id( 'facebook' ); ?>"><?php _e( 'facebook:' ); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id( 'facebook' ); ?>" name="<?php echo $this->get_field_name( 'facebook' ); ?>" type="text" value="<?php echo esc_attr( $facebook ); ?>" />
<label for="<?php echo $this->get_field_id( 'twitter' ); ?>"><?php _e( 'twitter:' ); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id( 'twitter' ); ?>" name="<?php echo $this->get_field_name( 'twitter' ); ?>" type="text" value="<?php echo esc_attr( $twitter ); ?>" />
<label for="<?php echo $this->get_field_id( 'linkedin' ); ?>"><?php _e( 'linkedin:' ); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id( 'linkedin' ); ?>" name="<?php echo $this->get_field_name( 'linkedin' ); ?>" type="text" value="<?php echo esc_attr( $linkedin ); ?>" />
<label for="<?php echo $this->get_field_id( 'instagram' ); ?>"><?php _e( 'instagram:' ); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id( 'instagram' ); ?>" name="<?php echo $this->get_field_name( 'instagram' ); ?>" type="text" value="<?php echo esc_attr( $instagram ); ?>" />
<label for="<?php echo $this->get_field_id( 'imdb' ); ?>"><?php _e( 'imdb:' ); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id( 'imdb' ); ?>" name="<?php echo $this->get_field_name( 'imdb' ); ?>" type="text" value="<?php echo esc_attr( $imdb ); ?>" />

</p>

<?php
}

// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
$instance['facebook'] = ( ! empty( $new_instance['facebook'] ) ) ? strip_tags( $new_instance['facebook'] ) : '';
$instance['twitter'] = ( ! empty( $new_instance['twitter'] ) ) ? strip_tags( $new_instance['twitter'] ) : '';
$instance['linkedin'] = ( ! empty( $new_instance['linkedin'] ) ) ? strip_tags( $new_instance['linkedin'] ) : '';
$instance['instagram'] = ( ! empty( $new_instance['instagram'] ) ) ? strip_tags( $new_instance['instagram'] ) : '';
$instance['imdb'] = ( ! empty( $new_instance['imdb'] ) ) ? strip_tags( $new_instance['imdb'] ) : '';

return $instance;
}


// Creating widget front-end

public function widget( $args, $instance ) {
        $title = apply_filters('widget_title', $instance['title']);
        $facebook = $instance['facebook'];
        $twitter = $instance['twitter'];
        $instagram = $instance['instagram'];
        $linkedin = $instance['linkedin'];
        $imdb = $instance['imdb'];

        $facebook_profile = '<a class="facebook" href="' . $facebook . '"><i class="fa fa-facebook-square"></i></a>';
        $twitter_profile = '<a class="twitter" href="' . $twitter . '"><i class="fa fa-twitter"></i></a>';
        $instagram_profile = '<a class="instagram" href="' . $instagram . '"><i class="fa fa-instagram"></i></a>';
        $linkedin_profile = '<a class="linkedin" href="' . $linkedin . '"><i class="fa fa-linkedin"></i></a>';
        $imdb_profile = '<a class="imdb" href="' . $imdb . '"><i class="fa fa-imdb"></i></a>';

// before and after widget arguments are defined by themes
echo $args['before_widget'];
if ( ! empty( $title ) )
echo $args['before_title'] . $title . $args['after_title'];

// This is where you run the code and display the output
        echo '<div class="social-icons">';
        echo (!empty($facebook) ) ? $facebook_profile : null;
        echo (!empty($twitter) ) ? $twitter_profile : null;
        echo (!empty($instagram) ) ? $instagram_profile : null;
        echo (!empty($linkedin) ) ? $linkedin_profile : null;
        echo (!empty($imdb) ) ? $imdb_profile : null;
        echo '</div>';



echo $args['after_widget'];
}

} // Class socials_widget ends here
