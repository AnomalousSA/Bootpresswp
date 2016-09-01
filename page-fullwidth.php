<?php
/**
 * Template Name: Full Width
 * Description: Default Index template to display loop of blog posts
 *
 * @package WordPress
 * @subpackage Bootpresswp
 * @since Bootpresswp 0.1
 *
 * Last Revised: Aug 26, 2016
 */
global $childDir;
get_header(); ?>
        <article class="container" itemscope itemtype="http://schema.org/BlogPosting">
            <meta itemscope itemprop="mainEntityOfPage" itemType="https://schema.org/WebPage" itemid="<?php the_permalink();?>">
            <div class="row">
                <div class="col-sm-12">
                    <?php while ( have_posts() ) : the_post(); ?>
                    <?php if(function_exists('bootpresswp_breadcrumbs')) : bootpresswp_breadcrumbs(); endif; ?>
                    <h1><?php the_title();?></h1>
                    <div class="post-content" itemprop="articleBody">
                    <?php the_content(); ?>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>         
        </article>
<?php get_footer();