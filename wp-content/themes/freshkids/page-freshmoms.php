<?php
/**
 * Template Name: Freshmoms Page
 */
get_header(); ?>
    <div class="page about moms">
    <div class="about_wrapper">
        <div class="moms_img1">
            <div class="row">
                <div class="moms_box">
                    <img src="<?php echo THEME_DIR;?>/images/moms/moms2.png" alt=" ">
                </div>
            </div>
        </div>
        <?php
        //delete_option('pb_shi_import');

        pb_shi_import_from_twitter();
        ?>

        <div class="row">
            <div class="about_text">
                <div class="title_box">
                    <img src="<?php echo THEME_DIR;?>/images/moms/moms_icon1.png" alt=" ">
                    <h1>Fresh <span>moms</span></h1>
                </div>
                <p>
                    We all believe in a healthy and happy world for kids. And it all starts with moms!<br>
                    We hope especially you will share your story - What does it mean to be a FreshMom? Tell us. Show us. Surprise us. We want to hear your story. Share your posts, photos and love here.
                </p>
                <ul class="tags_list">
                    <li>
                        <a href="#">#freshmoms</a>
                    </li>
                    <li>
                        <a href="#">#freshmoms</a>
                    </li>
                </ul>
            </div>
        </div>
        <?php
            //get all social posts;
            global $wp_query;
            $temp = $wp_query;

            $args = array(
                'post_type'   => 'social_media_post',
                'posts_per_page'=>4,
                'orderby'=>'date',
                'post_status'=>array('publish')
            );
            $wp_query = new WP_Query($args);
        ?>
            <div class="news_block">
                <div class="news_block_wrapper">
                    <div class="news_items_list" id="grid"  data-columns>
                    <!-- fetch all possible social media posts -->
                    <?php
                    if ( have_posts() ) : ?>
                            <?php
                            // Start the Loop.
                            while ( have_posts() ) : the_post();
                                //category check
                                $category = 'facebook';
                                    get_template_part( "template-parts/social_templates/social_media_post-$category");
                                // End the loop.
                            endwhile;
                            ?>
                        <?php
                        wp_reset_query();
                    // If no content, include the "No posts found" template.
                    else : ?>
                        <?php
                        echo 'no post';
                        get_template_part( 'content', 'none' );
                    endif;
                    ?>
                    <!-- .featch all possible social media posts, infinite scroll -->
                </div>

                    <div class="button_block">
                        <a href="#" class="button round medium">SEE MORE NEWS</a>
                    </div>
                    <!--socials-->
                    <?php get_template_part('content','socials');?><!-- #socials-school -->
                </div>
            </div>
            <!-- pagination -->
                <?php get_template_part('pagination'); ?>
            <!-- .pagination -->
        </div>

        <div class="clearfix"></div>

    </div><!-- .page .blog_page -->

<?php get_footer();?>