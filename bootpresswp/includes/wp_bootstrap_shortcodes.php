<?php

/*
 * Bootstrap 3 Shortcodes for BootpressWP
 */

// Carosel Shortcode 
// [carosel][/carosel]
function carosel_shortcode($atts, $content = null) {
    return '<div class="row-fluid" style="position:relative"><div class="span1"><a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a></div><div class="span10"><div id="myCarousel" class="carousel slide"><ol class="carousel-indicators"></ol><div class="carousel-inner">' . do_shortcode($content) . '</div></div></div><div class="span1"><a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a></div></div>';
}
add_shortcode('carosel', 'carosel_shortcode');


// Carosel Image
//[caroselimg class=""]Image File[/caroselimg]
function caroselshortcode($atts, $content = null) {
    extract(shortcode_atts(
                    array(
        'class' => '',
                    ), $atts)
    );
    return '<div class="item ' . $class . '">' . do_shortcode($content) . '</div>';
}
add_shortcode('caroselimg', 'caroselshortcode');


// Row Fluid Short Code
// [row][/row]
function row_shortcode($atts, $content = null) {
    return '<div class="row">' . do_shortcode($content) . '</div>';
}
add_shortcode('row', 'row_shortcode');


// Column Shortcode
/* [col xsmall="" small="" medium="" large="" class=""]Here is the content[/col]
 * Always remeber no spaces between columns
 */
function col_shortcode($atts, $content = null) {
    extract(shortcode_atts(
                    array(
        'xsmall' => '',
        'small' => '',
        'medium' => '12',
        'large' => '',
        'class' => '',
                    ), $atts)
    );
    // Check to see if offset is empty, if empty then remove from return code
    $xsmalltest = "";
    $smalltest = "";
    $mediumtest = "";
    $largetest = "";
    $classtest = "";

    if ($xsmall != "") {
        $xsmalltest = 'col-xs-' . $xsmall . ' ';
    };
    if ($small != "") {
        $smalltest = 'col-sm-' . $small . ' ';
    };
    if ($medium != "") {
        $mediumtest = 'col-md-' . $medium . ' ';
    };
    if ($large != "") {
        $largetest = 'col-lg-' . $large;
    };
    if ($class != "") {
        $classtest = ' ' . $class;
    };
    return '<div class="' . $xsmalltest . $smalltest . $mediumtest . $largetest . $classtest . '">' . do_shortcode($content) . '</div>';
}
add_shortcode('col', 'col_shortcode');



// Button Shortcodes
// [btn href="test" type="btn-danger" size="btn-large" disabled="disabled"]Here is the content[/btn]
// Add Shortcode
function btnshort_shortcode($atts, $content = null) {
    extract(shortcode_atts(
                    array(
        'href' => '',
        'type' => '',
        'size' => '',
        'disabled' => '',
                    ), $atts)
    );
    return '<a href="' . $href . '" class="btn ' . $type . ' ' . $size . ' ' . $disabled . '">' . do_shortcode($content) . '</a>';
}
add_shortcode('btnshort', 'btnshort_shortcode');


// Label Short Code
// [label type=""]here is content[/label]
function label_shortcode($atts, $content = null) {
    extract(shortcode_atts(
                    array(
        'type' => '',
                    ), $atts)
    );
    return '<span class="label ' . $type . '">' . $content . '</span>';
}
add_shortcode('label', 'label_shortcode');


// Badge Shortcode
//[badge type=""]here is content[/badge]
function badge_shortcode($atts, $content = null) {
    extract(shortcode_atts(
                    array(
        'type' => '',
                    ), $atts)
    );
    return '<span class="badge ' . $type . '">' . $content . '</span>';
}
add_shortcode('badge', 'badge_shortcode');


// Hero Shortcode
// [hero headline="" href="test" type="btn-danger" size="btn-large" buttontext=""]Here is the content[/hero]
function hero_shortcode($atts, $content = null) {
    extract(shortcode_atts(
                    array(
        'headline' => '',
        'href' => '',
        'type' => 'btn-primary',
        'size' => 'btn-large',
        'buttontext' => 'Learn More',
                    ), $atts)
    );
    return '<div class="hero-unit"><h1>' . $headline . '</h1><p>' . $content . '</p><p><a href="' . $href . '" class="btn ' . $type . ' ' . $size . '">' . $buttontext . '</a></p></div>';
}
add_shortcode('hero', 'hero_shortcode');


// Headline Shortcode
//[head headline="" subtext=""]
function head_shortcode($atts) {
    extract(shortcode_atts(
                    array(
        'headline' => 'Headline',
        'subtext' => 'Subtext',
                    ), $atts)
    );
    return '<div class="page-header"><h1>' . $headline . ' <small>' . $subtext . '</small></h1></div>';
}
add_shortcode('head', 'head_shortcode');


//Modal
// Add Shortcode
//[modal title=""][/modal]
function modal_shortcode($atts, $content = null) {
    extract(shortcode_atts(
                    array(
        'title' => 'Modal Title',
                    ), $atts)
    );

    $returnString = '<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">';
    $returnString .= '<div class="modal-header">';
    $returnString .= '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>';
    $returnString .= '<h3 id="myModalLabel">' . $title . '</h3>';
    $returnString .= '</div>';
    $returnString .= '<div class="modal-body">';
    $returnString .= do_shortcode($content);
    $returnString .= '</div>';
    $returnString .= '<div class="modal-footer">';
    $returnString .= '<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>';
    $returnString .= '</div>';
    $returnString .= '</div>';

    return $returnString;
}
add_shortcode('modal', 'modal_shortcode');
