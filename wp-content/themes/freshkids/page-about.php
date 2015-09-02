<?php
/**
 * Template Name: About Page
 */
get_header(); ?>
    <div class="page about">
    <div class="about_wrapper">
    <div class="about_img1">
        <div class="row">
            <div class="cool">
                <img src="<?php echo THEME_DIR;?>/images/about/cool.png" alt=" ">
            </div>

            <div class="boy">
                <img src="<?php echo THEME_DIR;?>/images/about/boy.png" alt=" ">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="about_text we_are_1">
            <div class="title_box">
                <img src="<?php echo THEME_DIR;?>/images/about/about_icon1.png" alt=" ">
                <h1>WE ARE <span>FRESH KIDS</span></h1>
            </div>
            <p>FreshKids believes in a healthy and happy world for kids. FreshKids is a movement to change the way kids eat and snack. We are an independent food company re-imagining and re-creating snacks for kids. FreshKids is cleaning up snack time with real foods, simple ingredients, creativity and positivity!</p>
        </div>
    </div>
    <div class="about_img2">
        <div class="row">
            <div class="happy">
                <img src="<?php echo THEME_DIR;?>/images/about/happy.png" alt=" ">
            </div>

            <div class="girl">
                <img src="<?php echo THEME_DIR;?>/images/about/girl.png" alt=" ">
            </div>
        </div>
    </div>
    <div class="about_text we_are_2">
        <div class="title_box">
            <img src="<?php echo THEME_DIR;?>/images/about/about_icon2.png" alt=" ">
            <h1>WE ARE <span>FRESH KIDS</span></h1>
        </div>
        <!--print about text -->
        <?php
            the_field('happy_text');
        ?>
    </div>

    <div class="about_text about_promise">
        <img src="<?php echo THEME_DIR;?>/images/about/about_icon5.png" alt=" " class="about_promise_img">
        <?php the_field('snack_text'); ?>
    </div>

    <div class="about_text we_are_3">
        <div class="title_box">
            <img src="<?php echo THEME_DIR;?>/images/about/about_icon3.png" alt=" ">
            <h1>You can <span>trust</span> FreshKids <br> products contain:</h1>
        </div>

        <div class="about_promise_lists">
            <div class="row">
                <div class="about_promise_list_wrapper">
                    <!--repeat -->
                    <?php
                        if(have_rows('about_bullets')) :
                            $index = 0;
                            while(have_rows('about_bullets')): the_row(); ?>
                                <?php if($index %3 ==0): ?>
                                    <ul class="hearts_list">
                                <?php endif; ?>
                                <li><p><?php the_sub_field('bullet_item'); ?></p></li>
                                <?php if($index %3 ==2): ?>
                                    </ul>
                                <?php endif; ?>
                            <?php
                            $index++;
                            endwhile;
                        endif;
                    ?>
                    <!-- .repeat -->
                </div>
            </div>
        </div>
    </div>

    <div class="about_text fresh_voice">
        <div class="row">
            <div class="title_box">
                <img src="<?php echo THEME_DIR;?>/images/about/about_icon4.png" alt=" ">
                <h1>FRESH <span>VOICE</span></h1>
            </div>

            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            </p>
        </div>

        <div class="blog_index_items">
            <ul class="blog_index_list">
                <li class="item data1">
                    <div class="blog_index_item">
                        <div class="blog_index_img">
                            <img src="<?php echo THEME_DIR;?>/images/blog/blog4.png" alt=" ">

                            <div class="blog_index_info">
                                <ul class="post_cat">
                                    <li><a href="#">News</a></li>
                                    <li>/</li>
                                    <li><a href="#">Press</a></li>
                                </ul>
                                <a href="#" class="post_title">Lorem ipsum dolor sit amet consectetur </a>

                                <div class="post_desc">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="item data1">
                    <div class="blog_index_item">
                        <div class="blog_index_img">
                            <img src="<?php echo THEME_DIR;?>/images/blog/blog4.png" alt=" ">

                            <div class="blog_index_info">
                                <ul class="post_cat">
                                    <li><a href="#">News</a></li>
                                    <li>/</li>
                                    <li><a href="#">Press</a></li>
                                </ul>
                                <a href="#" class="post_title">Lorem ipsum dolor sit</a>

                                <div class="post_desc">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="item data2">
                    <div class="blog_index_item">
                        <div class="blog_index_img">
                            <img src="<?php echo THEME_DIR;?>/images/blog/blog4.png" alt=" ">

                            <div class="blog_index_info">
                                <ul class="post_cat">
                                    <li><a href="#">News</a></li>
                                    <li>/</li>
                                    <li><a href="#">Press</a></li>
                                </ul>
                                <a href="#" class="post_title">Lorem ipsum dolor sit amet consectetur </a>

                                <div class="post_desc">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="item data2">
                    <div class="blog_index_item">
                        <div class="blog_index_img">
                            <img src="<?php echo THEME_DIR;?>/images/blog/blog4.png" alt=" ">

                            <div class="blog_index_info">
                                <ul class="post_cat">
                                    <li><a href="#">News</a></li>
                                    <li>/</li>
                                    <li><a href="#">Press</a></li>
                                </ul>
                                <a href="#" class="post_title">Lorem ipsum dolor sit amet consectetur </a>

                                <div class="post_desc">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
        <?php  get_template_part('content','socials'); ?>
    </div>

    <div class="clearfix"></div>

    </div><!-- .page .blog_page -->
<?php get_footer();?>