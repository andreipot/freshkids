/**
 * Main project JS
 */
jQuery(document).foundation();

jQuery(document).ready(function($) {

	var $window      = $(window);
	var $navToggle   = $('.navbar-toggle');
	var $siteMenu    = $('#site-menu');
	var $socialIcons = $('.header-right');

	var windowWidth  = $window.width();

	// Placeholder polyfill.
	$('input, textarea').placeholder();

	// Handle responsive menu toggling.
	$navToggle.click(function() {

		if ( $(this).hasClass('active') ) {
			resetHeaderIcons();
		} else {
			positionHeaderIcons();
		}

		$(this).toggleClass('active');
		$siteMenu.toggleClass('open');

		return false;
	});

	$window.resize(function() {
		windowWidth = $window.width();

		if ( windowWidth > 641 ) {
			resetHeaderIcons();
		} else if ( $siteMenu.hasClass('open') ) {
			positionHeaderIcons();
		}

		if ( windowWidth > 1025 ) {
			$navToggle.removeClass('active');
			$siteMenu.removeClass('open');
		}
	});

	/**
	 * Place the social media icons at the bottom of the open menu
	 * at the smallest breakpoint.
	 */
	function positionHeaderIcons() {

		// Only reposition social media icons at smallest breakpoint.
		if ( windowWidth <= 641 ) {
			var socialIconWidth = $socialIcons.width();

			// header height + menu height - position from bottom of menu.
			var top = 71 + $siteMenu.outerHeight() - 48;

			$socialIcons.css({
				left: '50%',
				marginLeft: '-' + parseFloat(socialIconWidth / 2) + 'px',
				position: 'absolute',
				top: top + 'px',
				zIndex: 101
			}).show();
		}
	}

	function resetHeaderIcons() {
		$socialIcons.removeAttr('style');
		$socialIcons.find('> ul').removeAttr('style');
	}

});