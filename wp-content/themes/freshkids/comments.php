<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>
<div class="blog_comments"><!-- blog comments starts -->

    <div class="leave_comment">
        <?php
            //comment args
            $comment_args = array(
                'title_reply'   => '<h2 class="comment_title">Leave Your Comment</h2>',
                'fields'        =>  apply_filters('comment_form_default_fields',array(
                    'author'        => '<div class="input_box input_margin">
                                        <p>Name</p>
                                            <input type="text" placeholder="Your name">
                                        </div>',
                    'email'         =>'<div class="input_box">
                                        <p>Email</p>
                                        <input type="text" placeholder="Your email">
                                    </div>',

                )),
                'comment_notes_after'=>'<button class="button round">Post Comment</button>',
                'comment_field' =>'<div class="textarea_box">
                                        <p>Comment</p>
                                        <textarea id="comment" name="comment" placeholder="Your comment"></textarea>
                                    </div>',
                /*'class_submit'         => 'button round'*/

            );
        ?>
        <?php comment_form($comment_args); ?>
        <!--<a href="#" class="button round">Post Comment</a>-->
    </div>

    <div class="comments_list">
        <?php if ( have_comments() ) : ?>
            <h2 class="comments_title">Comments</h2>
            <ul class="comm_list">
                <?php
                wp_list_comments( array(
                    'style'       => 'li',
                    'short_ping'  => true,
                    'avatar_size' => 32,
                ) );
                ?>
                <!--<li>
                    <div class="comm_info">
                        <a href="#" class="comm_author">
                            Lorem Lpsum
                        </a>
                        <p>
                            5/16/2015
                        </p>
                    </div>

                    <div class="comm_content">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </p>
                    </div>
                </li>-->
            </ul>
        <?php endif;?>
        <?php
        // If comments are closed and there are comments, let's leave a little note, shall we?
        if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
            ?>
            <p class="no-comments"><?php _e( 'Comments are closed.', 'twentyfifteen' ); ?></p>
        <?php endif; ?>
    </div>

</div><!-- .blog_comments -->
