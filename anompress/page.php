<?php
/**
 * Template Name: Default Page
 * Description: Default Index template to display loop of blog posts
 *
 * @package WordPress
 * @subpackage Monstrosity
 * @since Monstrosity 0.1
 *
 * Last Revised: Dec 12, 2013
 */
get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <?php if(function_exists('anompress_breadcrumbs')) anompress_breadcrumbs(); ?>
                    <h1><?php the_title();?></h1>
                    <?php the_content();?>
                </div>
                <?php endwhile; // end of the loop. ?>
                <div class="col-md-4"><?php get_sidebar(); ?></div>
            </div>         
        </div> <!-- /container -->
<?php get_footer(); ?>