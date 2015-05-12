<?php
/**
 * Default Post Template
 *
 * @package WordPress
 * @subpackage Anompress
 * @since Bootpress 0.1
 *
 * Last Revised: May 08, 2015
 */
get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <?php if(function_exists('bootpress_breadcrumbs')) bootpress_breadcrumbs(); ?>
                    <h1><?php the_title();?></h1>
                    <p class="meta"><?php echo bootpress_posted_on();?></p>
                    <?php the_content();?>
                    <?php the_tags( '<p>Tags: ', ', ', '</p>'); ?>
                    <?php endwhile; // end of the loop. ?>
                    <?php comments_template(); ?>
                </div>              
                <div class="col-md-4"><?php get_sidebar(); ?></div>
            </div>         
        </div> <!-- /container -->
<?php get_footer(); ?>