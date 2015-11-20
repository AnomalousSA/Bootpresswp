<?php
/**
 * Comment Template
 *
 * @package WordPress
 * @subpackage Bootpresswp
 * @since Bootpresswp 0.1
 *
 * Last Revised: Nov 21, 2015
 */
?>
	<div id="comments">
	<?php if ( post_password_required() ) : ?>
            <p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'bootpresswp' ); ?></p>
	</div><!-- #comments -->
	<?php
        return;
        endif;
	?>
	<?php if ( have_comments() ) : ?>
            <h2 id="comments-title">
                <?php
                printf( _n( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'bootpresswp' ),
                number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
                ?>
            </h2>
		<ol class="commentlist">
                <?php
                /* 
                 * define bootstrapwp_comment() and that will be used instead.
                 * See bootstrapwp_comment() in bootstrapwp/functions.php for more.
                 */
                wp_list_comments( array( 'callback' => 'bootstrapwp_comment' ) );
                ?>
		</ol>
	<?php
		/* 
                 * Else if no comments
		 */
		elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="nocomments"><?php _e( 'Comments are closed.', 'purecsspress' ); ?></p>
	<?php endif; ?>
                <div class="pagination">
            <?php paginate_comments_links(); ?>
            </div>
	<?php comment_form(); ?>
        </div><!-- #comments -->