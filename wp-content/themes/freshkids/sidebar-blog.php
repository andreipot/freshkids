<?php if ( is_active_sidebar( 'blog' ) ) : ?>
    <?php
    $temp = $wp_query;
    $wp_query = new WP_Query('post_type=post&orderby=date&posts_per_page=3');
    ?>
    <div class="sidebar" role="complementary">
        <ul class="sidebar_posts">
            <?php
                while ( have_posts() ) : the_post(); ?>
                <!-- class data is used for filtering -->
            <?php
                $categories = get_the_category($post->ID);
                $filter_id = '';
                foreach($categories as $category)
                    $filter_id .= 'data'. $category->term_id.' ';
            ?>
                <li class="<?php echo $filter_id; ?>">
                    <?php  get_template_part( 'template-parts/post-widget-item'); ?>
                </li>
            <?php
                // End the loop.
                endwhile;
            wp_reset_query();
            ?>

        </ul>
    </div><!-- .sidebar -->
<?php endif; ?>
