<?php

/**
 * Default Footer
 *
 * @package WordPress
 * @subpackage Bootpresswp
 * @since Bootpresswp 0.1
 *
 * Last Revised: Aug 26, 2016
 */
?>
        <footer class="container" itemscope itemtype="http://schema.org/WPFooter">
            <div class="row">
                <hr>
                <div class="col-sm-6"><p class="footer-copyright"><small>&copy; <?php echo date('Y') ?> <?php bloginfo('name');?> - All Rights Reserved</small></p></div>
                <div class="col-sm-6">
                    <nav role="navigation" class="footer-menu" aria-label="Navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
                    <?php get_template_part('template-parts/organisms/menu', 'footer');?>
                    </nav>
                </div>
            </div>
        </footer>
        <?php wp_footer(); ?>
    </body>
</html>