<section id="home-healthy-school">
	<div class="container">
		<div class="row">

			<div class="healthy-school-content">
				<h1><?php the_field( 'healthy_school_heading' ); ?></h1>
				<?php the_field( 'healthy_school_content' ); ?>
				<p><a href="<?php echo esc_url( get_permalink( 5 ) ); ?>" class="button round">Learn More</a></p>
			</div><!-- .healthy-school-content -->

            <div class="healthy-school-image">
                <img src="<?php echo THEME_DIR;?>/images/home/products.png" alt="Products">
            </div><!-- .healthy-school-image -->

		</div><!-- .row -->
	</div><!-- .container -->
</section><!-- #home-healthy-school -->