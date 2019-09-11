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
 
 
// enqueue css
function pentax_common_custom_css(){
    
    wp_enqueue_style( 'pentax-common', get_template_directory_uri().'/assets/css/dynamic.css' );
		$header_bg         		  = esc_url( get_header_image() );
		$header_bg_img 			  = !empty( $header_bg ) ? 'background-image: url('.esc_url( $header_bg ).')' : '';

		$themeColor     		  = pentax_opt( 'pentax_theme_color', '#f81c1c' );

		$headerTop_bg     		  = pentax_opt( 'pentax_top_header_bg_color' );
		$headerTop_col     		  = pentax_opt( 'pentax_top_header_color' );

		$headerBg          		  = pentax_opt( 'pentax_header_bg_color', '#fff' );
		$menuColor          	  = pentax_opt( 'pentax_header_menu_color' );
		$menuHoverColor           = pentax_opt( 'pentax_header_menu_hover_color' );

		$dropMenuBgColor          = pentax_opt( 'pentax_header_menu_dropbg_color' );
		$dropMenuColor            = pentax_opt( 'pentax_header_drop_menu_color' );
		$dropMenuHovColor         = pentax_opt( 'pentax_header_drop_menu_hover_color' );
		$dropMenuHovItemBg        = pentax_opt( 'pentax_drop_menu_item_hover_bg' );


		$footerwbgColor     	  = pentax_opt('pentax_footer_widget_bdcolor');
		$footerwTextColor   	  = pentax_opt('pentax_footer_widget_textcolor');
		$footerwanchorcolor 	  = pentax_opt('pentax_footer_widget_anchorcolor');
		$footerwanchorhovcolor    = pentax_opt('pentax_footer_widget_anchorhovcolor');
		$widgettitlecolor  		  = pentax_opt('pentax_footer_widget_titlecolor');


		$fofbg  	  		  = pentax_opt('pentax_fof_bg_color');
		$foftonecolor  	  	  = pentax_opt('pentax_fof_textone_color');
		$fofttwocolor  	  	  = pentax_opt('pentax_fof_texttwo_color');


		$customcss ="
			.hero-banner{
				{$header_bg_img}
			}
			

			.header_area .navbar .nav .nav-item:hover .nav-link,
			.header_area .navbar .nav .nav-item.active .nav-link,
			.home_banner_area .banner_inner .banner_content h1 .basecolor,
			.banner_area .banner_inner .banner_content .page_link a:hover,
			.banner-breadcrumb .breadcrumb-item a:hover,
			.single-blog .short_details a:hover,
			.single-blog .meta-top a:hover,
			.l_blog_item .l_blog_text h4:hover,
			.blog_details a:hover,
			.blog_right_sidebar .post_category_widget .cat-list li:hover a,
			.blog_right_sidebar .widget_pentax_recent_widget .post_item .media-body a:hover,
			.single-post-area .navigation-top .social-icons li:hover i,
			.single-post-area .navigation-top .social-icons li:hover span,
			.single-post-area .blog-author a:hover,
			.contact-info .media-body h3 a:hover,
			.wpcf7-form label,
			.modal-message .modal-dialog .modal-content .modal-header h2,
			.sample-text-area p b,
			.sample-text-area p i,
			.sample-text-area p sup,
			.sample-text-area p sub,
			.sample-text-area p del,
			.sample-text-area p u,
			.link-border,
			.main_btn:hover,
			.submit_btn:hover,
			.black_btn,
			.team_item .team_img .hover a:hover,
			.team_item:hover .team_name h4,
			.portfolio_area .filters ul li:hover,
			.portfolio_area .filters ul li.active,
			.portfolio_details_inner .portfolio_right_text .list li i,
			.service-area .single-service:hover .service-icon,
			.area-heading h3 span,
			.copy-right-text i,
			.copy-right-text a,
			.footer-social a:hover i,
			.footer-text a,
			.footer-text i,
			.blog_right_sidebar .widget_categories ul li:hover a, 
			.blog_right_sidebar .widget_rss ul li:hover a, 
			.blog_right_sidebar .widget_recent_entries ul li:hover a, 
			.blog_right_sidebar .widget_recent_comments ul li:hover a, 
			.blog_right_sidebar .widget_archive ul li:hover a, 
			.blog_right_sidebar .widget_meta ul li:hover a	
			{
				color: {$themeColor}
			}			

			.header_area .navbar .nav > .nav-item.submenu > ul > .nav-item:hover > .nav-link,
			.header_area .navbar .nav > .nav-item:before,
			.search-inner,
			.card-priceTable:hover .main_btn,
			.home_banner_area .social_area .round,
			.causes_slider .owl-dots .owl-dot.active,
			.blog_item_img .blog_item_date,
			.blog_right_sidebar .tag_cloud_widget ul li a:hover,
			.blog-pagination .page-link:hover,
			.card-priceTable:hover .main_btn,
			.link-border:before,
			.main_btn2:hover,
			.submit_btn,
			.white_bg_btn:hover,
			.black_btn:hover,
			.button,
			.button-header,
			.button-contactForm,
			.testimonial .owl-dot.active,
			.portfolio_area .filters ul li:before,
			.about-area .about-content .main_btn,
			.single-footer-widget .click-btn
			
			{
				background: {$themeColor}
			}

			.card-priceTable:hover .main_btn,
			.single-post-area .quotes,
			.card-priceTable:hover .main_btn,
			.link-border,
			.main_btn2:hover,
			.submit_btn,
			.white_bg_btn:hover,
			.button,
			.button-header,
			.button-contactForm,
			.testimonial .owl-dot.active,
			.about-area .about-content .main_btn,
			.single-footer-widget input:focus,
			blockquote p
			{
				border-color: {$themeColor}
			}



			.top_menu{
				background: {$headerTop_bg}
			}
			.top_menu .dn_btn,
			.top_menu .header_social li a,
			.top_menu .follow_us
			{
				color: {$headerTop_col}
			}

			
			
			.header_area .navbar .nav .nav-item .nav-link {
			   color: {$menuColor};
			}
			.header_area .navbar .nav .nav-item:hover .nav-link {
			   color: {$menuHoverColor};
			}
			.header_area .navbar .nav .nav-item.submenu ul {
			   background: {$dropMenuBgColor};
			}
			.header_area .navbar .nav .nav-item.submenu ul .nav-item .nav-link {
			   color: {$dropMenuColor};
			}
			
			.header_area .navbar .nav .nav-item.submenu ul .nav-item:hover .nav-link{
				background: {$dropMenuHovItemBg};
				color: {$dropMenuHovColor}
			}

			.footer-area {
				background-color: {$footerwbgColor};
			}
			footer.footer-area p{
				color: {$footerwTextColor}
			}
			.footer-area h6 {
				color: {$widgettitlecolor}
			}
			footer a,
			.single-footer-widget ul li a{
			   color: {$footerwanchorcolor};
			}
			footer a:hover,
			.single-footer-widget ul li:hover a{
			   color: {$footerwanchorhovcolor};
			}
			#f0f {
			   background-color: {$fofbg};
			}
			.f0f-content .h1 {
			   color: {$foftonecolor};
			}
			.f0f-content p {
			   color: {$fofttwocolor};
			}

        ";
       
    wp_add_inline_style( 'pentax-common', $customcss );
    
}
add_action( 'wp_enqueue_scripts', 'pentax_common_custom_css', 50 );