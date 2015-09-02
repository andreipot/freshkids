<?php if ( is_active_sidebar( 'page-sidebar' ) ) : ?>

	<div class="page-sidebar" role="complementary">
		<?php dynamic_sidebar( 'page-sidebar' ); ?>
	</div><!-- .page-sidebar -->

<?php endif; ?>