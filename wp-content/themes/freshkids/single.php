<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
<div class="page blog_page">
    <div class="container">
    <div class="row">
    <div class="content-wrapper">
        <div class="content">
            <div class="blog_cover">
                <img src="<?php echo THEME_DIR; ?>/images/blog/blog1.png" alt=" ">
            </div><!-- .blog_cover -->

            <div class="blog_social">
                <ul class="blog-social-icons">
                    <li><a href="https://facebook.com/"> <svg class="icon_24 color_gray"><use xlink:href="#svg_social_circle_facebook"></use></svg></a></li>
                    <li><a href="https://twitter.com/"><svg class="icon_24 color_gray"><use xlink:href="#svg_social_circle_twitter"></use></svg></a></li>
                    <li><a href="https://instagram.com/"><svg class="icon_24 color_gray"><use xlink:href="#svg_social_circle_instagram"></use></svg></a></li>
                    <li><a href="https://pinterest.com/"><svg class="icon_24 color_gray"><use xlink:href="#svg_social_circle_pinterest"></use></svg></a></li>
                </ul><!-- .blog-social-icons -->
            </div><!-- .blog_social -->

            <div class="blog_info">
                <ul class="blog_cat">
                    <?php pb_get_post_category_list($post->ID);?>
                </ul><!-- .blog_cat -->

                <p class="blog_date"><?php the_date('m/d/Y');?></p>
            </div><!-- .blog_info -->

            <div class="blog_title">
                <?php the_title('<h1>','</h1>'); ?>
            </div><!-- .blog_title -->

            <div class="blog_content">
                <?php the_content(); ?>
                <!-- this will be replaced with post content -->
            </div>
            <!-- post content ends here-->

            <!-- post comments section -->
            <?php
                // If comments are open or we have at least one comment, load up the comment template.
                if ( comments_open() || get_comments_number() ) {
                    comments_template();
                }
            ?>
            <!-- .post comments section -->
            </div><!-- .content -->
    </div><!-- .content-wrapper -->

    <!-- sidebar -->
        <?php get_sidebar('blog'); ?>
    <!-- sidebar ends-->

    </div><!-- .row -->
    </div><!-- .container -->
    <!-- socials part -->
    <?php get_template_part('content','socials'); ?>
    <!-- .socials part-->
<?php endwhile; ?>
</div>
<?php get_footer(); ?>