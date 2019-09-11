<?php 
/**
 * @Packge     : Pentax
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 * Customizer panels and sections
 *
 */

/***********************************
 * Register customizer panels
 ***********************************/

$panels = array(
    /**
     * Theme Options Panel
     */
    array(
        'id'   => 'pentax_theme_options_panel',
        'args' => array(
            'priority'       => 0,
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'          => esc_html__( 'Theme Options', 'pentax' ),
        ),
    )
);


/***********************************
 * Register customizer sections
 ***********************************/


$sections = array(
    /**
     * General Section
     */
    array(
        'id'   => 'pentax_general_section',
        'args' => array(
            'title'    => esc_html__( 'General', 'pentax' ),
            'panel'    => 'pentax_theme_options_panel',
            'priority' => 1,
        ),
    ),

    /**
     * Header Section
     */
    array(
        'id'   => 'pentax_header_section',
        'args' => array(
            'title'    => esc_html__( 'Header', 'pentax' ),
            'panel'    => 'pentax_theme_options_panel',
            'priority' => 2,
        ),
    ),

    /**
     * Blog Section
     */
    array(
        'id'   => 'pentax_blog_section',
        'args' => array(
            'title'    => esc_html__( 'Blog', 'pentax' ),
            'panel'    => 'pentax_theme_options_panel',
            'priority' => 3,
        ),
    ),

    /**
     * Blog Section
     */
    array(
        'id'   => 'pentax_portfolio_section',
        'args' => array(
            'title'    => esc_html__( 'Portfolio', 'pentax' ),
            'panel'    => 'pentax_theme_options_panel',
            'priority' => 4,
        ),
    ),



    /**
     * 404 Page Section
     */
    array(
        'id'   => 'pentax_fof_section',
        'args' => array(
            'title'    => esc_html__( '404 Page', 'pentax' ),
            'panel'    => 'pentax_theme_options_panel',
            'priority' => 6,
        ),
    ),

    /**
     * Footer Section
     */
    array(
        'id'   => 'pentax_footer_section',
        'args' => array(
            'title'    => esc_html__( 'Footer Page', 'pentax' ),
            'panel'    => 'pentax_theme_options_panel',
            'priority' => 7,
        ),
    ),



);


/***********************************
 * Add customizer elements
 ***********************************/
$collection = array(
    'panel'   => $panels,
    'section' => $sections,
);

Epsilon_Customizer::add_multiple( $collection );

?>