<?php if ( have_rows( 'products' ) ) : ?>
	<div id="homepage-product-tiles">
		<?php while ( have_rows( 'products' ) ) : the_row(); ?>

			<article>

			</article>

		<?php endwhile; ?>
	</div><!-- #homepage-product-tiles -->
<?php endif; ?>