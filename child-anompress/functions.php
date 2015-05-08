<?php
/**
 *
 * @package WordPress
 * @subpackage Anompress Child Theme
 * @since Anompress 0.1
 *
 * Last Updated: March 11, 2014
 */

function remove_scripts()
{
wp_deregister_script('anompress-script' );
wp_deregister_style('anompress-style' );
}
add_action( 'wp_enqueue_scripts', 'remove_scripts',100 );

function child_anompress_loader() {
wp_enqueue_style( 'child-anompress-style', get_stylesheet_directory_uri().'/assets/css/style.css', false , '1.0', 'all' );
wp_enqueue_script( 'child-anompress-script', get_stylesheet_directory_uri() .'/assets/js/script.js', array( 'jquery' ), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'child_anompress_loader', 200 );


 ?>