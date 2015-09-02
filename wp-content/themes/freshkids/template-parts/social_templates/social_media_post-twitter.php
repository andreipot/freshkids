<div class="news_item_box">
    <div class="news_item_header">
        <div class="news_item_header_left">
            <div class="news__item_header_img">
                <?php if(get_field('user_image')):?>
                    <img src="<?php the_field('user_image'); ?>">
                <?php else: ?>
                    <img src="./images/moms/face.png" alt=" ">
                <?php endif;?>
            </div>

            <div class="news_info">
                <a href="<?php the_field('user_url'); ?>" class="news_item_title"><?php the_field('username');?><</a>
                <p class="news_item_date"><?php the_time('m-j-Y'); ?></p>
            </div>
        </div>

        <div class="news_item_header_socials">
            <a href="twitter.com"></a>
        </div>
    </div>
    <div class="news_item_img">

    </div>
    <div class="news_item_content">
        <p>
            <?php echo get_post_meta( $id, 'tweet', true );?>
            <a href="#">#FreshKids</a> <a href="#">@FreshKids</a> <a href="#">http://wearefreshkids.com/</a>
        </p>

    </div>

</div>
<!-- static template -->
<!--<div class="news_item_box">
    <div class="news_item_header">
        <div class="news_item_header_left">
            <div class="news__item_header_img">
                <img src="./images/moms/face.png" alt=" ">
            </div>

            <div class="news_info">
                <a href="#" class="news_item_title">User Name</a>
                <p class="news_item_date">Dec 12 2014</p>
            </div>
        </div>

        <div class="news_item_header_socials">
            <a href="twitter.com"></a>
        </div>
    </div>
    <div class="news_item_img">

    </div>
    <div class="news_item_content">
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.
            <a href="#">#FreshKids</a> <a href="#">@FreshKids</a> <a href="#">http://wearefreshkids.com/</a>
        </p>

    </div>

</div>-->
<!-- .static template -->