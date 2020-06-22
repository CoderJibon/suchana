<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package coderjibon
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="<?php echo get_template_directory_uri(); ?>/image/x-icon" href="images/favicon.png">
 <?php wp_head(); ?>
</head>
<body class="home-default " <?php body_class(); ?>>

    <!--PRELOADER-->
    <div id="preloader">
        <div id="status"></div>
    </div>
   
     <header id="inner-navigation">
        <!-- navbar start -->
        <nav class="navbar navbar-default navbar-fixed-top navbar-sticky-function navbar-arrow">

            <div class="container">
                <div class="logo pull-left">
                    <h1><a href="<?php echo home_url(); ?>">
                        <?php 
                            $bimg = get_option('_prefix_my_options');
                        ?>
                        <?php if ($bimg['brand_logo']['url']): ?>
                            <img src="<?php  echo isset($bimg['brand_logo']['url']) ? $bimg['brand_logo']['url'] : null; ?>">
                        <?php else: ?>
                             <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png">
                        <?php endif ?>
                       </a>
                   </h1>
                </div>
                
                <div id="navbar" class="navbar-nav-wrapper navbar-right ii">
                    <?php 
                            wp_nav_menu([
                                'theme_location'    => 'main-menu',
                                'container'         => ' ',
                                'menu_class'        => 'nav navbar-nav ',
                                'menu_id'           => 'responsive-menu',
                                'fallback_cb'       => 'menu_empty',
                                'walker'            => new Main_nav_walker()
                            ]);
                     ?>

                    <?php 
                            $bimg = get_option('_prefix_my_options');
                            $sval = isset($bimg['secarch-opt']) ? $bimg['secarch-opt'] : null;
                          
                    ?>
                    <?php if ( $sval == 1): ?>
                    <ul class="nav navbar-nav  " id="responsive-menu">
                        <li><a href="#search" class="mt_search"><i class="fa fa-search"></i></a>
                        </li>
                    </ul> 
                    <?php endif ?>
                </div>
                
            </div>
            
            <div id="slicknav-mobile"></div>
        </nav>
        <!-- navbar end -->
    </header>
























