<?php
/**
 * Bima Studio Theme Functions
 *
 * Copyright (c) 2024 Bima Kharisma Wicaksana
 * GitHub: https://github.com/bimakw
 *
 * Licensed under MIT License with Attribution Requirement.
 * See LICENSE file for details.
 *
 * @package Bima_Studio
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'BIMA_STUDIO_VERSION', '1.0.0' );
define( 'BIMA_STUDIO_DIR', get_template_directory() );
define( 'BIMA_STUDIO_URI', get_template_directory_uri() );

/**
 * Theme Setup
 */
function bima_studio_setup() {
    // Add theme support
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'custom-logo', array(
        'height'      => 80,
        'width'       => 200,
        'flex-height' => true,
        'flex-width'  => true,
    ) );
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ) );
    add_theme_support( 'customize-selective-refresh-widgets' );
    add_theme_support( 'responsive-embeds' );

    // Add image sizes
    add_image_size( 'bima-portfolio-thumb', 600, 450, true );
    add_image_size( 'bima-portfolio-large', 1200, 800, true );
    add_image_size( 'bima-hero', 1920, 1080, true );

    // Register navigation menus
    register_nav_menus( array(
        'primary' => esc_html__( 'Primary Menu', 'bima-studio' ),
        'footer'  => esc_html__( 'Footer Menu', 'bima-studio' ),
    ) );

    // Load text domain for translations
    load_theme_textdomain( 'bima-studio', BIMA_STUDIO_DIR . '/languages' );
}
add_action( 'after_setup_theme', 'bima_studio_setup' );

/**
 * Enqueue scripts and styles
 */
function bima_studio_scripts() {
    // Google Fonts
    wp_enqueue_style(
        'bima-studio-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:wght@600;700;800&display=swap',
        array(),
        BIMA_STUDIO_VERSION
    );

    // Main stylesheet
    wp_enqueue_style(
        'bima-studio-style',
        get_stylesheet_uri(),
        array(),
        BIMA_STUDIO_VERSION
    );

    // Additional styles
    wp_enqueue_style(
        'bima-studio-main',
        BIMA_STUDIO_URI . '/assets/css/main.css',
        array( 'bima-studio-style' ),
        BIMA_STUDIO_VERSION
    );

    // Main JavaScript
    wp_enqueue_script(
        'bima-studio-main',
        BIMA_STUDIO_URI . '/assets/js/main.js',
        array(),
        BIMA_STUDIO_VERSION,
        true
    );

    // Localize script
    wp_localize_script( 'bima-studio-main', 'bimaStudio', array(
        'ajaxUrl' => admin_url( 'admin-ajax.php' ),
        'nonce'   => wp_create_nonce( 'bima_studio_nonce' ),
    ) );

    // Comment reply script
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'bima_studio_scripts' );

/**
 * Register widget areas
 */
function bima_studio_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'bima-studio' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here.', 'bima-studio' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer Widget 1', 'bima-studio' ),
        'id'            => 'footer-1',
        'description'   => esc_html__( 'First footer widget area.', 'bima-studio' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer Widget 2', 'bima-studio' ),
        'id'            => 'footer-2',
        'description'   => esc_html__( 'Second footer widget area.', 'bima-studio' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );
}
add_action( 'widgets_init', 'bima_studio_widgets_init' );

/**
 * Include theme files
 */
require BIMA_STUDIO_DIR . '/inc/custom-post-types.php';
require BIMA_STUDIO_DIR . '/inc/customizer.php';
require BIMA_STUDIO_DIR . '/inc/template-functions.php';

/**
 * Custom body classes
 */
function bima_studio_body_classes( $classes ) {
    if ( is_front_page() ) {
        $classes[] = 'front-page';
    }
    if ( is_singular() ) {
        $classes[] = 'singular';
    }
    return $classes;
}
add_filter( 'body_class', 'bima_studio_body_classes' );

/**
 * Add custom classes to navigation menu items
 */
function bima_studio_nav_menu_link_attributes( $atts, $item, $args ) {
    if ( isset( $args->theme_location ) && 'primary' === $args->theme_location ) {
        $atts['class'] = isset( $atts['class'] ) ? $atts['class'] . ' nav-link' : 'nav-link';
    }
    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'bima_studio_nav_menu_link_attributes', 10, 3 );

/**
 * Excerpt length
 */
function bima_studio_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'bima_studio_excerpt_length' );

/**
 * Excerpt more
 */
function bima_studio_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'bima_studio_excerpt_more' );

/**
 * Add defer attribute to scripts
 */
function bima_studio_defer_scripts( $tag, $handle ) {
    if ( 'bima-studio-main' === $handle ) {
        return str_replace( ' src', ' defer src', $tag );
    }
    return $tag;
}
add_filter( 'script_loader_tag', 'bima_studio_defer_scripts', 10, 2 );

/**
 * Disable WordPress emoji
 */
function bima_studio_disable_emojis() {
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
}
add_action( 'init', 'bima_studio_disable_emojis' );

/**
 * Remove WordPress version from head
 */
remove_action( 'wp_head', 'wp_generator' );
