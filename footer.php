<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package
 */

    $url = 'https://colorlib.com/';
    $copyText = sprintf( __( 'Theme by %s colorlib %s Copyright &copy; %s  |  All rights reserved.', 'pentax' ), '<a target="_blank" href="' . esc_url( $url ) . '">', '</a>', date( 'Y' ) );
    $copyRight = !empty( pentax_opt( 'pentax_footer_copyright_text' ) ) ? pentax_opt( 'pentax_footer_copyright_text' ) : $copyText;
    $footer_class = pentax_opt( 'pentax_footer_widget_toggle' ) == 1 ? 'footer-area' : 'no_widget';

    ?>

        <!--================ start footer Area =================-->
        <footer class="<?php echo esc_attr( $footer_class ) ?>">

            <?php
            if( pentax_opt( 'pentax_footer_widget_toggle' ) == 1 ) {
	            ?>
                <div class="container">
                    <div class="row">
			            <?php
			            // Footer Widget 1
			            if ( is_active_sidebar( 'footer-1' ) ) {
				            echo '<div class="col-lg-4 col-md-6 col-sm-6">';
				            dynamic_sidebar( 'footer-1' );
				            echo '</div>';
			            }

			            // Footer Widget 2
			            if ( is_active_sidebar( 'footer-2' ) ) {
				            echo '<div class="offset-lg-1 col-lg-5 col-md-6 col-sm-6">';
				            dynamic_sidebar( 'footer-2' );
				            echo '</div>';
			            }

			            // Footer Widget 1
			            if ( is_active_sidebar( 'footer-3' ) ) {
				            echo '<div class="col-lg-2 col-md-6 col-sm-6">';
				            dynamic_sidebar( 'footer-3' );
				            echo '</div>';
			            }

			            ?>
                    </div>
                </div>
	            <?php
            } ?>
            <div class="footer-bottom">
                <div class="container">
                    <div class="row ">
                        <p class="col-lg-12 col-sm-6 footer-text"><?php echo wp_kses_post( $copyRight ); ?></p>
                    </div>    
                </div>  
            </div>
        </footer>

    <?php wp_footer(); ?>
    </body>
</html>