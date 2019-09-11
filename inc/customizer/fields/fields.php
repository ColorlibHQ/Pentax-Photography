<?php 
/**
 * @Packge     : Pentax
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 * Customizer section fields
 *
 */

/***********************************
 * General Section Fields
 ***********************************/
// Header top background color
Epsilon_Customizer::add_field(
    'pentax_theme_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Theme Color', 'pentax' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'pentax_general_section',
        'default'     => '#f81c1c',
    )
);

/***********************************
 * Header Section Fields =====================================
 ***********************************/
//Header Top
Epsilon_Customizer::add_field(
    'header_top_sec',
    array(
        'type'        => 'epsilon-separator',
        'label'       => esc_html__( 'Header Top', 'pentax' ),
        'section'     => 'pentax_header_section',
        
    )
);
// Header top phone number
Epsilon_Customizer::add_field(
    'pentax_top_phone',
    array(
        'type'        => 'text',
        'label'       => esc_html__( 'Phone Number', 'pentax' ),
        'description' => esc_html__( 'Empty field would be display none', 'pentax' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'pentax_header_section',
        'default'     => esc_html__( '+0123 456 789', 'pentax' ),
    )
);
// Header top email
Epsilon_Customizer::add_field(
    'pentax_top_address',
    array(
        'type'        => 'text',
        'label'       => esc_html__( 'Address', 'pentax' ),
        'description' => esc_html__( 'Empty field would be display none', 'pentax' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'pentax_header_section',
        'default'     => esc_html__( '4256 Marshville Road, Poughkeepsie, NY 12601', 'pentax' ),
    )
);


Epsilon_Customizer::add_field(
    'social_pro_separator',
    array(
        'type'        => 'epsilon-separator',
        'label'       => esc_html__( 'Social Profile', 'pentax' ),
        'section'     => 'pentax_header_section',

    )
);

// Social Profile Show/Hide
Epsilon_Customizer::add_field(
    'pentax_social_profile_toggle',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Social Profile Show/Hide', 'pentax' ),
        'section'     => 'pentax_header_section',
        'default'     => false,
    )
);

//Social Profile links
Epsilon_Customizer::add_field(
	'pentax_footer_social',
	array(
		'type'         => 'epsilon-repeater',
		'section'      => 'pentax_header_section',
		'label'        => esc_html__( 'Social Profile Links', 'pentax' ),
		'button_label' => esc_html__( 'Add new social link', 'pentax' ),
		'row_label'    => array(
			'type'  => 'field',
			'field' => 'social_link_title',
		),
		'fields'       => array(
			'social_link_title'       => array(
				'label'             => esc_html__( 'Title', 'pentax' ),
				'type'              => 'text',
				'sanitize_callback' => 'wp_kses_post',
				'default'           => 'Twitter',
			),
			'social_url' => array(
				'label'             => esc_html__( 'Social URL', 'pentax' ),
				'type'              => 'text',
				'sanitize_callback' => 'sanitize_text_field',
				'default'           => 'https://twitter.com',
			),
			'social_icon'        => array(
				'label'   => esc_html__( 'Icon', 'pentax' ),
				'type'    => 'epsilon-icon-picker',
				'default' => 'fa fa-twitter',
			),
			
		),
	)
);

// Header top background color
Epsilon_Customizer::add_field(
    'pentax_top_header_bg_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header Top Background Color', 'pentax' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'pentax_header_section',
        'default'     => '#f6f6f6',
    )
);
// Header top background color
Epsilon_Customizer::add_field(
    'pentax_top_header_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header Top Text Color', 'pentax' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'pentax_header_section',
        'default'     => '#888888',
    )
);

// Header navbar============================================
Epsilon_Customizer::add_field(
    'header_sec',
    array(
        'type'        => 'epsilon-separator',
        'label'       => esc_html__( 'Header Navbar', 'pentax' ),
        'section'     => 'pentax_header_section',
        
    )
);

// Header search form toggle field
Epsilon_Customizer::add_field(
    'pentax_hsearchform_toggle',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Show header search form', 'pentax' ),
        'description' => esc_html__( 'Toggle to show header search form.', 'pentax' ),
        'section'     => 'pentax_header_section',
        'default'     => false,
    )
);

// Header background color field
Epsilon_Customizer::add_field(
    'pentax_header_bg_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header Background Color', 'pentax' ),
        'description' => esc_html__( 'Select the header background color.', 'pentax' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'pentax_header_section',
        'default'     => '#fff',
    )
);

// Header nav menu color field
Epsilon_Customizer::add_field(
    'pentax_header_menu_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header menu color', 'pentax' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'pentax_header_section',
        'default'     => '#2a2a2a',
    )
);

// Header nav menu hover color field
Epsilon_Customizer::add_field(
    'pentax_header_menu_hover_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header menu hover color', 'pentax' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'pentax_header_section',
        'default'     => '',
    )
);
// Header menu dropdown background color field
Epsilon_Customizer::add_field(
    'pentax_header_menu_dropbg_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header menu dropdown background color', 'pentax' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'pentax_header_section',
        'default'     => '#fff',
    )
);

// Header dropdown menu color field
Epsilon_Customizer::add_field(
    'pentax_header_drop_menu_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Dropdown menu color', 'pentax' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'pentax_header_section',
        'default'     => '#2a2a2a',
    )
);
// Header dropdown menu hover color field
Epsilon_Customizer::add_field(
    'pentax_drop_menu_item_hover_bg',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Dropdown menu item hover background', 'pentax' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'pentax_header_section',
        'default'     => '',
    )
);
// Header dropdown menu hover color field
Epsilon_Customizer::add_field(
    'pentax_header_drop_menu_hover_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Dropdown menu hover color', 'pentax' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'pentax_header_section',
        'default'     => '#ffffff',
    )
);


/***********************************
 * Blog Section Fields
 ***********************************/
 
// Post excerpt length field
Epsilon_Customizer::add_field(
    'pentax_excerpt_length',
    array(
        'type'        => 'text',
        'label'       => esc_html__( 'Set post excerpt length', 'pentax' ),
        'description' => esc_html__( 'Set post excerpt length.', 'pentax' ),
        'section'     => 'pentax_blog_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'     => '30',
    )
);



// Blog sidebar layout field
Epsilon_Customizer::add_field(
    'pentax_blog_layout',
    array(
        'type'     => 'epsilon-layouts',
        'label'    => esc_html__( 'Blog Layout', 'pentax' ),
        'section'  => 'pentax_blog_section',
        'description' => esc_html__( 'Select the option to set blog page layout.', 'pentax' ),
        'layouts'  => array(
            '1' => get_template_directory_uri() . '/inc/libraries/epsilon-framework/assets/img/one-column.png',
            '2' => get_template_directory_uri() . '/inc/libraries/epsilon-framework/assets/img/epsilon-section-titleright.jpg',
            '3' => get_template_directory_uri() . '/inc/libraries/epsilon-framework/assets/img/epsilon-section-titleleft.jpg',
        ),
        'default'  => array(
            'columnsCount' => 2,
            'columns'      => array(
                1 => array(
                    'index' => 1,
                ),
                2 => array(
                    'index' => 2,
                ),
                3 => array(
                    'index' => 3,
                ),
            ),
        ),
        'min_span' => 4,
        'fixed'    => true
    )
);

// Blog single page social share icon
Epsilon_Customizer::add_field(
    'pentax_blog_meta',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Blog page post meta show/hide', 'pentax' ),
        'section'     => 'pentax_blog_section',
        'default'     => false
    )
);
Epsilon_Customizer::add_field(
    'pentax_blog_single_meta',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Blog single post meta show/hide', 'pentax' ),
        'section'     => 'pentax_blog_section',
        'default'     => false
    )
);

/*==============================================
	Portfolio Section
 =============================================*/


Epsilon_Customizer::add_field(
	'pentax_portfolio_single_rp',
	array(
		'type'        => 'epsilon-toggle',
		'label'       => esc_html__( 'Portfolio Recent Post Section show/hide', 'pentax' ),
		'section'     => 'pentax_portfolio_section',
		'default'     => false
	)
);
Epsilon_Customizer::add_field(
	'portfolio_recent_post_section_title',
	array(
		'type'              => 'epsilon-text-editor',
		'label'             => esc_html__( 'Recent Portfolio Section Title ', 'pentax' ),
		'description'       => esc_html__( 'Use "< span>Tag< /span>" for color with italic', 'pentax' ),
		'section'           => 'pentax_portfolio_section',
		'default'           => wp_kses_post('Check <span>Recent</span> Work')
	)
);
Epsilon_Customizer::add_field(
	'portfolio_recent_post_section_subtitle',
	array(
		'type'              => 'text',
		'label'             => esc_html__( 'Section Sub Title', 'pentax' ),
		'section'           => 'pentax_portfolio_section',
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => __('She\'d earth that midst void creeping him above seas.', 'pentax')
	)
);
Epsilon_Customizer::add_field(
	'portfolio_recent_post_number',
	array(
		'type'              => 'number',
		'label'             => esc_html__( 'Recent Portfolio Number', 'pentax' ),
		'section'           => 'pentax_portfolio_section',
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => absint('3')
	)
);


/***********************************
 * 404 Page Section Fields
 ***********************************/

// 404 text #1 field
Epsilon_Customizer::add_field(
    'pentax_fof_titleone',
    array(
        'type'              => 'text',
        'label'             => esc_html__( '404 Text #1', 'pentax' ),
        'section'           => 'pentax_fof_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => 'Say Hello.'
    )
);
// 404 text #2 field
Epsilon_Customizer::add_field(
    'pentax_fof_titletwo',
    array(
        'type'              => 'text',
        'label'             => esc_html__( '404 Text #2', 'pentax' ),
        'section'           => 'pentax_fof_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => 'Say Hello.'
    )
);
// 404 text #1 color field
Epsilon_Customizer::add_field(
    'pentax_fof_textone_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( '404 Text #1 Color', 'pentax' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'pentax_fof_section',
        'default'     => '#000000',
    )
);
// 404 text #2 color field
Epsilon_Customizer::add_field(
    'pentax_fof_texttwo_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( '404 Text #2 Color', 'pentax' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'pentax_fof_section',
        'default'     => '#656565',
    )
);
// 404 background color field
Epsilon_Customizer::add_field(
    'pentax_fof_bg_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( '404 Page Background Color', 'pentax' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'pentax_fof_section',
        'default'     => '#fff',
    )
);

/***********************************
 * Footer Section Fields
 ***********************************/

// Footer widget toggle field
Epsilon_Customizer::add_field(
    'pentax_footer_widget_toggle',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Footer widget show/hide', 'pentax' ),
        'description' => esc_html__( 'Toggle to display footer widgets.', 'pentax' ),
        'section'     => 'pentax_footer_section',
        'default'     => false,
    )
);

// Footer copyright text field
// Copy right text
$url = 'https://colorlib.com/';
$copyText = sprintf( __( 'Theme by %s colorlib %s Copyright &copy; %s  |  All rights reserved.', 'pentax' ), '<a target="_blank" href="' . esc_url( $url ) . '">', '</a>', date( 'Y' ) );
Epsilon_Customizer::add_field(
    'pentax_footer_copyright_text',
    array(
        'type'        => 'epsilon-text-editor',
        'label'       => esc_html__( 'Footer copyright text', 'pentax' ),
        'section'     => 'pentax_footer_section',
        'default'     => wp_kses_post( $copyText ),
    )
);

// Footer widget background color field
Epsilon_Customizer::add_field(
    'pentax_footer_widget_bdcolor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Background Color', 'pentax' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'pentax_footer_section',
        'default'     => '#19191b',
    )
);

// Footer widget text color field
Epsilon_Customizer::add_field(
    'pentax_footer_widget_textcolor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Text Color', 'pentax' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'pentax_footer_section',
        'default'     => '#888888',
    )
);

// Footer widget title color field
Epsilon_Customizer::add_field(
    'pentax_footer_widget_titlecolor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Widget Title Color', 'pentax' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'pentax_footer_section',
        'default'     => '#FFFFFF',
    )
);

// Footer widget anchor color field
Epsilon_Customizer::add_field(
    'pentax_footer_widget_anchorcolor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Anchor Color', 'pentax' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'pentax_footer_section',
        'default'     => '#888888',
    )
);

// Footer widget anchor hover color field
Epsilon_Customizer::add_field(
    'pentax_footer_widget_anchorhovcolor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Anchor Hover Color', 'pentax' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'pentax_footer_section',
        'default'     => '',
    )
);



