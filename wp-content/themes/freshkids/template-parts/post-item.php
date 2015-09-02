
<div class="blog_index_item">
    <div class="blog_index_img">
        <img src="<?php echo THEME_DIR;?>/images/blog/blog4.png" width="325" height="325" alt=" ">
        <div class="blog_index_info">
            <ul class="post_cat">
                <?php
                    pb_get_post_category_list($post->ID);
                ?>
            </ul>
            <a href="<?php the_permalink();?>" class="post_title"><?php the_title();?></a>

            <div class="post_desc">
                <p><?php the_excerpt();?></p>
            </div>
        </div>
    </div>
</div>