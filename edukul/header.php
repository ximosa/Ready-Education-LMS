<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="mobi-overlay"><span class="close"></span></div>
<div id="wrapper" style="<?php echo esc_attr( edukul_element_bg_css( 'wrapper_background_img' ) ); ?>">
	<?php 
	if ( edukul_get_mod( 'header_search_icon', false ) )
		echo edukul_header_search(); ?>
	
    <div id="page" class="clearfix <?php echo esc_attr( edukul_preloader_class() ); ?>">
    	<div id="site-header-wrap">
			<!-- Top Bar -->
		    <?php get_template_part( 'templates/top'); ?>
		    
			<!-- Header -->
			<header id="site-header" style="<?php echo esc_attr( edukul_header_style() ); ?>">
	            <div id="site-header-inner" class="edukul-container">
	            	<div class="wrap-inner">
				        <?php
				        // Get Header logo
				        get_template_part( 'templates/header-logo' );

				        // Get Header nav
				        get_template_part( 'templates/header-nav' ); ?>
			        </div>
	            </div><!-- /#site-header-inner -->
			</header><!-- /#site-header -->
		</div><!-- /#site-header-wrap -->

		<?php get_template_part( 'templates/featured-title'); ?>

        <!-- Main Content -->
        <div id="main-content" class="site-main clearfix" style="<?php echo esc_attr( edukul_main_content_bg() ); ?>">