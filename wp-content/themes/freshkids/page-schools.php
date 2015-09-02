<?php
/**
 * Template Name: Schools Page
 */
get_header(); ?>
    <div class="page about school">
    <div class="about_wrapper">
    <div class="school_img1">
        <div class="row">
            <div class="kids">
                <img src="<?php echo THEME_DIR;?>/images/school/kids.png" alt=" ">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="about_text">
            <div class="title_box">
                <img src="<?php echo THEME_DIR;?>/images/school/apple.png" alt=" ">
                <h1>School <span>FOOD</span></h1>
            </div>
            <p>FreshKids believes all kids should have access to real food. We are inspired by the healthy food revolution taking place in America’s school cafeterias – the school day is getting healthier!FreshKids is excited and proud to be a part of the school food program in America. We launched FreshKids products in schools first because we believe in making a difference. And we want to be a part of the community of committed and caring citizens nourishing millions of school children every day!
                <br><br>
                Please join FreshKids to support the hard-working people who are reshaping local and national food systems, teaching kids about where food comes from, and feeding millions of children healthy meals of the day – every day in thousands of schools across the country.</p>
        </div>
    </div>

    <div class="school_img2">
        <div class="row">
            <div class="table">
                <img src="<?php echo THEME_DIR;?>/images/school/table.png" alt=" ">

                <a href="" class="school_play_btn">
                    <img src="<?php echo THEME_DIR;?>/images/school/play.png" alt=" ">
                </a>
            </div>

            <h3>learn how and why school lunches have changed!</h3>
            <p>Lorem ipsum dolor sit amet, consectetur Lorem ipsum dolor sit amet, consectetur </p>
        </div>
    </div>

    <div class="row">
        <div class="about_text">
            <div class="title_box">
                <img src="<?php echo THEME_DIR;?>/images/school/meals.png" alt=" ">
                <h1>SCHOOL MEALS ARE <br><span>HEALTHIER THAN EVER!</span></h1>
            </div>
            <p>More than 30 million American children eat school lunches each day.Moms can feel good about this fact because these meals are healthier than ever, which means that kids get the good nutrition they need to learn and do their best in school
            </p>
        </div>
    </div>

    <div class="photoshoot">
        <div class="row">
            <h1>joey needs to photoshoot</h1>
        </div>
    </div>

    <div class="row">
        <div class="about_text">
            <div class="title_box">
                <img src="<?php echo THEME_DIR;?>/images/school/player.png" alt=" ">
                <h1>Lorem Ipsum<br><span>dolor sit amet</span></h1>
            </div>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.<br><br>

                For more info, email us at
                <a href="#"> schools@wearefreshkids.com </a>
            </p>
        </div>
    </div>

    <div class="about_text fresh_voice">
        <div class="row">
            <div class="title_box">
                <img src="<?php echo THEME_DIR;?>/images/about/about_icon4.png" alt=" ">
                <h1>school <span>VOICE</span></h1>
            </div>

            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            </p>

        </div>
        <!-- 4 related fresh kids posts -->
        <div class="blog_index_items">
                <?php
                //get all blot posts
                $temp = $wp_query;
                $wp_query = new WP_Query('post_type=post&posts_per_page=1&orderby=date&posts_per_page=4');
                if ( have_posts() ) : ?>
                    <div class="blog_index_items">
                        <ul class="blog_index_list">
                            <?php
                            // Start the Loop.
                            while ( have_posts() ) : the_post(); ?>
                                <li class="item data1">
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
        <!-- .freesh kids posts -->

    </div>
        <!-- social part -->
        <?php
        get_template_part('content','socials');
        ?>
    </div>

    <div class="clearfix"></div>

    </div><!-- .page .blog_page -->
<?php get_footer();?>