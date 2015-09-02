<div class="product_item active">
    <div class="product_img">
        <?php
            $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'single-post-thumbnail');
            if($image): ?>
                <img src="<?php echo $image[0];?>" alt="No Image">
            <?php
            endif;
        ?>
    </div>

    <div class="product_content">
        <a href="<?php the_permalink();?>" class="product_title"><?php the_title();?></a>
        <p>
            <?php the_excerpt();?>
        </p>

        <button class="button round small">
            See nutrition
        </button>
    </div>
</div>

<div class="product_item1 inactive">
    <ul class="accordion" data-accordion>
        <li class="accordion-navigation active">
            <a href="#panel1a" class="accordion_header">Nutritional Information</a>
            <div id="panel1a" class="content active">
                <div class="acc_img">
                    <img src="<?php the_field('nutritional_information_image');?>" alt=" ">
                </div>
            </div>
        </li>
        <li class="accordion-navigation">
            <a href="#panel2a"  class="accordion_header">Ingredients</a>
            <div id="panel2a" class="content">
                <?php the_field('ingredients'); ?>
            </div>
        </li>
    </ul>

    <button class="close_btn">
        <svg class="icon_36 color_red"><use xlink:href="#svg_menu_close"></use></svg>
    </button>
</div>