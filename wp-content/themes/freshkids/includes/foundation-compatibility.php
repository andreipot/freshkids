<?php

/**
 * Add 'active' foundation class to current menu item.
 *
 * @param array  $classes
 * @param object $item
 *
 * @return array
 */
function pb_foundation_active_nav_class( $classes, $item ) {

	if ( $item->current || $item->current_item_ancestor ) {
		$classes[] = 'active';
	}

	return $classes;
}
add_filter( 'nav_menu_css_class', 'pb_foundation_active_nav_class', 10, 2 );