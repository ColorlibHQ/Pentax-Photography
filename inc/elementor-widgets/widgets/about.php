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
class Pentax_About extends Widget_Base {

	public function get_name() {
		return 'pentax-about';
	}

	public function get_title() {
		return __( 'About', 'pentax' );
	}

	public function get_icon() {
		return 'eicon-thumbnails-half';
	}

	public function get_categories() {
		return [ 'pentax-elements' ];
	}

	protected function _register_controls() {

        
		// ----------------------------------------  About content ------------------------------
		$this->start_controls_section(
			'about_content',
			[
				'label' => __( 'About Us', 'pentax' ),
			]
		);
        $this->add_control(
            'content',
            [
                'label'         => esc_html__( 'Content', 'pentax' ),
                'description'   => esc_html__('Use <br> tag for line break', 'pentax'),
                'type'          => Controls_Manager::WYSIWYG,
                'label_block'   => true,
                'default'       => __( '<h1>Let’s <br>Introduce About <br>Myself</h1> <p>Beginning blessed second a creepeth. Darkness wherein fish years good air whose after seed appear midst evenin</p><p>Beginning blessed second a creepeth. Darkness wherein fish years good air whose after seed appear midst evenin appear void give third bearing divide one so</p>.', 'pentax' )
            ]
        );

        $this->add_control(
            'button_label',
            [
                'label'         => esc_html__( 'Button Label', 'pentax' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => esc_html__('Learn More', 'pentax')
            ]
        );
        $this->add_control(
            'button_url',
            [
                'label'         => esc_html__( 'Button URL', 'pentax' ),
                'type'          => Controls_Manager::URL,
                'label_block'   => true,
                
            ]
        );
		$this->end_controls_section(); // End about content


		$this->start_controls_section(
			'about_feature_image',
			[
				'label' => __( 'Featured Images', 'pentax' ),
			]
		);
		$this->add_control(
			'about_img1',
			[
				'label'         => esc_html__( 'Featured Image Layer 1', 'pentax' ),
				'type'          => Controls_Manager::MEDIA,
			]
		);
		$this->add_control(
			'about_img2',
			[
				'label'         => esc_html__( 'Featured Image Layer 2', 'pentax' ),
				'type'          => Controls_Manager::MEDIA,
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'about_img3',
				'label' => __( 'Featured Image Layer 3', 'pentax' ),
				'types' => [ 'classic' ],
				'selector' => '{{WRAPPER}} .img-styleBox .styleBox-border:after',
			]
		);
		$this->end_controls_section(); // End about content


        // Feature Style ==============================
        $this->start_controls_section(
            'stylecolor', [
                'label' => __( 'Style Featuer', 'pentax' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );        
        $this->add_control(
            'btn_color', [
                'label'     => __( 'Button label Color', 'pentax' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .about-content .main_btn' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'btn_bg_color', [
                'label'     => __( 'Button Background Color', 'pentax' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .about-content .main_btn' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'btn_hover_color', [
                'label'     => __( 'Button Hover label Color', 'pentax' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .about-content .main_btn:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'btn_hover_bg_color', [
                'label'     => __( 'Button Hover Background Color', 'pentax' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .about-content .main_btn:hover' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();


	}

	protected function render() {
        $settings = $this->get_settings();
        $content  = !empty( $settings['content'] ) ? $settings['content'] : '';
        $button_label = !empty( $settings['button_label'] ) ? $settings['button_label'] : '';
        $button_url   = !empty( $settings['button_url']['url'] ) ? $settings['button_url']['url'] : '';

		$feature_img1 = !empty( $settings['about_img1']['id'] ) ? wp_get_attachment_image( $settings['about_img1']['id'], 'pentax_382x420', false, array( 'class' => 'styleBox-img1' ) ) : '';
		$feature_img2 = !empty( $settings['about_img2']['id'] ) ? wp_get_attachment_image( $settings['about_img2']['id'], 'pentax_300x290', false, array( 'class' => 'styleBox-img2' ) ) : '';

        ?>
        <section class="about-area area-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="img-styleBox">
                            <?php
                            echo '<div class="styleBox-border">';
                            if( $feature_img1 ){
                                echo wp_kses_post( $feature_img1 );
                            }
                            echo '</div>';

                            if( $feature_img2 ){
                                echo wp_kses_post( $feature_img2 );
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-12 offset-md-0 offset-lg-1">
                        <div class="about-content">
                            <?php
                            //Content ==============
                            if( $content ){
                                echo wp_kses_post( wpautop( $content ) );
                            }
                            // Button =============
                            if( $button_label ){
                                echo '<a class="main_btn" href="'. esc_url( $button_url ) .'">'. esc_html( $button_label ) .'</a>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php

    }

}
