<?php
/**
 * Template Name: Woocomerce Template
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
        <div class="container" itemscope itemtype="http://schema.org/BlogPosting">
            <meta itemscope itemprop="mainEntityOfPage" itemType="https://schema.org/WebPage" itemid="<?php the_permalink();?>">
            <div class="row">
                <div class="col-sm-8">
                    <?php if(function_exists('bootpresswp_breadcrumbs')) : bootpresswp_breadcrumbs(); endif; ?>
                    <?php woocommerce_content(); ?>
                </div>
                <div class="col-sm-4" itemscope itemtype="WPSidebar"><?php get_sidebar('page'); ?></div>
            </div>         
        </div>
<?php get_footer();