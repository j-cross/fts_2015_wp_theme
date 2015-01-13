<?php
/**
 * FTS 2015 functions and definitions
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * @package FTS 2015
 * @since 0.1.0
 */
 
 // Useful global constants
define( 'FTS_2015__VERSION', '0.1.0' );
 
 /**
  * Set up theme defaults and register supported WordPress features.
  *
  * @uses load_theme_textdomain() For translation/localization support.
  *
  * @since 0.1.0
  */
 function fts_2015__setup() {
	/**
	 * Makes FTS 2015 available for translation.
	 *
	 * Translations can be added to the /lang directory.
	 * If you're building a theme based on FTS 2015, use a find and replace
	 * to change 'fts_2015_' to the name of your theme in all template files.
	 */
	load_theme_textdomain( 'fts_2015_', get_template_directory() . '/languages' );
 }
 add_action( 'after_setup_theme', 'fts_2015__setup' );

 /**
  * Setup WP's customizer for custom tuning of the theme in the 'Customize' section
  *
  * @since 0.1.0
  */
 function fts_2015_customize_register(){

 } 
 add_action('customize_register', 'fts_2015_customize_register');

 function fts_2015_add_page_meta(){
    add_meta_box( 'fts_2015_page_settings', __( 'Page Settings' ), 'fts_2015_page_settings_output', 'page', 'side', 'default'  );
 }
 add_action('add_meta_boxes', 'fts_2015_add_page_meta');
 function fts_2015_page_settings_output(){
  echo 'Page Settings Go Here';
 }
 
 /**
  * Enqueue scripts and styles for front-end.
  *
  * @since 0.1.0
  */
 function fts_2015__scripts_styles() {
	$postfix = ( defined( 'SCRIPT_DEBUG' ) && true === SCRIPT_DEBUG ) ? '' : '.min';

//TODO: add {$postfix} back to the enqueues before pushing live for min versions.
	wp_enqueue_script( 'fts_2015_', get_template_directory_uri() . "/assets/js/fts_2015.js", array('jquery'), FTS_2015__VERSION, true );
		
	wp_enqueue_style( 'fts_2015_', get_template_directory_uri() . "/assets/css/fts_2015.css", array(), FTS_2015__VERSION );
 }
 add_action( 'wp_enqueue_scripts', 'fts_2015__scripts_styles' );
 
 /**
  * Add humans.txt to the <head> element.
  */
 function fts_2015__header_meta() {
	$humans = '<link type="text/plain" rel="author" href="' . get_template_directory_uri() . '/humans.txt" />';
	
	echo apply_filters( 'fts_2015__humans', $humans );
 }
 add_action( 'wp_head', 'fts_2015__header_meta' );