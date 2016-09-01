<?php
/**
 *
 * @package WordPress
 * @subpackage Bootpresswp
 * @since Bootpresswp 0.1
 *
 * Last Revised: Jul 15, 2016
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
// Bootstrap breadcrumbs
require_once('includes/wp_bootstrap_breadcrumbs.php');
// Add Shortcodes
require_once('includes/wp_bootstrap_shortcodes.php');


function custom_bootpresswp_loader() {
wp_enqueue_style( 'bootstrap-style', get_template_directory_uri().'/assets/css/bootstrap.min.css', false , '3.3.4', 'all' );
wp_enqueue_style( 'font-awesome-style', get_template_directory_uri().'/assets/css/font-awesome.css', false , '4.3.0', 'all' );
wp_enqueue_style( 'bootpresswp-style', get_template_directory_uri().'/assets/css/style.css', false , '1.0', 'all' );
wp_enqueue_script( 'bootstrap-script', get_template_directory_uri() .'/assets/js/bootstrap.min.js', array( 'jquery' ), '3.3.4', true );
wp_enqueue_script( 'bootpresswp-script', get_template_directory_uri() .'/assets/js/script.js', array( 'jquery' ), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'custom_bootpresswp_loader' );

// Bredcrumbs




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

/*
 * Main and Footer Menu for Bootpresswp
 */

if ( ! function_exists( 'bootpresswp_menus' ) ) {

// Register Navigation Menus
function bootpresswp_menus() {

    $locations = array(
            'main-menu' => __( 'Main Header Menu', 'text_domain' ),
            'footer-menu' => __( 'Footer Menu', 'text_domain' ),
    );
    register_nav_menus( $locations );

}
add_action( 'init', 'bootpresswp_menus' );

}


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

// Comment Form

    add_filter( 'comment_form_default_fields', 'bootpresswp_comment_form_fields' );
    function bootpresswp_comment_form_fields( $fields ) {
        $commenter = wp_get_current_commenter();
        
        $req      = get_option( 'require_name_email' );
        $aria_req = ( $req ? " aria-required='true'" : '' );
        $html5    = current_theme_supports( 'html5', 'comment-form' ) ? 1 : 0;
        
        $fields   =  array(
            'author' => '<div class="form-group comment-form-author">' . '<label for="author">' . __( 'Name' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
                        '<input class="form-control" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></div>',
            'email'  => '<div class="form-group comment-form-email"><label for="email">' . __( 'Email' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
                        '<input class="form-control" id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></div>',
            'url'    => '<div class="form-group comment-form-url"><label for="url">' . __( 'Website' ) . '</label> ' .
                        '<input class="form-control" id="url" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></div>'        
        );
        
        return $fields;
    }
    
        add_filter( 'comment_form_defaults', 'bootpresswp_comment_form' );
    function bootpresswp_comment_form( $args ) {
        $args['comment_field'] = '<div class="form-group comment-form-comment">
                <label for="comment">' . _x( 'Comment', 'noun' ) . '</label> 
                <textarea class="form-control" id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>
            </div>';
        $args['class_submit'] = 'btn btn-default'; // since WP 4.1
        
        return $args;
    }
    
        add_action('comment_form', 'bootpresswp_comment_button' );
    function bootpresswp_comment_button() {
        echo '<button class="btn btn-default" type="submit">' . __( 'Submit' ) . '</button>';
    }


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

if ( ! function_exists( 'bootstrapwp_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own bootstrap_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since WP-Bootstrap .5
 */
    function bootstrapwp_comment( $comment, $args, $depth ) {
            $GLOBALS['comment'] = $comment;
            switch ( $comment->comment_type ) :
                    case 'pingback' :
                    case 'trackback' :
            ?>
            <li class="post pingback">
                <p><?php _e( 'Pingback:', 'bootstrap' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'bootstrap' ), ' ' ); ?></p>
            <?php
                        break;
                default :
            ?>
            <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
                <article id="comment-<?php comment_ID(); ?>" class="comment">
                    <footer>
                        <div class="comment-author vcard">
                                <?php echo get_avatar( $comment, 40 ); ?>
                                <?php printf( __( '%s <span class="says">says:</span>', 'bootstrap' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
                        </div>
                        <?php if ( $comment->comment_approved == '0' ) : ?>
                        <em><?php _e( 'Your comment is awaiting moderation.', 'bootstrap' ); ?></em>
                        <br />
                        <?php endif; ?>
                        <div class="comment-meta commentmetadata">
                            <a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"><time pubdate datetime="<?php comment_time( 'c' ); ?>">
                            <?php
                                    /* translators: 1: date, 2: time */
                                    printf( __( '%1$s at %2$s', 'bootstrap' ), get_comment_date(), get_comment_time() ); ?>
                            </time></a>
                            <?php edit_comment_link( __( '(Edit)', 'bootstrap' ), ' ' );
                            ?>
                        </div>
                    </footer>
                    <div class="comment-content"><?php comment_text(); ?></div>
                    <div class="reply">
                            <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
                    </div><!-- .reply -->
                </article><!-- #comment-## -->
            <?php
                            break;
            endswitch;
    }
endif; // ends check for bootstrapwp_comment()

function theme_queue_js(){
    if ( (!is_admin()) && is_singular() && comments_open() && get_option('thread_comments') ) {
      wp_enqueue_script( 'comment-reply' );
    }
}
add_action('wp_print_scripts', 'theme_queue_js');

// Added Woocommerce Support to theme
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

function schema_org_markup() {
    $schema = 'http://schema.org/';
    // Is single post
    if ( is_single() ) {
        $type = "Article";
    } // Contact form page ID
    else {
        if ( is_page( 1 ) ) {
            $type = 'ContactPage';
        } // Is author page
        elseif ( is_author() ) {
            $type = 'ProfilePage';
        } // Is search results page
        elseif ( is_search() ) {
            $type = 'SearchResultsPage';
//        } // Is of movie post type
//        elseif ( is_singular( 'movies' ) ) {
//            $type = 'Movie';
//        } // Is of book post type
//        elseif ( is_singular( 'books' ) ) {
//            $type = 'Book';
//        }
//    elseif ( function_exists(is_woocommerce) && is_woocommerce() ) {
//      $type = 'Product';
    } else {
            $type = 'WebPage';
        }
    }
    echo 'itemscope="itemscope" itemtype="' . $schema . $type . '"';
}