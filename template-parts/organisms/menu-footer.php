<?php

/**
 * Menu Footer
 *
 * @package WordPress
 * @subpackage Bootpresswp
 * @since Bootpresswp 0.1
 *
 * Last Revised: Sep 1, 2016
 */
wp_nav_menu(array(
    'theme_location' => 'footer-menu',
    'depth' => 1,
    'container' => null,
    'menu_class' => 'nav nav-pills',
    'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
    'walker' => new wp_bootstrap_navwalker())
);
