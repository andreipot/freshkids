<?php
/**
 * Template Name: Products Page
 */
get_header(); ?>
    <div class="page products">
    <div class="products_wrapper">
    <div class="products_img1_block">
        <div class="products_img1">
            <div class="row">
                <img src="<?php echo THEME_DIR; ?>/images/products/prod2.png" alt=" " class="prod2">
                <img src="<?php echo THEME_DIR; ?>/images/products/prod3.png" alt=" " class="prod3">
            </div>
        </div>

        <div class="row">
            <div class="puffs">
                <img src="<?php echo THEME_DIR; ?>/images/products/puffs.png" alt=" ">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="product_text">
            <div class="title_box">
                <h1><span>Fresh kids </span>Products</h1>
            </div>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div>
    </div>

    <div class="products_list_block">
        <div class="row">
            <ul class="products_list">
                <?php
                // Start the Loop.
                $temp = $wp_query;
                $wp_query = new WP_Query('post_type=product&posts_per_page=1&orderby=date&posts_per_page=8');
                while ( have_posts() ) : the_post(); ?>
                    <li class="">
                        <?php  get_template_part( 'template-parts/product-item'); ?>
                    </li>
                <?php
                    // End the loop.
                endwhile;
                ?>
                <!-- sample item-->
                <li>
                    <div class="product_item active">
                        <div class="product_img">
                            <img src="<?php echo THEME_DIR; ?>/images/products/prod1.png" alt=" ">
                        </div>

                        <div class="product_content">
                            <a href="#" class="product_title">puffs</a>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
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
                                        <img src="<?php echo THEME_DIR; ?>/images/products/nutritions.png" alt=" ">
                                    </div>
                                </div>
                            </li>
                            <li class="accordion-navigation">
                                <a href="#panel2a"  class="accordion_header">Ingredients</a>
                                <div id="panel2a" class="content">
                                    Whole Wheat Flour, Enriched Soft Red Winter Wheat Flour (Ferrous Sulfate (Iron), Niacin, Thiamin Mononitrate [Vitamin B1], Riboflavin [Vitamin B2], Folic Acid), Honey, High Oleic Expeller Pressed Sunflower Oil, Salt, Barley Malt
                                </div>
                            </li>
                        </ul>

                        <button class="close_btn">
                            <svg class="icon_36 color_red"><use xlink:href="#svg_menu_close"></use></svg>
                        </button>
                    </div>
                </li>
            </ul>
        </div>
    </div>
        <!-- socials part-->
        <?php get_template_part('content','socials'); ?>
        <!-- #socials-school -->
    </div>

    </div><!-- .page  -->
<?php get_footer();?>