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
 * Pentax elementor Team Member section widget.
 *
 * @since 1.0
 */
class Pentax_Services extends Widget_Base {

	public function get_name() {
		return 'pentax-services';
	}

	public function get_title() {
		return __( 'Services', 'pentax' );
	}

	public function get_icon() {
		return 'eicon-info-box';
	}

	public function get_categories() {
		return [ 'pentax-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

        // ----------------------------------------  training Section Heading ------------------------------
        $this->start_controls_section(
            'services_heading',
            [
                'label' => __( 'Services Section Heading', 'pentax' ),
            ]
        );
        $this->add_control(
            'sect_title', [
                'label' => __( 'Section Title', 'pentax' ),
                'description'  => __('Use < span> tag for color and italic word', 'pentax'),
                'type'  => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => __( 'What <span>We</span> Provide', 'pentax' )

            ]
        );
        $this->add_control(
            'sect_subtitle', [
                'label' => __( 'Section Sub Title', 'pentax' ),
                'type'  => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default'   => esc_html__( 'Together female let signs for for fish fowl may first.', 'pentax' )

            ]
        );

        $this->end_controls_section(); // End section top content
        
		// ----------------------------------------   Services content ------------------------------
		$this->start_controls_section(
			'services_block',
			[
				'label' => __( 'Services', 'pentax' ),
			]
		);
		$this->add_control(
            'services_content', [
                'label' => __( 'Create Training', 'pentax' ),
                'type'  => Controls_Manager::REPEATER,
                'title_field' => '{{{ label }}}',
                'fields' => [
                    [
                        'name'  => 'label',
                        'label' => __( 'Title', 'pentax' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => __( 'Nature Photography', 'pentax' )
                    ],
                    [
                        'name'      => 'desc',
                        'label'     => __( 'Descriptions', 'pentax' ),
                        'type'      => Controls_Manager::TEXTAREA,
                        'default'   => __( 'You\'re which creepeth were yielding kind, divide sixten po gatherin all first fill Seed wherein life. Years one fifth', 'pentax' )
                    ],
                    [
                        'name'  => 'select_type',
                        'label' => __( 'Image/Icon', 'pentax' ),
                        'type'  => Controls_Manager::SELECT,
                        'options'=> [
                            'style1' => 'Image Icon',
                            'style2' => 'Font Icon',
                        ],
                        'default'   => 'style2'
                    ],
                    [
                        'name'  => 'img',
                        'label' => __( 'Photo', 'pentax' ),
                        'type'  => Controls_Manager::MEDIA,
                        'condition' => [
                                'select_type' => 'style1'
                        ]
                    ],
                    [
                        'name'  => 'icon',
                        'label' => __( 'Icon', 'pentax' ),
                        'type'  => Controls_Manager::ICON,
                        'options'   => pentax_flaticon_list(),
                        'condition' => [
                                'select_type' => 'style2'
                        ]
                    ]
                ],
            ]
		);

		$this->end_controls_section(); // End Services content


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
                'default'   => '#8888888',
                'selectors' => [
                    '{{WRAPPER}} .area-heading p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        //------------------------------ Style services Box ------------------------------
        $this->start_controls_section(
            'style_trainingbox', [
                'label' => __( 'Style Services Content', 'pentax' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_servicestitle', [
                'label' => __( 'Title Color', 'pentax' ),
                'type'  => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-content h5' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_serviceshovertitle', [
                'label' => __( 'Title Hover Color', 'pentax' ),
                'type'  => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-content:hover h5' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_servicesdescription', [
                'label' => __( 'Description Color', 'pentax' ),
                'type'  => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-content p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'service_hover_border', [
                'label' => __( 'Service Hover Border Color', 'pentax' ),
                'type'  => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-service:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        /**
         * Style Tab
         * ------------------------------ Background Style ------------------------------
         *
         */
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
                'selector' => '{{WRAPPER}} .service-area',
            ]
        );

        $this->end_controls_section();


	}

	protected function render() {

    $settings = $this->get_settings();
    $title = !empty( $settings['sect_title'] ) ? $settings['sect_title'] : '';
    $subTitle = !empty( $settings['sect_subtitle'] ) ? $settings['sect_subtitle'] : '';
    $services = !empty( $settings['services_content'] ) ? $settings['services_content'] : '';

    ?>

    <section class="service-area area-padding pad-top-0">
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
            <div class="row">
                <?php
                if( is_array( $services ) && count( $services ) > 0 ){
                    foreach ( $services as $service ) { 
                        $service_title = !empty( $service['label'] ) ? $service['label'] : '';
                        $service_desc  = !empty( $service['desc'] ) ? $service['desc'] : '';
                        $service_img   = !empty( $service['img']['url'] ) ? $service['img']['url'] : '';
                        $iconType      = $service['select_type'];
                        $fontIcon      = !empty( $service['icon'] ) ? $service['icon'] : '';
                        ?>
                        <div class="col-md-6 col-xl-3">
                            <div class="single-service">
                                <div class="service-icon">
                                    <?php
                                    if( $iconType == 'style1' && $service_img ){
                                        echo '<img src="'. esc_url( $service_img ) .'" alt="'. esc_html__( 'Service image', 'pentax' ) .'">';
                                    }
                                    elseif ( $iconType == 'style2' && $fontIcon ){
                                        echo '<span class="'. esc_attr( $fontIcon ) .'"></span>';
                                    }
                                    ?>
                                </div>
                                <div class="service-content">
                                    <?php
                                    //Service Title
                                    if( $service_title ){
                                        echo '<h5>'. esc_html( $service_title ) .'</h5>';
                                    }
                                    
                                    // Service Desc
                                    if( $service_desc ){
                                        echo '<p>'. esc_html( $service_desc ) .'</p>';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>                
            </div>
        </div>
    </section>

    <?php
    }
}
