<?php
/**
 * Template Name: Contact Page
 */
get_header(); ?>
    <div class="page contact">
        <div class="contact_wrapper">
            <div class="contact_forms">
                <div class="row">
                    <div class="contact_img">
                        <img src="<?php echo THEME_DIR;?>/images/contact/spaceship.png" alt=" ">
                    </div>

                    <div class="contact_content">
                        <h1>Contact<br><span>Fresh Kids</span></h1>

                        <p class="contact_subtitle">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        </p>

                        <div class="contact_info_links">
                            <ul>
                                <li>
                                    <a href="#" class="phone_icon">844-FRSHKDS (844-377-4537)</a>
                                </li>
                                <li>
                                    <a href="#" class="email_icon">info@wearefreshkids.com</a>
                                </li>
                            </ul>
                        </div>
                        <?php while ( have_posts() ) : the_post(); ?>
                        <ul class="contact_forms_list">
                            <?php the_content(); ?>

                        </ul>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>

            <div class="contact_locations">
                <div class="row">
                    <!-- additional repeat fields -->

                    <!--repeat -->
                    <?php
                    if(have_rows('additional_fields')) :
                        $index = 0;
                        while(have_rows('additional_fields')): the_row(); ?>
                            <div class="contact_location_box">
                                <div class="contact_location_wrapper">
                                    <div class="contact_location_img">
                                        <img src="<?php the_sub_field('image'); ?>" alt=" ">
                                    </div>

                                    <div class="contact_location_content">
                                        <h2><?php the_sub_field('sub_title'); ?></h2>
                                        <h2 class="subtitle"><?php the_sub_field('location'); ?></h2>
                                        <p><?php the_sub_field('introduction'); ?></p>
                                    </div>
                                </div>
                            </div>
                            <?php
                            $index++;
                        endwhile;
                    endif;
                    ?>
                    <!-- .repeat -->

                    <!-- .additional repeater fields-->
                </div>
            </div>
        </div>

        <section id="home-socials" class="blog-socials-bg">
            <div class="waves"></div>
            <div class="container">
                <div class="row">

                    <div class="socials-image1">
                        <img src="<?php echo THEME_DIR;?>/images/general/footer_character.png" alt=" ">
                    </div><!-- .socials-image1 -->

                    <div class="socials-content">
                        <ul class="footer-socials-list">
                            <li>
                                <a href="#"  class="cloud_social">
                                    <svg class="icon_80_60"><use xlink:href="#svg_cloud_facebook"></use></svg>
                                </a>
                            </li>

                            <li>
                                <a href="#"  class="cloud_social">
                                    <svg class="icon_80_60"><use xlink:href="#svg_cloud_twitter"></use></svg>
                                </a>
                            </li>

                            <li>
                                <a href="#"  class="cloud_social">
                                    <svg class="icon_80_60"><use xlink:href="#svg_cloud_instagram"></use></svg>
                                </a>
                            </li>

                            <li>
                                <a href="#"  class="cloud_social">
                                    <svg class="icon_80_60"><use xlink:href="#svg_cloud_pinterest"></use></svg>
                                </a>
                            </li>
                        </ul>
                    </div><!-- .healthy-school-content -->

                    <div class="socials-image2">
                        <img src="<?php echo THEME_DIR;?>/images/general/footer_island.png" alt=" ">
                    </div><!-- .socials-image2 -->

                </div><!-- .row -->
            </div><!-- .container -->
        </section><!-- #socials-school -->
    </div><!-- .page .blog_page -->
<?php get_footer();?>