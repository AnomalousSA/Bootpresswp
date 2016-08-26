<?php
/**
 * Template Name: Full Width
 * Description: Default Index template to display loop of blog posts
 *
 * @package WordPress
 * @subpackage Bootpresswp
 * @since Bootpresswp 0.1
 *
 * Last Revised: Jul 15, 2016
 */
global $childDir;
get_header(); ?>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <?php while ( have_posts() ) : the_post(); ?>
                    <?php if(function_exists('bootpresswp_breadcrumbs')) : bootpresswp_breadcrumbs(); endif; ?>
                    <h1><?php the_title();?></h1>
                    <?php the_content();?>
                    <?php endwhile; ?>
                </div>
            </div>         
        </div>
<?php get_footer();