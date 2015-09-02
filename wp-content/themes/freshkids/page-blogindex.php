<?php
/**
 * Template Name: Page Blog Index
 */
get_header(); ?>

    <div class="page blog">
    <div class="blog_index">
        <div class="filter_box" id="filters">
            <div class="filter_items"  data-filter-group="type">
                <button class="btn-sort active"  data-filter="">All</button>
                <?php
                //get all categories
                $args = array(
                    'orderby'   => 'name',
                    'parent'    => 0,
                );
                $all_categories = get_categories($args);

                $filter_index = 0;
                foreach($all_categories as $post_category):
                    $filter_index++;
                ?>
                    <button  class="btn-sort" data-filter=".data<?=$post_category->cat_ID;?>"><?php echo $post_category->name;?></button>
                <?php endforeach; ?>
            </div>
        </div>
        <?php
            //get all blot posts
            $temp = $wp_query;
            $wp_query = new WP_Query('post_type=post&posts_per_page=1&orderby=date&posts_per_page=8');
            if ( have_posts() ) : ?>
        <div class="blog_index_items">
            <ul class="blog_index_list">
                <?php
                // Start the Loop.
                while ( have_posts() ) : the_post(); ?>
                    <!-- class data is used for filtering -->
                    <?php
                        $categories = get_the_category($post->ID);
                        $filter_id = '';
                        foreach($categories as $category)
                            $filter_id .= 'data'. $category->term_id.' ';
                    ?>
                    <li class="item <?php echo $filter_id; ?>">
                        <?php  get_template_part( 'template-parts/post-item'); ?>
                    </li>
                <?php
                    // End the loop.
                endwhile;
                ?>
            </ul>

        </div>
        <?php
            wp_reset_query();
        // If no content, include the "No posts found" template.
        else :
            get_template_part( 'content', 'none' );

        endif;
        ?>
    </div>
    <div class="clearfix"></div>
    <?php  get_template_part('content','socials'); ?>
    </div><!-- .page .blog_page -->
<?php get_footer(); ?>