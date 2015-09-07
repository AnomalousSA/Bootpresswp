<?php
/**
 * Template Name: Default Page
 * Description: Default Index template to display loop of blog posts
 *
 * @package WordPress
 * @subpackage Bootpresswp
 * @since Bootpresswp 0.1
 *
 * Last Revised: Sep 07, 2015
 */
global $childDir;
get_header(); ?>
    <?php while ( have_posts() ) : the_post(); ?>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <?php if(function_exists('bootpresswp_breadcrumbs')) bootpresswp_breadcrumbs(); ?>
                    <h1><?php the_title();?></h1>
                    <?php the_content();?>
                </div>
                <?php endwhile; ?>
                <div class="col-md-4"><?php get_sidebar('page'); ?></div>
            </div>         
        </div>
<?php get_footer(); ?>