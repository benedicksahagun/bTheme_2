<?php
/**
 * Understrap Theme Customizer
 *
 * @package btheme
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
if ( ! function_exists( 'btheme_customize_register' ) ) {
	/**
	 * Register basic customizer support.
	 *
	 * @param object $wp_customize Customizer reference.
	 */
	function btheme_customize_register( $wp_customize ) {
		$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
		$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	}
}
add_action( 'customize_register', 'btheme_customize_register' );

if ( ! function_exists( 'btheme_theme_customize_register' ) ) {
	/**
	 * Register individual settings through customizer's API.
	 *
	 * @param WP_Customize_Manager $wp_customize Customizer reference.
	 */
	function btheme_theme_customize_register( $wp_customize ) {

		// Theme layout settings.
		$wp_customize->add_section( 'btheme_theme_layout_options', array(
			'title'       => __( 'Theme Layout Settings', 'btheme' ),
			'capability'  => 'edit_theme_options',
			'description' => __( 'Container width and sidebar defaults', 'btheme' ),
			'priority'    => 160,
		) );

		$wp_customize->add_setting( 'btheme_container_type', array(
			'default'           => 'container',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'esc_textarea',
			'capability'        => 'edit_theme_options',
		) );

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'container_type', array(
					'label'       => __( 'Container Width', 'btheme' ),
					'description' => __( "Choose between Bootstrap's container and container-fluid", 'btheme' ),
					'section'     => 'btheme_theme_layout_options',
					'settings'    => 'btheme_container_type',
					'type'        => 'select',
					'choices'     => array(
						'container'       => __( 'Fixed width container', 'btheme' ),
						'container-fluid' => __( 'Full width container', 'btheme' ),
					),
					'priority'    => '10',
				)
			) );

		$wp_customize->add_setting( 'btheme_sidebar_position', array(
			'default'           => 'right',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'esc_textarea',
			'capability'        => 'edit_theme_options',
		) );

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'btheme_sidebar_position', array(
					'label'       => __( 'Sidebar Positioning', 'btheme' ),
					'description' => __( "Set sidebar's default position. Can either be: right, left, both or none. Note: this can be overridden on individual pages.",
					'btheme' ),
					'section'     => 'btheme_theme_layout_options',
					'settings'    => 'btheme_sidebar_position',
					'type'        => 'select',
					'choices'     => array(
						'right' => __( 'Right sidebar', 'btheme' ),
						'left'  => __( 'Left sidebar', 'btheme' ),
						'both'  => __( 'Left & Right sidebars', 'btheme' ),
						'none'  => __( 'No sidebar', 'btheme' ),
					),
					'priority'    => '20',
				)
			) );
	}
} // endif function_exists( 'btheme_theme_customize_register' ).
add_action( 'customize_register', 'btheme_theme_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
if ( ! function_exists( 'btheme_customize_preview_js' ) ) {
	/**
	 * Setup JS integration for live previewing.
	 */
	function btheme_customize_preview_js() {
		wp_enqueue_script( 'btheme_customizer', get_template_directory_uri() . '/js/customizer.js',
			array( 'customize-preview' ), '20130508', true );
	}
}
add_action( 'customize_preview_init', 'btheme_customize_preview_js' );
