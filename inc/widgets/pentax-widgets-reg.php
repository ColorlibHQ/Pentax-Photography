<?php
// Block direct access
if( !defined( 'ABSPATH' ) ){
    exit( 'Direct script access denied.' );
}

/**
 * @Packge     : Pentax
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */
 
 
function pentax_widgets_init() {
    // sidebar widgets 
    
    register_sidebar(array(
        'name'          => esc_html__('Sidebar widgets', 'pentax'),
        'description'   => esc_html__('Place widgets in sidebar widgets area.', 'pentax'),
        'id'            => 'sidebar_widgets',
        'before_widget' => '<div id="%1$s" class="widget single_sidebar_widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget_title">',
        'after_title'   => '</h4>'
    ));

	// footer widgets register
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer One', 'pentax' ),
			'id'            => 'footer-1',
			'before_widget' => '<div id="%1$s" class="single-footer-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h6>',
			'after_title'   => '</h6>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Two', 'pentax' ),
			'id'            => 'footer-2',
			'before_widget' => '<div id="%1$s" class="single-footer-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h6>',
			'after_title'   => '</h6>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Three', 'pentax' ),
			'id'            => 'footer-3',
			'before_widget' => '<div id="%1$s" class="single-footer-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h6>',
			'after_title'   => '</h6>',
		)
	);
	

}
add_action( 'widgets_init', 'pentax_widgets_init' );
