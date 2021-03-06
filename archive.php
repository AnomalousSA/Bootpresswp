<?php
/**
 * Description: Default Archive Page
 *
 * @package WordPress
 * @subpackage Bootpresswp
 * @since Bootpresswp 0.1
 *
 * Last Revised: Jul 15, 2016
 */

get_header(); ?>
<?php if (have_posts() ) ; ?>
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <?php if(function_exists('bootpresswp_breadcrumbs')) : bootpresswp_breadcrumbs(); endif; ?>
                    <h1><?php
                    if ( is_day() ) {
                        printf( __( 'Daily Archives: %s', 'bootpresswp' ), '<small>' . get_the_date() . '</small>' );
                    } elseif ( is_month() ) {
                        printf( __( 'Monthly Archives: %s', 'bootpresswp' ), '<small>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'bootpresswp' ) ) . '</small>' );
                    } elseif ( is_year() ) {
                        printf( __( 'Yearly Archives: %s', 'bootpresswp' ), '<small>' . get_the_date( _x( 'Y', 'yearly archives date format', 'bootpresswp' ) ) . '</span>' );
                    } elseif ( is_author() ) {
                        printf( __( 'Author Archives: %s', 'bootpresswp' ), '<small>' . get_the_author() . '</small>' );
                    } elseif ( is_tag() ) {
                        printf( __( 'Tag Archives: %s', 'bootpresswp' ), '<small>' . single_tag_title( '', false ) . '</small>' );
                        // Show an optional tag description
                        $tag_description = tag_description();
                        if ( $tag_description ) {
                            echo apply_filters( 'tag_archive_meta', '<div class="tag-archive-meta">' . $tag_description . '</div>' );
                        }
                    } elseif ( is_category() ) {
                        printf( __( 'Category Archives: %s', 'bootpresswp' ), '<small>' . single_cat_title( '', false ) . '</small>' );
                        $category_description = category_description();
                        if ( $category_description ) {
                            echo apply_filters( 'category_archive_meta', '<div class="category-archive-meta">' . $category_description . '</div>' );
                        }     
                    } else {
                    _e( 'Blog Archives', 'bootpresswp' );
                    }
                    ?></h1>
                    <?php while ( have_posts() ) : the_post(); ?>
                        <div <?php post_class(); ?>>
                            <a href="<?php the_permalink(); ?>" title="<?php the_title();?>"><h3><?php the_title();?></h3></a>
                            <?php the_excerpt();?>
                        </div>
                    <?php endwhile; ?>
                    <?php
  if ( function_exists('wp_bootstrap_pagination') )
    wp_bootstrap_pagination();
?>
                </div>
                <div class="col-sm-4"><?php get_sidebar('post'); ?></div>
            </div>         
        </div>
<?php get_footer();