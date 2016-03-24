Bootpresswp
=================

## Bootstrap WordPress starter theme

This is a base theme used to create custom WordPress themes. It should be used as a start for your own Custom Bootstrap theme.
Best practice is to do all custom development in a Child Theme. The child theme has been included.

View Example Site [bootpresswp.anomalous.co.za](http://bootpresswp.anomalous.co.za)

Version: 1.3.2

## How to Install

Manual installation:

1. Upload the `bootpresswp` and `child-bootpresswp` folder to the `/wp-content/themes/` directory

Installation using "Add New Theme"

1. From your Admin UI (Dashboard), use the menu to select Themes -> Add New
2. Search for 'bootpresswp'
3. Install and Activate Theme
4. Search for 'bootpresswp child theme'
5. Install and Activate child theme

Activation and Use

1. Activate the Theme through the 'Themes' menu in WordPress
2. See Appearance -> Bootpresswp Press Options for Theme Options

## Special Functions

To include pagination in your theme templates.

```php
<?php
  if ( function_exists('wp_bootstrap_pagination') )
    wp_bootstrap_pagination();
?>
```
To Include breadcrumbs, there are two different codes bases available.
```php
<?php 
    if(function_exists('bootpresswp_breadcrumbs')) 
    bootpresswp_breadcrumbs(); 
?>
```
To use the menu in your theme here is the changes to the standard WordPress nav walker
```php
<?php
        wp_nav_menu( array(
            'menu'              => 'main-menu',
            'theme_location'    => 'main-menu',
            'depth'             => 2,
            'container'         => 'div',
            'container_class'   => 'collapse navbar-collapse',
            'container_id'      => 'bs-example-navbar-collapse-1',
            'menu_class'        => 'nav navbar-nav',
            'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
            'walker'            => new wp_bootstrap_navwalker())
        );
    ?>    
```
You can see an example in the header.php file on using it in a fully functional navbar

## Short Codes:

**Row and Columns**

Add a row

[row]content[/row]

Add a Column

This uses the standard 1 to 12 for bootstrap columns

[col xsmall="" small="" medium="" large="" class=""]Here is the content[/col]

Example:

2 Columns taking up 50% on medium screens

[row][col xsmall="" small="" medium="6" large="" class="own-class"]Left Column[/col][col xsmall="" small="" medium="6" large="" class="own-class"]Right Column[/col][/row]


**Button**

[btn href="test" type="btn-danger" size="btn-large" disabled="disabled"]Here is the content[/btn]


**Label**

[label type=""]here is content[/label]


**Badge**

[badge type=""]here is content[/badge]


**Headline**

[head headline="" subtext=""]

There are a few more for carousel and modals but these are still in production.

## Author:

Donovan Maidens ( [@Anomalous_Bot](http://twitter.com/Anomalous_Bot) / [anomalous.co.za](http://anomalous.co.za) )

## Summary

WordPress starter theme based on Bootpress, it also has Fontawesome installed.
This is a base theme, and should be used by a developer.
It has no pretty templates.

## Also Look at

Bootstrap Nav Walker [wp-bootstrap-navwalker](https://github.com/twittem/wp-bootstrap-navwalker)
Bootstrap Pagination [wp-bootstrap-pagination](https://github.com/talentedaamer/Bootstrap-wordpress-pagination)


## Acknowledgement

Bootstrap Nav Walker [wp-bootstrap-navwalker](https://github.com/twittem/wp-bootstrap-navwalker)
Bootstrap Pagination [wp-bootstrap-pagination](https://github.com/talentedaamer/Bootstrap-wordpress-pagination)



