<?php
/**
 * Description: Default Archive Page
 *
 * @package WordPress
 * @subpackage Bootpresswp
 * @since Bootpresswp 0.1
 *
 * Last Revised: Sep 07, 2015
 */
global $childDir;
get_header(); ?>
<?php if (have_posts() ) : ; ?>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h1><?php printf( __( 'Search Results for: %s', 'bootpresswp' ), '<small>' . get_search_query() . '</small>' ); ?></h1>
                    <?php while ( have_posts() ) : the_post(); ?>
                    <a href="<?php the_permalink(); ?>" title="<?php the_title();?>"><h3><?php the_title();?></h3></a>
                    <?php the_excerpt();?>
                    <?php endwhile; ?>
                </div>
                <div class="col-md-4"><?php get_sidebar('post'); ?></div>
            </div>         
        </div>
<?php else: ?>
         <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="jumbotron">
                        <h1><?php _e( 'No Results Found', 'bootpresswp' ); ?></h1>
                        <p><?php _e( 'Perhaps you should try again with a different search term.', 'bootpresswp' ); ?></p>
                        <p><a class="btn btn-primary btn-lg" role="button" href="<?php echo home_url( '/' ); ?>">Return to Home</a></p>
                    </div>
                    <?php get_search_form(); ?>
                </div>
                <div class="col-md-4"><?php get_sidebar('post'); ?></div>
            </div>         
        </div>
<?php endif ;?>
<?php get_footer(); ?>