<?php
/**
 *
 * @package WordPress
 * @subpackage Bootpresswp
 * @since Bootpresswp 0.1
 *
 * Last Updated: Aug 24, 2015
 */

function remove_scripts()
{
wp_deregister_script('bootpresswp-script' );
wp_deregister_style('bootpresswp-style' );
}
add_action( 'wp_enqueue_scripts', 'remove_scripts',100 );

function child_bootpresswp_loader() {
wp_enqueue_style( 'child-bootpresswp-style', get_stylesheet_directory_uri().'/assets/css/style.css', false , '1.0', 'all' );
wp_enqueue_script( 'child-bootpresswp-script', get_stylesheet_directory_uri() .'/assets/js/script.js', array( 'jquery' ), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'child_bootpresswp_loader', 200 );


 ?>