<?php
namespace Pentaxelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
//use Elementor\Scheme_Color;
//use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
//use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Background;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;  
}


/**
 *
 * Pentax elementor about us section widget.
 *
 * @since 1.0
 */
class Pentax_Banner extends Widget_Base {

	public function get_name() {
		return 'pentax-banner';
	}

	public function get_title() {
		return __( 'Banner', 'pentax' );
	}

	public function get_icon() {
		return 'eicon-banner';
	}

	public function get_categories() {
		return [ 'pentax-elements' ];
	}

	protected function _register_controls() {

        // ----------------------------------------  content ------------------------------
        $this->start_controls_section(
            'banner_section',
            [
                'label' => __( 'Banner Section Content', 'pentax' ),
            ]
        );
        $this->add_control(
            'banner_content',
            [
                'label'         => esc_html__( 'Banner Content', 'pentax' ),
                'type'          => Controls_Manager::WYSIWYG,
                'default'       => __( '<h1>I am Professional Photographer</h1> IT SEASONS. BEARING IN ONE YEARS FORTH SAYING', 'pentax' )
            ]
        );

        $this->add_control(
            'banner_btnlabel',
            [
                'label'         => esc_html__( 'Button Label', 'pentax' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => esc_html__( 'Get Started', 'pentax' )
            ]
        );
        $this->add_control(
            'banner_btnurl',
            [
                'label'         => esc_html__( 'Button Url', 'pentax' ),
                'type'          => Controls_Manager::URL,
                'show_external' => false
            ]
        );

        $this->add_control(
            'social_pro_separetor',
            [
                'label'         => __( 'Social Profile', 'pentax' ),
                'type'          => Controls_Manager::DIVIDER,
            ]
        );
		$this->add_control(
			'social_links', [
				'label' => __( 'Social Profile Links', 'pentax' ),
				'type'  => Controls_Manager::REPEATER,
				'title_field' => '{{{ label }}}',
				'fields' => [
					[
						'name'  => 'label',
						'label' => __( 'Facebook', 'pentax' ),
						'type'  => Controls_Manager::TEXT,
						'label_block' => true,
						'default' => esc_html__( 'Facebook', 'pentax' )
					],
					[
						'name'  => 'icon',
						'label' => __( 'Icon', 'pentax' ),
						'type'  => Controls_Manager::ICON,

					],
                    [
                        'name'  => 'slink',
                        'label' => __( 'Social URL', 'pentax' ),
                        'type'  => Controls_Manager::URL,

                    ]
				],
			]
		);
        $this->end_controls_section(); // End content


        //------------------------------ Style button ------------------------------
        $this->start_controls_section(
            'style_btn', [
                'label' => __( 'Style Button', 'pentax' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_btnlabel', [
                'label'     => __( 'Button Label Color', 'pentax' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .banner_content .main_btn' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_btnhoverlabel', [
                'label'     => __( 'Button Hover Label Color', 'pentax' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .banner_content .main_btn:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_btnbg', [
                'label'       => __( 'Button Background Color', 'pentax' ),
                'type'        => Controls_Manager::COLOR,
                'default'     => '',
                'selectors'   => [
                    '{{WRAPPER}} .banner_content .main_btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_btnhovbg', [
                'label'     => __( 'Button Hover Background Color', 'pentax' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .banner_content .main_btn:hover' => 'background-color: {{VALUE}};',
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
            'bg_overlay',
            [
                'label' => __( 'Overlay', 'pentax' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'Show', 'pentax' ),
                'label_off' => __( 'Hide', 'pentax' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'sect_ooverlay_bgcolor',
            [
                'label'     => __( 'Overlay Color', 'pentax' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'bg_overlay' => 'yes'
                ]
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'sectionoverlaybg',
                'label' => __( 'Overlay', 'pentax' ),
                'types' => [ 'gradient' ],
                'selector' => '{{WRAPPER}} .banner-area .overlay-bg',
                'condition' => [
                    'bg_overlay' => 'yes'
                ]
            ]
        );
        $this->add_control(
            'section_bgheading',
            [
                'label'     => __( 'Background Settings', 'pentax' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'sectionbg',
                'label' => __( 'Background', 'pentax' ),
                'types' => [ 'classic' ],
                'selector' => '{{WRAPPER}} .home_banner_area .banner_inner .overlay',
            ]
        );

        $this->end_controls_section();

	}

	protected function render() {
        $settings = $this->get_settings();
        $ban_content = !empty( $settings['banner_content'] ) ? $settings['banner_content'] : '';
        $btn_label = !empty( $settings['banner_btnlabel'] ) ? $settings['banner_btnlabel'] : '';
        $buttonUrl = !empty( $settings['banner_btnurl']['url'] ) ? $settings['banner_btnurl']['url'] : '';
        $socialLinks = !empty( $settings['social_links'] ) ? $settings['social_links'] : '';
        ?>
        <section class="home_banner_area">
            <div class="banner_inner d-flex align-items-center">
                <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
                <div class="container">
                    <div class="banner_content">

                        <?php
                        if( $ban_content ){
                            echo wp_kses_post( wpautop( $ban_content ) );
                        }

                        if( $btn_label ){
                            echo '<a class="main_btn" href="'. esc_url( $buttonUrl ) .'">'. esc_html( $btn_label ) .'</a>';
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="social_area">
                <?php
                if( is_array( $socialLinks ) && count( $socialLinks ) > 0 ){
                    foreach ( $socialLinks as $link ){
                        echo '<h4><a href="'. esc_url( $link['slink']['url'] ) .'"><i class="'. esc_attr( $link['icon'] ) .'"></i>'. esc_html( $link['label'] ) .'</a></h4>';
                    }
                }
                ?>

            </div>
        </section>
        <?php

    }
	
}
