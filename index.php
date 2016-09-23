<?php
/**
 *
 * Description: Default Index template to display loop of blog posts
 *
 * @package WordPress
 * @subpackage Bootpresswp
 * @since Bootpresswp 0.1
 *
 * Last Revised: Jul 15, 2016
 */
get_header(); ?>
        <article class="container" itemscope itemtype="http://schema.org/BlogPosting">
            <meta itemscope itemprop="mainEntityOfPage" itemType="https://schema.org/WebPage" itemid="<?php the_permalink();?>">
            <div class="row">
                <div class="col-sm-8">
                    <?php while ( have_posts() ) : the_post(); ?>
                    <?php if(function_exists('bootpresswp_breadcrumbs')) : bootpresswp_breadcrumbs(); endif; ?>
                    <h1><?php the_title();?></h1>
                    <?php get_template_part('template-parts/organisms/post', 'meta');?>
                    <div class="post-content" itemprop="articleBody">
                    <?php
                        if ( has_post_thumbnail() ) { 
                        the_post_thumbnail();
                        }
                    ?>
                    <?php the_content(); ?>
                    </div>
                    <?php the_tags( '<p>Tags: ', ', ', '</p>'); ?>
                    <?php endwhile;?>
                    <?php comments_template(); ?>
                </div>              
                <div class="col-sm-4" itemscope itemtype="WPSidebar"><?php get_sidebar('post'); ?></div>
            </div>         
        </article>
<?php get_footer();