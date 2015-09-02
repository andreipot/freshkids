<article id="page-<?php the_ID(); ?>" <?php post_class( 'container' ); ?>>
<div class="row">
    <?php if ( has_post_thumbnail() ) : ?>
        <div class="page-thumbnail">
            <?php the_post_thumbnail( 'full' ); ?>
        </div><!-- .page-thumbnail -->
    <?php endif; ?>

    <div class="page-content">
        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

        <div class="entry-content">
            <?php the_content(); ?>
        </div><!-- .entry-content -->
    </div><!-- .page-content -->
</div><!-- .row -->
</article>