<?php
/**
 * 404 page template.
 */

get_header(); ?>

<article class="error-404 not-found page container">
	<div class="row">
		<div class="page-content">
			<h1 class="entry-title"><?php _e( 'Page Not Found' ); ?></h1>

			<div class="entry-content">
				<p><?php _e( ' The page you were looking for could not be found! Please use the navigation menu on the left.', 'pollen' ); ?></p>
			</div><!-- .entry-content -->
		</div><!-- .page-content -->
	</div><!-- .row -->
</article>

<?php get_footer(); ?>