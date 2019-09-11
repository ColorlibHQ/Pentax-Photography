<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package pentax
 */

get_header();
$clientName  = get_post_meta( get_the_ID(), 'client_name', true );
$projectDate = get_post_meta( get_the_ID(), 'project_date', true );
$starReview  = get_post_meta( get_the_ID(), 'project_review', true );

?>

    <section class="portfolio_details_area">
        <div class="container">
            <div class="portfolio_details_inner">
                <div class="row">
                    <?php
                    if( has_post_thumbnail() ) {
	                    ?>
                        <div class="col-md-12 offset-md-0 offset-lg-1 col-lg-10">
                            <div class="project_image">
                                <?php
                                the_post_thumbnail( 'pentax_950x500', array( 'class' => 'img-fluid' ) );
                                ?>

                            </div>
                        </div>
	                    <?php
                    } ?>
                    <div class="col-md-7 offset-lg-1 col-lg-6 portfolio_content">
                        <?php
                        if( have_posts() ){
                            while ( have_posts() ){
                                the_post();
                                the_content();
                            }
                        }
                        ?>
                    </div>
                    <div class="col-md-5 col-lg-4">
                        <div class="portfolio_right_text mt-30">

                            <h4><?php echo esc_html__( 'Project Details', 'pentax' ) ?></h4>
                            <ul class="list">
	                            <?php
	                            if( !empty( $clientName ) ){
		                            echo '<li>'. esc_html__( 'Client:', 'pentax' ) .'<span>'. esc_html( $clientName ) .'</span></li>';
	                            }

	                            $categories = get_the_terms( get_the_ID(), "portfolio-cat");
	                            foreach ( $categories as $category ){
		                            echo '<li>'. esc_html__( 'Category:', 'pentax' ).'<span>'.  $category->name .'</span></li>';
	                            }

	                            if( !empty( $clientName ) ){
		                            echo '<li>'. esc_html__( 'Date:', 'pentax' ) .'<span>'. esc_html( $projectDate ) .'</span></li>';
	                            }

	                            if( !empty( $starReview ) ){
	                                echo ' <li>'. esc_html__( 'Rating: ', 'pentax' ) .' <span>';
		                            for ($i = 1; $i <= 5; $i++) {

			                            if ($starReview >= $i) {
				                            echo '<i class="fa fa-star"></i>';
			                            } else {
				                            echo '<i class="fa fa-star-o"></i>';
			                            }
		                            }
		                            echo '</span></li>';
                                }
	                            ?>
                            </ul>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>

    <?php
    if( pentax_opt('pentax_portfolio_single_rp') == 1 ) {
	    // Portfolio Recent Post
	    if ( function_exists( 'pentax_recent_portfolio' ) ) {
		    pentax_recent_portfolio();
	    }
    }


// Footer============
get_footer();