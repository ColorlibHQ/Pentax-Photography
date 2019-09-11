<?php
namespace Pentaxelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Background;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * Pentax elementor section widget.
 *
 * @since 1.0
 */
class Pentax_Testimonial extends Widget_Base {

	public function get_name() {
		return 'pentax-testimonial';
	}

	public function get_title() {
		return __( 'Testimonial', 'pentax' );
	}

	public function get_icon() {
		return 'eicon-post-slider';
	}

	public function get_categories() {
		return [ 'pentax-elements' ];
	}

	protected function _register_controls() {

        // Testimonial Heading
		$this->start_controls_section(
			'section_heading',
			[
				'label' => __( 'Section Heading', 'pentax' ),
			]
		);
        $this->add_control(
            'sec_title',
            [
                'label'         => esc_html__( 'Title', 'pentax' ),
                'description'   => __( "Use < span> tag for color and italic word", "pentax" ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => __( 'Happy <span>Clients</span> Says', 'pentax' )
            ]
        );
        $this->add_control(
            'sec_subtitle', [
                'label'         => esc_html__( 'Sub Title', 'pentax' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => esc_html__( 'Together female let signs for for fish fowl may first.', 'pentax' )
                                
            ]
        );
		$this->end_controls_section(); 


		// ----------------------------------------  Customers review content ------------------------------
		$this->start_controls_section(
			'customersreview_content',
			[
				'label' => __( 'Customers Review', 'pentax' ),
			]
		);

		$this->add_control(
            'review_slider', [
                'label' => __( 'Create Review', 'pentax' ),
                'type'  => Controls_Manager::REPEATER,
                'title_field' => '{{{ label }}}',
                'fields' => [
                    [
                        'name'  => 'label',
                        'label' => __( 'Name', 'pentax' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => esc_html__( 'Name', 'pentax' )
                    ],
                    [
                        'name'  => 'designation',
                        'label' => __( 'Designation', 'pentax' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => esc_html__( 'Chief Customer', 'pentax' )
                    ],
                    [
                        'name'  => 'desc',
                        'label' => __( 'Descriptions', 'pentax' ),
                        'type'  => Controls_Manager::TEXTAREA,
                        'default'   => __('Also made from. Give may saying meat there from heaven it lights face had is gathered god earth light for life may itself shall whales made they\'re blessed whales also made from give may saying meat. There from heaven it lights face had', 'pentax')
                    ],
                    [
                        'name'  => 'img',
                        'label' => __( 'Image', 'pentax' ),
                        'type'  => Controls_Manager::MEDIA,
                    ]
                ],
            ]
		);

		$this->end_controls_section(); // End exibition content

        /**
         * Style Tab
         *
         */
		//------------------------------ Style Section ------------------------------
		$this->start_controls_section(
			'style_section', [
				'label' => __( 'Style Section Heading', 'pentax' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'color_secttitle', [
				'label'     => __( 'Section Title Color', 'pentax' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#202e31',
				'selectors' => [
					'{{WRAPPER}} .area-heading h3' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'color_sectsubtitle', [
				'label'     => __( 'Section Sub Title Color', 'pentax' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#888888',
				'selectors' => [
					'{{WRAPPER}} .area-heading p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();


		$this->start_controls_section(
			'style_item',
			[
				'label' => __( 'Style Item', 'pentax' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_control(
            'more_options',
            [
                'label' => __( 'Description Color', 'pentax' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'testimonial_name_color', [
                'label'     => __( 'Testimonial Name Color', 'pentax' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#1a1d24',
                'selectors' => [
                    '{{WRAPPER}} .testimonial__content h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'testimonial_desc_color', [
                'label'     => __( 'Testimonial Description Color', 'pentax' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#797979',
                'selectors' => [
                    '{{WRAPPER}} .testimonial__i' => 'color: {{VALUE}};',
                ],
            ]
        );

		$this->end_controls_section();



        /*------------------------------ Background Style ------------------------------*/
		$this->start_controls_section(
            'section_bg', [
                'label' => __( 'Style Background', 'pentax' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'section_bgheading',
            [
                'label'     => __( 'Background Settings', 'pentax' ),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'sectionbg',
                'label' => __( 'Background', 'pentax' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .testimonial_sec',
            ]
        );

        $this->end_controls_section();

	}

	protected function render() {

    $settings = $this->get_settings();
    // call load widget script
	$this->load_widget_script();
	$title = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
    $subTitle = !empty( $settings['sec_subtitle'] ) ? $settings['sec_subtitle'] : '';
	$reviews = !empty( $settings['review_slider'] ) ? $settings['review_slider'] : '';

    ?>
        <section class="bg-gray testimonial_sec area-padding bg-1">
            <div class="container">
                <div class="area-heading">
	                <?php
	                if( $title ){
		                echo '<h3>'. wp_kses_post( $title ) .'</h3>';
	                }
	                if( $subTitle ){
		                echo '<p>'. esc_html( $subTitle ) .'</p>';
	                }
	                ?>
                </div>

                <div class="owl-carousel owl-theme testimonial">
	                <?php
	                if( is_array( $reviews ) && count( $reviews ) > 0 ){
	                    foreach ($reviews as $review ) {
                            $aName = !empty( $review['label'] ) ? $review['label'] : '';
                            $desig = !empty( $review['designation'] ) ? $review['designation'] : '';
                            $desc  = !empty( $review['desc'] ) ? $review['desc'] : '';
                            $image = !empty( $review['img']['id'] ) ? wp_get_attachment_image( $review['img']['id'], 'review_img' ) : '';
                            ?>
                            <div class="testimonial__item">
                                <div class="row">
                                    <div class="col-md-4 offset-0 col-lg-4 offset-lg-l align-self-center">
                                        <div class="testimonial__img">
                                            <?php
                                            if( $image ){
                                                echo wp_kses_post( $image );
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-8">
                                        <div class="testimonial__content">
                                            <?php
                                            // Name ----------------------
                                            if( $aName ){
                                                echo '<h3>'. esc_html( $aName ) .' </h3><span>/</span>';
                                            }

                                            // Designation ---------------
                                            if( $desig ){
                                                echo '<h6>'. esc_html( $desig ) .'</h6>';
                                            }

                                            // Description ---------------
                                            if( $desc ){
                                                echo '<div class="testimonial_para_wrapper">';
                                                echo '<p class="testimonial__i">'. esc_html( $desc ) .'</p>';
                                                echo '</div>';
                                            }
                                            ?>
                                            <span class="testimonial__icon"><i class="ti-quote-right"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
	                } ?>
                </div>
            </div>
        </section>

    <?php

    }

    public function load_widget_script(){
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
        ?>
        <script>
        ( function( $ ){

            $('.testimonial').owlCarousel({
                items: 1,
                loop: true,
                margin: 30,
                autoplayHoverPause: true,
                smartSpeed:500,
                dots: true
            });
            
        })(jQuery);
        </script>
        <?php 
        }
    }
	
}
