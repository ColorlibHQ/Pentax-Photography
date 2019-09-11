<?php
namespace Pentaxelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * Pentax elementor few words section widget.
 *
 * @since 1.0
 */

class Pentax_Blog extends Widget_Base {

	public function get_name() {
		return 'pentax-blog';
	}

	public function get_title() {
		return __( 'Blog', 'pentax' );
	}

	public function get_icon() {
		return 'eicon-post-list';
	}

	public function get_categories() {
		return [ 'pentax-elements' ];
	}

	protected function _register_controls() {

        // ----------------------------------------  Blog content ------------------------------
        $this->start_controls_section(
            'blog_content',
            [
                'label' => __( 'Latest Blog Post', 'pentax' ),
            ]
        );
		$this->add_control(
			'sec_title',
			[
				'label'         => esc_html__( 'Title', 'pentax' ),
				'description'   => __( "Use < span> tag for color and italic word", "pentax" ),
				'type'          => Controls_Manager::TEXT,
				'label_block'   => true,
				'default'       => __( 'Our <span>Recent</span> News', 'pentax' )
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
        $this->add_control(
            'blog_limit',
            [
                'label'     => esc_html__( 'Post Limit', 'pentax' ),
                'type'      => Controls_Manager::NUMBER,
                'min'       => 1,
                'max'       => 10,
                'step'      => 1,
                'default'   => 3
            ]
        );

        $this->end_controls_section(); // End few words content

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

        //------------------------------ Style text ------------------------------
        $this->start_controls_section(
            'style_content', [
                'label' => __( 'Style Content', 'pentax' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_blogtitle', [
                'label'     => __( 'Blog Title Color', 'pentax' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .single-blog h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_blogtitlehov', [
                'label'     => __( 'Blog Title Hover Color', 'pentax' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .single-blog:hover h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'blog_meta_color', [
                'label'     => __( 'Blog Meta Color', 'pentax' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#999',
                'selectors' => [
                    '{{WRAPPER}} .single-blog .meta-top a' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .single-blog .meta-top span' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();

	}

	protected function render() {

    $settings  = $this->get_settings();
    $post_num  = !empty( $settings['blog_limit'] ) ? $settings['blog_limit'] : '3';
    $title = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
    $subTitle = !empty( $settings['sec_subtitle'] ) ? $settings['sec_subtitle'] : '';
    ?>

    <section class="blog-area area-padding">
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
                if( function_exists( 'pentax_latest_blog' ) ) {
	                pentax_latest_blog( $post_num );
                }
                ?>
            </div>
        </div>
    </section>
    <?php
	}
}
