<?php

/**
 * Default Footer
 *
 * @package WordPress
 * @subpackage Bootpresswp
 * @since Bootpresswp 0.1
 *
 * Last Revised: Sep 07, 2015
 */
global $childDir;
?>
        <footer class="container">
            <div class="row">
                <hr>
                <div class="col-sm-6"><p><small>&copy; Anomalous, Bootpresswp</small></p></div>
                <div class="col-sm-6">
                    <?php
                    wp_nav_menu( array(
                        //'menu'              => 'main-menu',
                        'theme_location'    => 'footer-menu',
                        'depth'             => 1,
                        'container'         => 'div',
                        'container_class'   => 'footer-nav',
                        'container_id'      => 'footer-nav',
                        'menu_class'        => 'nav nav-pills',
                        'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                        'walker'            => new wp_bootstrap_navwalker())
                        );
                    ?>     
                </div>
            </div>
        </footer>
        <?php wp_footer(); ?>
    </body>
</html>