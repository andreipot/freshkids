<div class="post_image">
    <img src="<?php echo THEME_DIR;?>/images/blog/blog3.png" alt=" ">
</div>

<div class="post_info">
    <ul class="post_cat">
        <?php pb_get_post_category_list($post->ID); ?>
    </ul>
    <a href="<?php the_permalink();?>" class="post_title"><?php the_title();?></a>
</div>