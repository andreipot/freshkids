<?php
global $wp_query;

echo 'in paginatino';
$big = 999999999; // need an unlikely integer
$translated = __( 'Page', 'freshkids' ); // Supply translatable string
$args = array(
	'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	'format' => '?paged=%#%',
	'current' => max( 1, get_query_var('paged') ),
	'total' => $wp_query->max_num_pages
);?>
<div class="pagination">
	<?php echo paginate_links( $args);?>
</div>
