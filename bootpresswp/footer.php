<?php

/**
 * Default Footer
 *
 * @package WordPress
 * @subpackage Bootpresswp
 * @since Bootpresswp 0.1
 *
 * Last Revised: May 14, 2015
 */
$options = get_option( 'my_option_name' );
global $childDir;
?>
        <footer class="container">
            <div class="row">
                <hr>
                <div class="col-md-12"><p><small><?php echo $options['footer_print'];?></small></p></div>
            </div>
        </footer>
        <?php wp_footer(); ?>
    </body>
</html>