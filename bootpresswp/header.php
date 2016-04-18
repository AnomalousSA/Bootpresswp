<?php
/**
 * Default Page Header
 *
 * @package WordPress
 * @subpackage Bootpresswp
 * @since Bootpresswp 0.1
 *
 * Last Revised: Apr 18, 2016
 */
global $childDir;
$childDir = dirname(get_bloginfo('stylesheet_url'));
?><!DOCTYPE html>
<!-- Bootpresswp -->
<!-- http://bootpresswp.anomalous.co.za -->
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <?php wp_head(); ?>
    <!--[if lt IE 9]>
        <script src="<?php print $childDir; ?>/assets/js/vendor/html5shiv.min.js"></script>
        <script src="<?php print $childDir; ?>/assets/js/vendor/respond.min.js"></script>
    <![endif]-->
</head>
<body <?php body_class(''); ?>>
    <div class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo home_url( '/' ); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a>
            </div>
            <?php
                wp_nav_menu( array(
                    //'menu'              => 'main-menu',
                    'theme_location'    => 'main-menu',
                    'depth'             => 2,
                    'container'         => 'div',
                    'container_class'   => 'collapse navbar-collapse',
                    'container_id'      => 'bs-example-navbar-collapse-1',
                    'menu_class'        => 'nav navbar-nav',
                    'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                    'walker'            => new wp_bootstrap_navwalker())
                );
            ?>               
        </div>
    </div>