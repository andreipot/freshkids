<?php get_header(); ?>

<main id="main">
        <div id="intro-splash" class="full-height-intro">
            <div class="container">
                <div class="row">

                    <div id="intro-content">
                        <img src="<?php echo THEME_DIR;?>/images/home/home-we-heart-moms.png" alt="We Heart Moms!">
                    </div><!-- .intro-content -->

                    <a href="#home-healthy-school" id="intro-jump-content"><svg class="icon_36 color_red"><use xlink:href="#svg_scroll_arrow"></use></svg></a><!-- #intro-jump-content -->

                </div><!-- .row -->
            </div><!-- .container -->
        </div><!-- #intro-splash -->
<?php while ( have_posts() ) : the_post();

	// Healthy school.
	get_template_part( 'template-parts/home-healthy-school' );

	// Product tiles.
	//get_template_part( 'template-parts/home-product-tiles' );
    get_template_part('template-parts/home-products');

    // Snack Promise
    get_template_part('template-parts/home-snack-promise');

    // Moms
    get_template_part('template-parts/home-moms');

    // Subs
    get_template_part('template-parts/home-subs');

	// Social feed.
	//get_template_part( 'template-parts/home-social-feed' );
    get_template_part('template-parts/home-socials');

endwhile; ?>
</main>

<?php get_footer(); ?>