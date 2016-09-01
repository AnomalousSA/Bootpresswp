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
<a class="logo" href="<?php echo home_url('/'); ?>" itemprop="publisher" itemscope itemtype="https://schema.org/Organization">

    <link itemprop="url" href="<?php echo home_url('/'); ?>" />

    <figure itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">

        <!-- TODO: change this to responsive svg once we have the logo -->
        <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="<?php bloginfo('name'); ?>" width="231" height="60" class="logo-image">

        <meta itemprop="url" content="<?php echo get_template_directory_uri(); ?>/img/logo.png">
        <meta itemprop="width" content="131">
        <meta itemprop="height" content="60">
    </figure>

    <span class="logo-company" itemprop="name">
        <?php bloginfo('name'); ?>
    </span>
    <small class="logo-description" itemprop="description">
        <?php bloginfo('description'); ?>
    </small>

</a>