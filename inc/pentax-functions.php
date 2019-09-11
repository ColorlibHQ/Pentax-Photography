<?php 
/**
 * @Packge     : Pentax
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */
 
    // Block direct access
    if( !defined( 'ABSPATH' ) ){
        exit( 'Direct script access denied.' );
    }

/*=========================================================
	Image Crop Size
=========================================================*/
add_image_size( 'pentax_blog_750x375', 750, 375, true );
add_image_size( 'pentax_np_thumb', 60, 60, true );
add_image_size( 'pentax_latest_blog_360x285', 360, 285, true );
add_image_size( 'pentax_950x500', 950, 500, true );
add_image_size( 'pentax_recent_360x380', 360, 380, true );

add_image_size( 'portfolio_360x350', 360, 350, true );
add_image_size( 'portfolio_750x900', 750, 900, true );
add_image_size( 'portfolio_360x520', 360, 520, true );
add_image_size( 'portfolio_750x400', 750, 400, true );
add_image_size( 'portfolio_360x400', 360, 400, true );

add_image_size( 'pentax_382x420', 382, 420, true );


/*=========================================================
	Theme option callback
=========================================================*/
function pentax_opt( $id = null, $default = '' ) {
	
	$opt = get_theme_mod( $id, $default );
	
	$data = '';
	
	if( $opt ) {
		$data = $opt;
	}
	
	return $data;
}


/*=========================================================
	Custom meta id callback
=========================================================*/
function pentax_meta( $id = '' ){
    
    $value = get_post_meta( get_the_ID(), '_pentax_'.$id, true );
    
    return $value;
}


/*=========================================================
	Blog Date Permalink
=========================================================*/
function pentax_blog_date_permalink(){
	
	$year  = get_the_time('Y'); 
    $month_link = get_the_time('m');
    $day   = get_the_time('d');

    $link = get_day_link( $year, $month_link, $day);
    
    return $link; 
}



/*========================================================
	Blog Excerpt Length
========================================================*/
if ( ! function_exists( 'pentax_excerpt_length' ) ) {
	function pentax_excerpt_length( $limit = 30 ) {

		$excerpt = explode( ' ', get_the_excerpt() );
		
		// $limit null check
		if( !null == $limit ){
			$limit = $limit;
		}else{
			$limit = 30;
		}
        
        
		if ( count( $excerpt ) >= $limit ) {
			array_pop( $excerpt );
			$exc_slice = array_slice( $excerpt, 0, $limit );
			$excerpt = implode( " ", $exc_slice ).' ...';
		} else {
			$exc_slice = array_slice( $excerpt, 0, $limit );
			$excerpt = implode( " ", $exc_slice );
		}
		
		$excerpt = '<p>'.preg_replace('`\[[^\]]*\]`','',$excerpt).'</p>';
		return $excerpt;

	}
}


/*==========================================================
	Comment number and Link
==========================================================*/
if ( ! function_exists( 'pentax_posted_comments' ) ) {
    function pentax_posted_comments(){
        
        $comments_num = get_comments_number();
        if( comments_open() ){
            if( $comments_num == 0 ){
                $comments = esc_html__('No Comments','pentax');
            } elseif ( $comments_num > 1 ){
                $comments= $comments_num . esc_html__(' Comments','pentax');
            } else {
                $comments = esc_html__( '1 Comment','pentax' );
            }
            $comments = '<a href="' . esc_url( get_comments_link() ) . '"><i class="fa fa-comments"></i>'. $comments .'</a>';
        } else {
            $comments = esc_html__( 'Comments are closed', 'pentax' );
        }
        
        return $comments;
    }
}


/*===================================================
	Post embedded media
===================================================*/
function pentax_embedded_media( $type = array() ){
    
    $content = do_shortcode( apply_filters( 'the_content', get_the_content() ) );
    $embed   = get_media_embedded_in_content( $content, $type );
        
    if( in_array( 'audio' , $type) ){
    
        if( count( $embed ) > 0 ){
            $output = str_replace( '?visual=true', '?visual=false', $embed[0] );
        }else{
           $output = '';
        }
        
    }else{
        
        if( count( $embed ) > 0 ){

            $output = $embed[0];
        }else{
           $output = ''; 
        }
        
    }
    
    return $output;
}


/*===================================================
	WP post link pages
====================================================*/
function pentax_link_pages(){
    wp_link_pages( array(
    'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'pentax' ) . '</span>',
    'after'       => '</div>',
    'link_before' => '<span>',
    'link_after'  => '</span>',
    'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'pentax' ) . ' </span>%',
    'separator'   => '<span class="screen-reader-text">, </span>',
    ) );
}


/*====================================================
	Theme logo
====================================================*/
function pentax_theme_logo( $class = '' ) {

    $siteUrl = home_url('/');
    // site logo
		
	$custom_logo_id = get_theme_mod( 'custom_logo' );
	$imageUrl = wp_get_attachment_image_src( $custom_logo_id , 'full' );
	
	if( !empty( $imageUrl[0] ) ){
		$siteLogo = '<a class="'.esc_attr( $class ).'" href="'.esc_url( $siteUrl ).'"><img src="'.esc_url( $imageUrl[0] ).'" alt=""></a>';
	}else{
		$siteLogo = '<h2><a class="'.esc_attr( $class ).'" href="'.esc_url( $siteUrl ).'">'.esc_html( get_bloginfo('name') ).'</a></h2><span>'. esc_html( get_bloginfo('description') ) .'</span>';
	}
	
	return wp_kses_post( $siteLogo );
	
}


/*================================================
    Page Title Bar
================================================*/
function pentax_page_titlebar() {
	if ( ! is_page_template( 'template-builder.php' ) ) {
		?>
        <section class="hero-banner">
            <div class="container">
				<h2>
				<?php
				if ( is_category() ) {
					single_cat_title( __('Category: ', 'pentax') );

				} elseif ( is_tag() ) {
					single_tag_title( 'Tag Archive for &quot;' );

				} elseif ( is_archive() ) {
					echo get_the_archive_title();

				} elseif ( is_page() ) {
					echo get_the_title();

				} elseif ( is_search() ) {
					echo esc_html__( 'Search for: ', 'pentax' ) . get_search_query();

				} elseif ( ! ( is_404() ) && ( is_single() ) || ( is_page() ) ) {
					echo  get_the_title();

				} elseif ( is_home() ) {
					echo esc_html__( 'Blog', 'pentax' );

				} elseif ( is_404() ) {
					echo esc_html__( '404 error', 'pentax' );

				}
				?>
				</h2>
                <nav aria-label="breadcrumb" class="banner-breadcrumb">
					<?php
					if ( function_exists( 'pentax_breadcrumbs' ) ) {
						pentax_breadcrumbs();
					}
					?>
                </nav>
            </div>
        </section>
		<?php
	}
}



/*================================================
	Blog pull right class callback
=================================================*/
function pentax_pull_right( $id = '', $condation ){
    
    if( $id == $condation ){
        return ' '.'order-last';
    }else{
        return;
    }
    
}



/*======================================================
	Inline Background
======================================================*/
function pentax_inline_bg_img( $bgUrl ){
    $bg = '';

    if( $bgUrl ){
        $bg = 'style="background-image:url('.esc_url( $bgUrl ).')"'; 
    }

    return $bg;
}


/*======================================================
	Blog Category
======================================================*/
function pentax_featured_post_cat(){

	$categories = get_the_category(); 
	
	if( is_array( $categories ) && count( $categories ) > 0 ){
		$getCat = [];
		foreach ( $categories as $value ) {

			if( $value->slug != 'featured' ){
				$getCat[] = '<a href="'.esc_url( get_category_link( $value->term_id ) ).'">'.esc_html( $value->name ).'</a>';
			}   
		}

		return implode( ', ', $getCat );
	}
         
}


/*=======================================================
	Customize Sidebar Option Value Return
========================================================*/
function pentax_sidebar_opt(){

    $sidebarOpt = pentax_opt( 'pentax_blog_layout' );
    $sidebar = '1';
    // Blog Sidebar layout  opt
    if( is_array( $sidebarOpt ) ){
        $sidebarOpt =  $sidebarOpt;
    }else{
        $sidebarOpt =  json_decode( $sidebarOpt, true );
    }
    
    
    if( !empty( $sidebarOpt['columnsCount'] ) ){
        $sidebar = $sidebarOpt['columnsCount'];
    }


    return $sidebar;
}


/**================================================
	Themify Icon
 =================================================*/
function pentax_themify_icon(){
    return[
        'ti-home'       => 'Home',
        'ti-tablet'     => 'Tablet',
        'ti-email'      => 'Email',
        'ti-twitter'    => 'twitter',
        'ti-skype'      => 'skype',
        'ti-instagram'  => 'instagram',
        'ti-dribbble'   => 'dribbble',
        'ti-vimeo'      => 'vimeo',
    ];
}


/*===========================================================
	Set contact form 7 default form template
============================================================*/
function pentax_contact7_form_content( $template, $prop ) {
    
    if ( 'form' == $prop ) {

        $template =
            '<div class="row"><div class="col-12"><div class="form-group">[textarea* your-message id:message class:form-control class:w-100 rows:9 cols:30 placeholder "Message"]</div></div><div class="col-sm-6"><div class="form-group">[text* your-name id:name class:form-control placeholder "Enter your  name"]</div></div><div class="col-sm-6"><div class="form-group">[email* your-email id:email class:form-control placeholder "Enter your email"]</div></div><div class="col-12"><div class="form-group">[text your-subject id:subject class:form-control placeholder "Subject"]</div></div></div><div class="form-group mt-3">[submit class:button class:button-contactForm "Send Message"]</div>';

        return $template;

    } else {
    return $template;
    } 
}
add_filter( 'wpcf7_default_template', 'pentax_contact7_form_content', 10, 2 );



/*============================================================
	Pagination
=============================================================*/
function pentax_blog_pagination(){
	echo '<nav class="blog-pagination justify-content-center d-flex">';
        the_posts_pagination(
            array(
                'mid_size'  => 2,
                'prev_text' => __( '<span class="ti-angle-left"></span>', 'pentax' ),
                'next_text' => __( '<span class="ti-angle-right"></span>', 'pentax' ),
                'screen_reader_text' => ' '
            )
        );
	echo '</nav>';
}


/*=============================================================
	Blog Single Post Navigation
=============================================================*/
if( ! function_exists('pentax_blog_single_post_navigation') ) {
	function pentax_blog_single_post_navigation() {

		// Start nav Area
		if( get_next_post_link() || get_previous_post_link()   ):
			?>
			<div class="navigation-area">
				<div class="row">
					<div class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
						<?php
						if( get_next_post_link() ){
							$nextPost = get_next_post();

							if( has_post_thumbnail() ){
								?>
								<div class="thumb">
									<a href="<?php the_permalink(  absint( $nextPost->ID )  ) ?>">
										<?php echo get_the_post_thumbnail( absint( $nextPost->ID ), 'pentax_np_thumb', array( 'class' => 'img-fluid' ) ) ?>
									</a>
								</div>
								<?php
							} ?>
							<div class="arrow">
								<a href="<?php the_permalink(  absint( $nextPost->ID )  ) ?>">
									<span class="ti-arrow-left text-white"></span>
								</a>
							</div>
							<div class="detials">
								<p><?php echo esc_html__( 'Prev Post', 'pentax' ); ?></p>
								<a href="<?php the_permalink(  absint( $nextPost->ID )  ) ?>">
									<h4><?php echo wp_trim_words( get_the_title( $nextPost->ID ), 4, ' ...' ); ?></h4>
								</a>
							</div>
							<?php
						} ?>
					</div>
					<div class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
						<?php
						if( get_previous_post_link() ){
							$prevPost = get_previous_post();
							?>
							<div class="detials">
								<p><?php echo esc_html__( 'Next Post', 'pentax' ); ?></p>
								<a href="<?php the_permalink(  absint( $prevPost->ID )  ) ?>">
									<h4><?php echo wp_trim_words( get_the_title( $prevPost->ID ), 4, ' ...' ); ?></h4>
								</a>
							</div>
							<div class="arrow">
								<a href="<?php the_permalink(  absint( $prevPost->ID )  ) ?>">
									<span class="ti-arrow-right text-white"></span>
								</a>
							</div>
							<div class="thumb">
								<a href="<?php the_permalink(  absint( $prevPost->ID )  ) ?>">
									<?php echo get_the_post_thumbnail( absint( $prevPost->ID ), 'pentax_np_thumb', array( 'class' => 'img-fluid' ) ) ?>
								</a>
							</div>
							<?php
						} ?>
					</div>
				</div>
			</div>
		<?php
		endif;

	}
}


/*=======================================================
	Author Bio
=======================================================*/
function pentax_author_bio(){
	$avatar = get_avatar( absint( get_the_author_meta( 'ID' ) ), 90 );
	?>
	<div class="blog-author">
		<div class="media align-items-center">
			<?php
			if( $avatar  ) {
				echo wp_kses_post( $avatar );
			}
			?>
			<div class="media-body">
				<a href="<?php echo esc_url( get_author_posts_url( absint( get_the_author_meta( 'ID' ) ) ) ); ?>"><h4><?php echo esc_html( get_the_author() ); ?></h4></a>
				<p><?php echo esc_html( get_the_author_meta('description') ); ?></p>
			</div>
		</div>
	</div>
	<?php
}


/*===================================================
 Pentax Comment Template Callback
 ====================================================*/
function pentax_comment_callback( $comment, $args, $depth ) {

	if ( 'div' === $args['style'] ) {
		$tag       = 'div';
		$add_below = 'comment';
	} else {
		$tag       = 'li';
		$add_below = 'div-comment';
	}
	?>
	<<?php echo esc_attr( $tag ); ?> <?php comment_class( ( empty( $args['has_children'] ) ? '' : 'parent').' comment-list' ) ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
		<div id="div-comment-<?php comment_ID() ?>" class="comment-list">
	<?php endif; ?>
		<div class="single-comment">
			<div class="user d-flex">
				<div class="thumb">
					<?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
				</div>
				<div class="desc">
					<div class="comment">
						<?php comment_text(); ?>
					</div>

					<div class="d-flex justify-content-between">
						<div class="d-flex align-items-center">
							<h5 class="comment_author"><?php printf( __( '<span class="comment-author-name">%s</span> ', 'pentax' ), get_comment_author_link() ); ?></h5>
							<p class="date"><?php printf( __('%1$s at %2$s', 'pentax'), get_comment_date(),  get_comment_time() ); ?><?php edit_comment_link( esc_html__( '(Edit)', 'pentax' ), '  ', '' ); ?> </p>
							<?php if ( $comment->comment_approved == '0' ) : ?>
								<em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'pentax' ); ?></em>
								<br>
							<?php endif; ?>
						</div>

						<div class="reply-btn">
							<?php comment_reply_link(array_merge( $args, array( 'add_below' => $add_below, 'depth' => 1, 'max_depth' => 5, 'reply_text' => 'Reply' ) ) ); ?>
						</div>
					</div>

				</div>
			</div>
		</div>
	<?php if ( 'div' != $args['style'] ) : ?>
		</div>
	<?php endif; ?>
	<?php
}
// add class comment reply link
add_filter('comment_reply_link', 'pentax_replace_reply_link_class');
function pentax_replace_reply_link_class( $class ) {
	$class = str_replace("class='comment-reply-link", "class='btn-reply comment-reply-link text-uppercase", $class);
	return $class;
}



/*=========================================================
    Latest Blog Post For Elementor Section
===========================================================*/
function pentax_latest_blog( $post_num ){
    $lBlog = new WP_Query( array(
        'post_type'      => 'post',
        'posts_per_page' => $post_num
    ) );


    if( $lBlog->have_posts() ){
        while( $lBlog->have_posts() ){
			$lBlog->the_post(); ?>

            <div class="col-lg-4 col-md-6">
                <div class="single-blog">
                    <?php
                    if( has_post_thumbnail() ){
                        echo '<div class="thumb">';
                        the_post_thumbnail( 'pentax_latest_blog_360x285' );
                        echo '</div>';
                    }
                    ?>
                    <div class="short_details">
                        <div class="meta-top d-flex">
							<a href="<?php echo esc_url( pentax_blog_date_permalink() ) ?>"><i class="ti-calendar"></i><?php the_time('M j, Y') ?></a>
							<span><i class="ti-folder"></i> <?php echo pentax_featured_post_cat(); ?></span>
                        </div>
                        <a class="d-block" href="<?php the_permalink(); ?>">
                            <h4><?php the_title(); ?></h4>
                        </a>
                        <p><?php echo wp_trim_words( get_the_content(), 15, '' ); ?></p>
                        <a class="read-more" href="<?php the_permalink(); ?>"><?php echo esc_html__( 'read more', 'pentax' ); ?><i class="ti-angle-double-right"></i></a>
                    </div>
                </div>
            </div>

        <?php
        }

    }

}



/*=========================================================
    Share Button Code
===========================================================*/
function pentax_social_sharing_buttons( $ulClass = '', $tagLine = '' ) {

	// Get page URL
	$URL = get_permalink();
	$Sitetitle = get_bloginfo('name');

	// Get page title
	$Title = str_replace( ' ', '%20', get_the_title());

	// Construct sharing URL without using any script
	$twitterURL = 'https://twitter.com/intent/tweet?text='.esc_html( $Title ).'&amp;url='.esc_url( $URL ).'&amp;via='.esc_html( $Sitetitle );
	$faceportfolioURL= 'https://www.faceportfolio.com/sharer/sharer.php?u='.esc_url( $URL );
	$linkedin   = 'https://www.linkedin.com/shareArticle?mini=true&url='.esc_url( $URL ).'&title='.esc_html( $Title );
	$pinterest  = 'http://pinterest.com/pin/create/button/?url='.esc_url( $URL ).'&description='.esc_html( $Title );;

	// Add sharing button at the end of page/page content
	$content = '';
	$content  .= '<ul class="'.esc_attr( $ulClass ).'">';
	$content .= $tagLine;
	$content .= '<li><a href="' . esc_url( $twitterURL ) . '" target="_blank"><i class="ti-twitter-alt"></i></a></li>';
	$content .= '<li><a href="' . esc_url( $faceportfolioURL ) . '" target="_blank"><i class="ti-faceportfolio"></i></a></li>';
	$content .= '<li><a href="' . esc_url( $pinterest ) . '" target="_blank"><i class="ti-pinterest"></i></a></li>';
	$content .= '<li><a href="' . esc_url( $linkedin ) . '" target="_blank"><i class="ti-linkedin"></i></a></li>';
	$content .= '</ul>';

	return $content;

}



/*================================================
	Projects Return data 
================================================ */
function return_tab_data( $getTags, $menu_tabs ) {
	$y = [];
	foreach ( $getTags as $val ) {

		$t = [];

		foreach( $menu_tabs as $data ) {
			if( $data['label'] == $val ) {
				$t[] = $data;
			}
		}

		$y[$val] = $t;

	}

	return $y;
}


/*================================================
    Portfolio Custom Post
================================================*/
function pentax_portfolio() {
	$labels = array(
		'name'               => _x( 'Portfolios', 'post type general name', 'pentax' ),
		'singular_name'      => _x( 'Portfolio', 'post type singular name', 'pentax' ),
		'menu_name'          => _x( 'Portfolios', 'admin menu', 'pentax' ),
		'name_admin_bar'     => _x( 'Portfolio', 'add new on admin bar', 'pentax' ),
		'add_new'            => _x( 'Add New', 'portfolio', 'pentax' ),
		'add_new_item'       => __( 'Add New Portfolio', 'pentax' ),
		'new_item'           => __( 'New Portfolio', 'pentax' ),
		'edit_item'          => __( 'Edit Portfolio', 'pentax' ),
		'view_item'          => __( 'View Portfolio', 'pentax' ),
		'all_items'          => __( 'All Portfolios', 'pentax' ),
		'search_items'       => __( 'Search Portfolios', 'pentax' ),
		'parent_item_colon'  => __( 'Parent Portfolios:', 'pentax' ),
		'not_found'          => __( 'No portfolios found.', 'pentax' ),
		'not_found_in_trash' => __( 'No portfolios found in Trash.', 'pentax' )
	);

	$args = array(
		'labels'             => $labels,
		'description'        => __( 'Description.', 'pentax' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'portfolio' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'comments' )
	);

	register_post_type( 'portfolio', $args );


	$labels = array(
		'name'              => _x( 'Portfolio Category', 'taxonomy general name', 'pentax' ),
		'singular_name'     => _x( 'Portfolio Categories', 'taxonomy singular name', 'pentax' ),
		'search_items'      => __( 'Search Portfolio Categories', 'pentax' ),
		'all_items'         => __( 'All Portfolio Categories', 'pentax' ),
		'parent_item'       => __( 'Parent Portfolio Category', 'pentax' ),
		'parent_item_colon' => __( 'Parent Portfolio Category:', 'pentax' ),
		'edit_item'         => __( 'Edit Portfolio Category', 'pentax' ),
		'update_item'       => __( 'Update Portfolio Category', 'pentax' ),
		'add_new_item'      => __( 'Add New Portfolio Category', 'pentax' ),
		'new_item_name'     => __( 'New Portfolio Category Name', 'pentax' ),
		'menu_name'         => __( 'Portfolio Category', 'pentax' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'portfolio-cat' ),
	);

	register_taxonomy( 'portfolio-cat', array( 'portfolio' ), $args );
	
	
	
}
add_action( 'init', 'pentax_portfolio' );


/*======================================================
    Recent Portfolio for Single Page
=======================================================*/
function pentax_recent_portfolio(){

	$sec_title    = !empty( pentax_opt( 'portfolio_recent_post_section_title' ) ) ? pentax_opt( 'portfolio_recent_post_section_title' ) : '';
	$sec_subtitle = !empty( pentax_opt( 'portfolio_recent_post_section_subtitle' ) ) ? pentax_opt( 'portfolio_recent_post_section_subtitle' ) : '';
    $pnumber      = !empty( pentax_opt( 'portfolio_recent_post_number' ) ) ? pentax_opt( 'portfolio_recent_post_number' ) : '';

	$recentPortfolio = new WP_Query( array(
        'post_type' => 'portfolio',
        'posts_per_page'    => $pnumber,

    ) );

    ?>
    <section class="portfolio_area recent-portfolio" id="portfolio">
        <div class="container">
            <div class="area-heading">
                <?php
                if( $sec_title ){
                    echo '<h3>'. wp_kses_post( $sec_title ) .'</h3>';
                }

                if( $sec_subtitle ){
                    echo '<p>'. esc_html( $sec_subtitle ) .'</p>';
                }
                ?>
            </div>

            <div class="filters-content">
                <div class="row portfolio-grid">
                    <div class="grid-sizer col-md-3 col-lg-4"></div>
                    <?php
                    if( $recentPortfolio->have_posts() ){
                        while ( $recentPortfolio->have_posts() ){
	                        $recentPortfolio->the_post(); ?>
                                <div class="col-lg-4 col-md-6 all fashion motion">
                                    <div class="single_portfolio">
                                        <?php
                                        if( has_post_thumbnail() ){
                                            the_post_thumbnail( 'pentax_recent_360x380', array( 'class' => 'img-fluid w-100' ) );
                                        }
                                        ?>
                                        <div class="short_info">
                                            <?php
                                            $categories = get_the_terms( get_the_ID(), "portfolio-cat");
                                            foreach ( $categories as $category ){
                                                echo '<p>'. $category->name .'</p>';
                                            }
                                            ?>
                                            <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                        </div>
                                    </div>
                                </div>
                            <?php
                        }
                    }

                    ?>
                </div>
            </div>
        </div>
    </section>

<?php
}


/*=========================================================
    Portfolio Section
========================================================*/
function pentax_portfolio_section( $pNumber ){
    ?>
    <div class="filters portfolio-filter">
        <ul>
            <li class="active" data-filter="*">all</li>
                <?php
                $categories = get_terms(
                    array(
                        'taxonomy' => 'portfolio-cat',
                        'hide_empty' => false
                    )
                );
                foreach ( $categories as $category ) {
	                echo '<li data-filter=".'. esc_attr( $category->name ) .'">'. esc_html( $category->name ) .'</li>';
                }

            ?>
        </ul>
    </div>

    <div class="filters-content">
        <div class="row portfolio-grid">
            <div class="grid-sizer col-md-3 col-lg-4"></div>
            <?php
            $portfolios = new WP_Query( array(
                'post_type' => 'portfolio',
                'posts_per_page'=> $pNumber,

            ) );

            if( $portfolios->have_posts() ) {
	            while ( $portfolios->have_posts() ) {
	                $portfolios->the_post();
	                $terms = get_the_terms( get_the_ID(), 'portfolio-cat' );

	                $img_size = get_post_meta( get_the_ID(), 'portfolio-grid', true );
	                if( $img_size == 1 ){
	                    $image_size = 'portfolio_360x350';
		                $wrapClass  = 'col-lg-4 col-md-6';
                    }
	                elseif ( $img_size == 2 ) {
		                $image_size = 'portfolio_750x900';
		                $wrapClass  = 'col-lg-8 col-md-6';
	                }
	                elseif ( $img_size == 3 ){
	                    $image_size = 'portfolio_360x520';
		                $wrapClass  = 'col-lg-4 col-md-6';
                    }
	                elseif ( $img_size == 4 ){
	                    $image_size = 'portfolio_750x400';
	                    $wrapClass  = 'col-lg-8 col-md-6';
                    }
	                elseif ( $img_size == 5 ){
	                    $image_size = 'portfolio_360x400';
	                    $wrapClass  = 'col-lg-4 col-md-6';
                    }
		            ?>
                    <div class="all <?php echo esc_attr( $wrapClass ).' '.  esc_attr( $terms[0]->name ); ?>">
                        <div class="single_portfolio">
                            <?php
                            the_post_thumbnail( $image_size );
                            ?>

                            <div class="short_info">
                                <p><?php echo esc_attr( $terms[0]->name ) ?></p>
                                <h4><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h4>
                            </div>
                        </div>
                    </div>
		            <?php
	            }
            } ?>
        </div>
    </div>
    <?php
}


/*==========================================================
 *  Flaticon Icon List
=========================================================*/
function pentax_flaticon_list(){
    return(
        array(
            'flaticon-leaf'     => 'Leaf',
            'flaticon-send'     => 'Send',
            'flaticon-camera'   => 'Camera',
            'flaticon-balloon'  => 'Balloon'
        )
    );
}

