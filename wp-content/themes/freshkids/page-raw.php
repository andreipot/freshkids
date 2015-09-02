<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
<div class="page blog_page">
    <div class="container">
    <div class="row">
    <div class="content-wrapper">
        <div class="content">
            <div class="blog_cover">
                <img src="<?php echo THEME_DIR; ?>/images/blog/blog1.png" alt=" ">
            </div><!-- .blog_cover -->

            <div class="blog_social">
                <ul class="blog-social-icons">
                    <li><a href="https://facebook.com/"> <svg class="icon_24 color_gray"><use xlink:href="#svg_social_circle_facebook"></use></svg></a></li>
                    <li><a href="https://twitter.com/"><svg class="icon_24 color_gray"><use xlink:href="#svg_social_circle_twitter"></use></svg></a></li>
                    <li><a href="https://instagram.com/"><svg class="icon_24 color_gray"><use xlink:href="#svg_social_circle_instagram"></use></svg></a></li>
                    <li><a href="https://pinterest.com/"><svg class="icon_24 color_gray"><use xlink:href="#svg_social_circle_pinterest"></use></svg></a></li>
                </ul><!-- .blog-social-icons -->
            </div><!-- .blog_social -->

            <div class="blog_info">
                <ul class="blog_cat">
                    <li><a href="#">News</a></li>
                    <li>/</li>
                    <li><a href="#">Press</a></li>
                </ul><!-- .blog_cat -->

                <p class="blog_date">5/16/2015</p>
            </div><!-- .blog_info -->

            <div class="blog_title">
                <h1>Lorem ipsum dolor sit amet consectetur adipiscing</h1>
            </div><!-- .blog_title -->

            <div class="blog_content">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea <a href="#">commodo consequat</a>. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, <a href="#">sunt in culpa qui</a> officia deserunt mollit anim id est laborum.
                </p>

                <h2>Lorem ipsum dolor sit amet</h2>

                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>

                <h3>Lorem Ipsum Dolor Sit Amet</h3>

                <ol class="ord-list">
                    <li>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </li>
                    <li>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </li>
                    <li>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </li>
                    <li>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </li>
                </ol>

                <h3>Lorem Ipsum Dolor Sit Amet</h3>

                <ul class="dotted">
                    <li>3 1/2 Lorem ipsum dolor</li>
                    <li>1 Lorem ipsum dolor</li>
                    <li>3 Lorem ipsum dolor</li>
                    <li>1/4 Lorem ipsum dolor</li>
                    <li>2 Lorem ipsum dolor</li>
                </ul>
            </div>


            <div class="blog_thumb_posts">
                <h2>Lorem ipsum dolor sit amet</h2>

                <ul class="blog_thumb_posts_list">
                    <li>
                        <div class="post_image">
                            <img src="<?php echo THEME_DIR;?>/images/blog/blog2.png" alt=" ">
                        </div><!-- .post_image -->

                        <div class="post_content">
                            <h3>Lorem Ipsum Dolor Sit Amet</h3>

                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        </div><!-- .post_content -->
                    </li>
                    <li>
                        <div class="post_image">
                            <img src="<?php echo THEME_DIR;?>/images/blog/blog2.png" alt=" ">
                        </div><!-- .post_image -->

                        <div class="post_content">
                            <h3>Lorem Ipsum Dolor Sit Amet</h3>

                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                        </div><!-- .post_content -->
                    </li>
                </ul>
            </div><!-- .blog_thumb_posts -->

            <div class="blog_comments">

                <div class="leave_comment">
                    <h2 class="comment_title">Leave Your Comment</h2>

                    <div class="input_box input_margin">
                        <p>Name</p>
                        <input type="text" placeholder="Your name">
                    </div>

                    <div class="input_box">
                        <p>Email</p>
                        <input type="text" placeholder="Your email">
                    </div>

                    <div class="textarea_box">
                        <p>Comment</p>
                        <textarea placeholder="Your comment"></textarea>
                    </div>

                    <a href="#" class="button round">Post Comment</a>
                </div>

                <div class="comments_list">
                    <h2 class="comments_title">Comments</h2>

                    <ul class="comm_list">
                        <li>
                            <div class="comm_info">
                                <a href="#" class="comm_author">
                                    Lorem Lpsum
                                </a>
                                <p>
                                    5/16/2015
                                </p>
                            </div>

                            <div class="comm_content">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                </p>
                            </div>
                        </li>

                        <li>
                            <div class="comm_info">
                                <a href="#" class="comm_author">
                                    Lorem Lpsum
                                </a>
                                <p>
                                    5/16/2015
                                </p>
                            </div>

                            <div class="comm_content">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                </p>
                            </div>
                        </li>

                        <li>
                            <div class="comm_info">
                                <a href="#" class="comm_author">
                                    Lorem Lpsum
                                </a>
                                <p>
                                    5/16/2015
                                </p>
                            </div>

                            <div class="comm_content">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>

            </div><!-- .blog_comments -->
        </div><!-- .content -->
    </div><!-- .content-wrapper -->

    <div class="sidebar">
        <ul class="sidebar_posts">
            <li>
                <div class="post_image">
                    <img src="<?php echo THEME_DIR;?>/images/blog/blog3.png" alt=" ">
                </div>

                <div class="post_info">
                    <ul class="post_cat">
                        <li><a href="#">News</a></li>
                        <li>/</li>
                        <li><a href="#">Press</a></li>
                    </ul>
                    <a href="#" class="post_title">Lorem ipsum dolor sit amet</a>
                </div>
            </li>

            <li>
                <div class="post_image">
                    <img src="<?php echo THEME_DIR;?>/images/blog/blog3.png" alt=" ">
                </div>

                <div class="post_info">
                    <ul class="post_cat">
                        <li><a href="#">News</a></li>
                    </ul>
                    <a href="#" class="post_title">Lorem ipsum</a>
                </div>
            </li>

            <li>
                <div class="post_image">
                    <img src="<?php echo THEME_DIR;?>/images/blog/blog3.png" alt=" ">
                </div>

                <div class="post_info">
                    <ul class="post_cat">
                        <li><a href="#">News</a></li>
                    </ul>
                    <a href="#" class="post_title">Lorem ipsum</a>
                </div>
            </li>
        </ul>
    </div><!-- .sidebar -->
    </div><!-- .row -->
    </div><!-- .container -->

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
<?php endwhile; ?>
</div>
<?php get_footer(); ?>