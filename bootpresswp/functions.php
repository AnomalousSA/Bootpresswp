<?php
/**
 *
 * @package WordPress
 * @subpackage Bootpresswp
 * @since Bootpresswp 0.1
 *
 * Last Revised: May 14, 2015
 */


// Set content width value based on the theme's design
if ( ! isset( $content_width ) )
	$content_width = 900;

if ( ! function_exists('bootstrapwp_theme_features') ) {

// Register Theme Features
function bootstrapwp_theme_features()  {

	// Add theme support for Automatic Feed Links
	add_theme_support( 'automatic-feed-links' );

	// Add theme support for Post Formats
	add_theme_support( 'post-formats', array( 'status', 'quote', 'gallery', 'image', 'video', 'audio', 'link', 'aside', 'chat' ) );

	// Add theme support for Featured Images
	add_theme_support( 'post-thumbnails' );

	// Add theme support for Custom Background
	$background_args = array(
		'default-color'          => 'ffffff',
		'default-image'          => '',
		'default-repeat'         => '',
		'default-position-x'     => '',
		'wp-head-callback'       => '',
		'admin-head-callback'    => '',
		'admin-preview-callback' => '',
	);
	//add_theme_support( 'custom-background', $background_args );

	// Add theme support for Custom Header
	$header_args = array(
		'default-image'          => '',
		'width'                  => 0,
		'height'                 => 0,
		'flex-width'             => false,
		'flex-height'            => false,
		'uploads'                => true,
		'random-default'         => false,
		'header-text'            => false,
		'default-text-color'     => '',
		'wp-head-callback'       => '',
		'admin-head-callback'    => '',
		'admin-preview-callback' => '',
	);
	//add_theme_support( 'custom-header', $header_args );

	// Add theme support for HTML5 Semantic Markup
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

	// Add theme support for document Title tag
	add_theme_support( 'title-tag' );
        
        // Add theme support for custom CSS in the TinyMCE visual editor
	add_editor_style();
}

// Hook into the 'after_setup_theme' action
add_action( 'after_setup_theme', 'bootstrapwp_theme_features' );

}



// New Nav walker for Bootstrap
require_once('includes/wp_bootstrap_navwalker.php');
// Bootstrap pagination
require_once('includes/wp_bootstrap_pagination.php');

function custom_bootpresswp_loader() {
wp_enqueue_style( 'bootstrap-style', get_template_directory_uri().'/assets/css/bootstrap.min.css', false , '3.3.4', 'all' );
wp_enqueue_style( 'font-awesome-style', get_template_directory_uri().'/assets/css/font-awesome.css', false , '4.3.0', 'all' );
wp_enqueue_style( 'bootpresswp-style', get_template_directory_uri().'/assets/css/style.css', false , '1.0', 'all' );
wp_enqueue_script( 'bootstrap-script', get_template_directory_uri() .'/assets/js/bootstrap.min.js', array( 'jquery' ), '3.3.4', true );
wp_enqueue_script( 'bootpresswp-script', get_template_directory_uri() .'/assets/js/script.js', array( 'jquery' ), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'custom_bootpresswp_loader' );

// Bredcrumbs

function bootpresswp_breadcrumbs() {

  $delimiter = '<span class="divider">/</span>';
  $home = 'Home'; // text for the 'Home' link
  $before = '<li class="active">'; // tag before the current crumb
  $after = '</li>'; // tag after the current crumb

  if ( !is_home() && !is_front_page() || is_paged() ) {

    echo '<ol class="breadcrumb">';

    global $post;
    $homeLink = home_url('/');
    echo '<li><a href="' . $homeLink . '">' . $home . '</a></li> ' . $delimiter . ' ';

    if ( is_category() ) {
      global $wp_query;
      $cat_obj = $wp_query->get_queried_object();
      $thisCat = $cat_obj->term_id;
      $thisCat = get_category( $thisCat );
      $parentCat = get_category( $thisCat->parent );
      if ( $thisCat->parent != 0 ) echo get_category_parents( $parentCat, TRUE, ' ' . $delimiter . ' ' );
      echo $before . 'Archive by category "' . single_cat_title( '', false ) . '"' . $after;

    } elseif ( is_day() ) {
      echo '<li><a href="' . get_year_link( get_the_time( 'Y' ) ) . '">' . get_the_time( 'Y' ) . '</a></li> ' . $delimiter . ' ';
      echo '<li><a href="' . get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ) . '">' . get_the_time( 'F' ) . '</a></li> ' . $delimiter . ' ';
      echo $before . get_the_time( 'd' ) . $after;

    } elseif ( is_month() ) {
      echo '<li><a href="' . get_year_link( get_the_time( 'Y' ) ) . '">' . get_the_time( 'Y' ) . '</a></li> ' . $delimiter . ' ';
      echo $before . get_the_time( 'F' ) . $after;

    } elseif ( is_year() ) {
      echo $before . get_the_time( 'Y' ) . $after;

    } elseif ( is_single() && !is_attachment() ) {
      if ( get_post_type() != 'post' ) {
        $post_type = get_post_type_object( get_post_type() );
        $slug = $post_type->rewrite;
        echo '<li><a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a></li> ' . $delimiter . ' ';
        echo $before . get_the_title() . $after;
      } else {
        $cat = get_the_category(); $cat = $cat[0];
        echo get_category_parents( $cat, TRUE, ' ' . $delimiter . ' ' );
        echo $before . get_the_title() . $after;
      }

    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
      $post_type = get_post_type_object( get_post_type() );
      echo $before . $post_type->labels->singular_name . $after;

    } elseif ( is_attachment() ) {
      $parent = get_post( $post->post_parent );
      $cat = get_the_category( $parent->ID ); $cat = $cat[0];
      echo get_category_parents( $cat, TRUE, ' ' . $delimiter . ' ' );
      echo '<li><a href="' . get_permalink( $parent ) . '">' . $parent->post_title . '</a></li> ' . $delimiter . ' ';
      echo $before . get_the_title() . $after;

    } elseif ( is_page() && !$post->post_parent ) {
      echo $before . get_the_title() . $after;

    } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ( $parent_id ) {
        $page = get_page( $parent_id );
        $breadcrumbs[] = '<li><a href="' . get_permalink( $page->ID ) . '">' . get_the_title( $page->ID ) . '</a></li>';
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse( $breadcrumbs );
      foreach ( $breadcrumbs as $crumb ) echo $crumb . ' ' . $delimiter . ' ';
      echo $before . get_the_title() . $after;

    } elseif ( is_search() ) {
      echo $before . 'Search results for "' . get_search_query() . '"' . $after;

    } elseif ( is_tag() ) {
      echo $before . 'Posts tagged "' . single_tag_title( '', false ) . '"' . $after;

    } elseif ( is_author() ) {
      global $author;
      $userdata = get_userdata( $author );
      echo $before . 'Articles posted by ' . $userdata->display_name . $after;

    } elseif ( is_404() ) {
      echo $before . 'Error 404' . $after;
    }

    if ( get_query_var( 'paged' ) ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
      echo __( 'Page', 'bootstrapwp' ) . ' ' . get_query_var( 'paged' );
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    }

    echo '</ol>';

  }
} 


function bootpresswp_widgets_init() {
  $page = array(
    'name' => __('Page Sidebar', 'bootpresswp'),
    'id' => 'sidebar-page',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => "</div>",
    'before_title' => '<h4 class="widget-title">',
    'after_title' => '</h4>',
  );
  register_sidebar( $page );

  $posts = array(
    'name' => __('Posts Sidebar', 'bootpresswp'),
    'id' => 'sidebar-posts',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => "</div>",
    'before_title' => '<h4 class="widget-title">',
    'after_title' => '</h4>',
  );
  register_sidebar( $posts );
}

add_action( 'widgets_init', 'bootpresswp_widgets_init' );

if ( ! function_exists( 'bootpresswp_content_nav' ) ):
/**
 * Display navigation to next/previous pages when applicable
 */
function bootpresswp_content_nav( $nav_id ) {
	global $wp_query;
	?>

	<?php if ( is_single() ) : // navigation links for single posts ?>
<ul class="pager">
		<?php previous_post_link( '<li class="previous">%link</li>', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'purecsspress' ) . '</span> %title' ); ?>
		<?php next_post_link( '<li class="next">%link</li>', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'purecsspress' ) . '</span>' ); ?>
</ul>
	<?php elseif ( $wp_query->max_num_pages > 1 && ( is_home() || is_archive() || is_search() ) ) : // navigation links for home, archive, and search pages ?>
<ul class="pager">
		<?php if ( get_next_posts_link() ) : ?>
		<li class="next"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'purecsspress' ) ); ?></li>
		<?php endif; ?>

		<?php if ( get_previous_posts_link() ) : ?>
		<li class="previous"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'purecsspress' ) ); ?></li>
		<?php endif; ?>
</ul>
	<?php endif; ?>

	<?php
}
endif; // bootstrapwp_content_nav

if ( ! function_exists( 'bootpresswp_posted_on' ) ) :
  
  function bootpresswp_posted_on() {
    printf( __( '<span class="sep">Posted on </span><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s" pubdate>%4$s</time></a><span class="byline"> <span class="sep"> by </span> <span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span></span>', 'bootstrap' ),
      esc_url( get_permalink() ),
      esc_attr( get_the_time() ),
      esc_attr( get_the_date( 'c' ) ),
      esc_html( get_the_date() ),
      esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
      esc_attr( sprintf( __( 'View all posts by %s', 'bootstrap' ), get_the_author() ) ),
      esc_html( get_the_author() )
    );
  }
endif;

function theme_queue_js(){
if ( (!is_admin()) && is_singular() && comments_open() && get_option('thread_comments') )
  wp_enqueue_script( 'comment-reply' );
}
add_action('wp_print_scripts', 'theme_queue_js');
 ?>