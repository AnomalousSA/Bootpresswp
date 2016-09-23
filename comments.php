<?php
/**
 * Comment Template
 *
 * @package WordPress
 * @subpackage Bootpresswp
 * @since Bootpresswp 0.1
 *
 * Last Revised: Jul 15, 2016
 */
?>
	<div id="comments">
	<?php if ( post_password_required() ) : ?>
            <p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'bootpresswp' ); ?></p>
	</div>
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
                wp_list_comments( array( 'callback' => 'bootstrapwp_comment' ) );
                ?>
		</ol>
	<?php
		elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="nocomments"><?php _e( 'Comments are closed.', 'bootpresswp' ); ?></p>
	<?php endif; ?>
                <div class="pagination">
            <?php paginate_comments_links(); ?>
            </div>
	<?php comment_form(); ?>
        </div>