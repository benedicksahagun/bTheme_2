<?php
/**
 * Check and setup theme's default settings
 *
 * @package btheme
 *
 */
function setup_theme_default_settings() {

	// check if settings are set, if not set defaults.
	// Caution: DO NOT check existence using === always check with == .
	// Latest blog posts style.
	$btheme_posts_index_style = get_theme_mod( 'btheme_posts_index_style' );
	if ( '' == $btheme_posts_index_style ) {
		set_theme_mod( 'btheme_posts_index_style', 'default' );
	}

	// Sidebar position.
	$btheme_sidebar_position = get_theme_mod( 'btheme_sidebar_position' );
	if ( '' == $btheme_sidebar_position ) {
		set_theme_mod( 'btheme_sidebar_position', 'right' );
	}

	// Container width.
	$btheme_container_type = get_theme_mod( 'btheme_container_type' );
	if ( '' == $btheme_container_type ) {
		set_theme_mod( 'btheme_container_type', 'container' );
	}
}
