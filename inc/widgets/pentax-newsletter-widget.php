<?php
/**
 * @version  1.0
 * @package  Repair
 *
 */
 
 
/**************************************
*Creating Newsletter Widget
***************************************/
 
class Pentax_newsletter_widget extends WP_Widget {


    function __construct() {

        parent::__construct(
        // Base ID of your widget
        'pentax_newsletter',


        // Widget name will appear in UI
        esc_html__( '[ Pentax ] Newsletter Form', 'pentax' ),

        // Widget description
        array( 'description' => esc_html__( 'Add footer newsletter signup form.', 'pentax' ), )
        );

    }

    // This is where the action happens
    public function widget( $args, $instance ) {
        
    $title 		= apply_filters( 'widget_title', $instance['title'] );
    $actionurl 	= apply_filters( 'widget_actionurl', $instance['actionurl'] );
    $desc 		= apply_filters( 'widget_desc', $instance['desc'] );

    // mc validation
    wp_enqueue_script( 'mc-validate');

    // before and after widget arguments are defined by themes
    echo wp_kses_post( $args['before_widget'] );
    if ( ! empty( $title ) )
    echo wp_kses_post( $args['before_title'] . $title . $args['after_title'] );


	    if( $desc ){
		    echo '<p>'.esc_html( $desc ).'</p>';
	    } ?>
        <div class="" id="mc_embed_signup">
            <form target="_blank" action="<?php echo esc_url( $actionurl ); ?>" method="post" class="form-inline">
                <div class="d-flex flex-row form-group">
                    <input class="form-control" type="email" name="EMAIL" placeholder="<?php esc_html_e( 'Enter Email', 'pentax' ); ?>" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email '" required>
                    <button class="click-btn btn btn-default"><i class="ti-arrow-right"></i></button>
                </div>
                <button class="button rounded-0 primary-bg text-white w-100" type="submit">Subscribe</button>
                <div class="info"></div>
            </form>



        </div>

    <?php
    echo wp_kses_post( $args['after_widget'] );
    }
		
    // Widget Backend 
    public function form( $instance ) {
        
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }else {
            $title = esc_html__( 'Newsletter', 'pentax' );
        }


        //	Action Url
        if ( isset( $instance[ 'actionurl' ] ) ) {
            $actionurl = $instance[ 'actionurl' ];
        }else {
            $actionurl = '';
        }

        //	Text Area
        if ( isset( $instance[ 'desc' ] ) ) {
            $desc = $instance[ 'desc' ];
        }else {
            $desc = '';
        }


        // Widget admin form
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:' ,'pentax'); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'actionurl' ) ); ?>"><?php esc_html_e( 'Action URL:' ,'pentax'); ?></label>
            <p class="description"><?php esc_html_e( 'Enter here your MailChimp action URL.' ,'pentax'); ?> </p>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'actionurl' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'actionurl' ) ); ?>" type="text" value="<?php echo esc_attr( $actionurl ); ?>" />

        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'desc' ) ); ?>"><?php esc_html_e( 'Short Description:' ,'pentax'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'desc' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'desc' ) ); ?>"><?php echo esc_textarea( $desc ); ?></textarea>
        </p>

    <?php 
    }

	
    // Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {

        $instance = array();
        $instance['title'] 	  = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['actionurl'] = ( ! empty( $new_instance['actionurl'] ) ) ? strip_tags( $new_instance['actionurl'] ) : '';
        $instance['desc'] = ( ! empty( $new_instance['desc'] ) ) ? strip_tags( $new_instance['desc'] ) : '';

        return $instance;

    }

} // Class pentax_newsletter_widget ends here


// Register and load the widget
function pentax_newsletter_load_widget() {
	register_widget( 'Pentax_newsletter_widget' );
}
add_action( 'widgets_init', 'pentax_newsletter_load_widget' );