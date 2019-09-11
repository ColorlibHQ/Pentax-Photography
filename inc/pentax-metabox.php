<?php
function pentax_portfolio_metabox( $meta_boxes ) {

	$meta_boxes[] = array(
		'id'        => 'portfolio_single_metaboxs',
		'title'     => esc_html__( 'Portfolio Single Metabox', 'pentax' ),
		'post_types'=> array( 'portfolio' ),
		'context'   => 'side',
		'priority'  => 'high',
		'autosave'  => 'false',
		'fields'    => array(
			array(
				'id'    => 'client_name',
				'type'  => 'text',
				'name'  => esc_html__( 'Client Name', 'pentax' ),
				'placeholder' => esc_html__( 'Client Name', 'pentax' ),
			),
			array(
				'id'    => 'project_date',
				'type'  => 'date',
				'name'  => esc_html__( 'Project Date', 'pentax' ),
				'js_options' => array(
					'dateFormat'      => 'M dd, yy   ',
					'showButtonPanel' => false,
				),
			),
			array(
				'name'    => esc_html__( 'Star Review', 'pentax' ),
				'id'      => 'project_review',
				'type'    => 'button_group',
				'options' => array(
					'0' => '<i title="Not Rated" class="dashicons-before dashicons-marker"></i>',
					'1' => '<i title="1 star" class="dashicons-before dashicons-star-empty"></i>',
					'2' => '<i title="2 star" class="dashicons-before dashicons-star-empty"></i>',
					'3' => '<i title="3 star" class="dashicons-before dashicons-star-empty"></i>',
					'4' => '<i title="4 star" class="dashicons-before dashicons-star-empty"></i>',
					'5' => '<i title="5 star" class="dashicons-before dashicons-star-empty"></i>',
				),
				'inline' => true,
			),
			array(
				'name'    => esc_html__( 'Gird Image Size', 'pentax' ),
				'id'      => 'portfolio-grid',
				'type'    => 'select',
				'options' => array(
					'0' => 'Select Size',
					'1' => 'Gird Size [360x350]',
					'2' => 'Grid Size [750x900]',
					'3' => 'Grid Size [360x540]',
					'4' => 'Grid Size [750x400]',
					'5' => 'Grid Size [360x400]'
				),
				'inline' => true,
			),
		),
	);


	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'pentax_portfolio_metabox' );