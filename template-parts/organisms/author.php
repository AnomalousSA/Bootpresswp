<?php
/**
 * Author Template
 *
 * @package WordPress
 * @subpackage Bootpresswp
 * @since Bootpresswp 0.1
 *
 * Last Revised: Sep 1, 2016
 */
?>
<div itemscope itemtype="http://schema.org/NewsArticle">
    <meta itemscope itemprop="mainEntityOfPage"  itemType="https://schema.org/WebPage" itemid="https://google.com/article"/>
    <h2 itemprop="headline">Article headline</h2>
    <h3 itemprop="author" itemscope itemtype="https://schema.org/Person">
        By <span itemprop="name">John Doe</span>
    </h3>
    <span itemprop="description">A most wonderful article</span>
    <div itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
        <img src="https://google.com/thumbnail1.jpg"/>
        <meta itemprop="url" content="https://google.com/thumbnail1.jpg">
        <meta itemprop="width" content="800">
        <meta itemprop="height" content="800">
    </div>
    <div itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
        <div itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
            <img src="https://google.com/logo.jpg"/>
            <meta itemprop="url" content="https://google.com/logo.jpg">
            <meta itemprop="width" content="600">
            <meta itemprop="height" content="60">
        </div>
        <meta itemprop="name" content="Google">
    </div>
    <meta itemprop="datePublished" content="2015-02-05T08:00:00+08:00"/>
    <meta itemprop="dateModified" content="2015-02-05T09:20:00+08:00"/>
</div>