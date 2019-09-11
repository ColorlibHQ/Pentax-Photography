<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <!-- For Resposive Device -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>


    <header class="header_area">
        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="header_logo">
		                <?php
		                echo pentax_theme_logo( 'navbar-brand logo_h' );
		                ?>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <?php
                    if(has_nav_menu('primary-menu')) {
                        wp_nav_menu(array(
                            'menu'           => 'primary-menu',
                            'theme_location' => 'primary-menu',
                            'menu_id'        => 'menu-main-menu',
                            'container_class'=> 'collapse navbar-collapse offset',
                            'container_id'   => 'navbarSupportedContent',
                            'menu_class'     => 'nav navbar-nav menu_nav ml-auto',
                            'walker'         => new pentax_bootstrap_navwalker,
                            'depth'          => 3
                        ));
                    }


                    // Search Icon
                    $searchIcon = pentax_opt( 'pentax_hsearchform_toggle' );
                    if( $searchIcon == 1 ) {
	                    ?>
                        <div class="right-button">
                            <ul>
                                <li><a id="search" href="javascript:void(0)"><i class="ti-search"></i></a></li>
                            </ul>
                        </div>
	                    <?php
                    }
                    ?>
                </div>
            </nav>

        </div>
        <?php
        if( $searchIcon == 1 ) {
            ?>
            <div class="search_input" id="search_input_box">
                <div class="container ">
                    <form class="d-flex justify-content-between search-inner" action="<?php echo esc_url( site_url( '/' ) ); ?>">
                        <input type="text" class="form-control" id="search_input" name="s" placeholder="<?php echo esc_html__( 'Search Here', 'pentax' )?>">
                        <button type="submit" class="btn"></button>
                        <span class="ti-close" id="close_search" title="Close Search"></span>
                    </form>
                </div>
            </div>
            <?php
        } ?>
    </header>


    <?php
    //Page Title Bar
    if( function_exists( 'pentax_page_titlebar' ) ){
	    pentax_page_titlebar();
    }

