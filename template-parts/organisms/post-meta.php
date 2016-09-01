<?php

/**
 * Post Meta Template
 *
 * @package WordPress
 * @subpackage Bootpresswp
 * @since Bootpresswp 0.1
 *
 * Last Revised: Aug 26, 2016
 */
?>
<div class="post-meta">

    <div itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
        <figure itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
            <meta itemprop="url" content="<?php echo get_template_directory_uri() ?>/assets/img/logo.png">
            <meta itemprop="width" content="100">
            <meta itemprop="height" content="60">
        </figure>
        <meta itemprop="name" content="<?php bloginfo('name'); ?>">
        <link itemprop="url" href="<?php echo home_url('/'); ?>" />

        <span itemscope itemtype="http://schema.org/Organization">
            <link itemprop="url" href="http://www.your-company-site.com">
            <link itemprop="sameAs" href="http://www.facebook.com/your-company">
            <link itemprop="sameAs" href="http://www.twitter.com/YourCompany">
        </span>

    </div>

    <span class="page-author" itemprop="author"><?php the_author() ?></span>

    <time itemprop="datePublished" content="<?php echo get_the_date("Y-m-d\TH:i:s") ?>"><?php the_date() ?></time>

    <time itemprop="dateModified" content="<?php echo get_the_modified_date("Y-m-d\TH:i:s") ?>"><?php the_modified_date(); ?></time>

</div>