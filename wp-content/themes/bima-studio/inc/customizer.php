<?php
/**
 * Theme Customizer Settings
 *
 * @package Bima_Studio
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Register Customizer Settings
 */
function bima_studio_customize_register( $wp_customize ) {

    // =========================================================================
    // Social Links Section
    // =========================================================================
    $wp_customize->add_section( 'bima_studio_social', array(
        'title'       => __( 'Social Links', 'bima-studio' ),
        'description' => __( 'Add your social media profile URLs.', 'bima-studio' ),
        'priority'    => 120,
    ) );

    // GitHub
    $wp_customize->add_setting( 'bima_studio_github', array(
        'default'           => 'https://github.com/bimakw',
        'sanitize_callback' => 'esc_url_raw',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( 'bima_studio_github', array(
        'label'   => __( 'GitHub URL', 'bima-studio' ),
        'section' => 'bima_studio_social',
        'type'    => 'url',
    ) );

    // LinkedIn
    $wp_customize->add_setting( 'bima_studio_linkedin', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( 'bima_studio_linkedin', array(
        'label'   => __( 'LinkedIn URL', 'bima-studio' ),
        'section' => 'bima_studio_social',
        'type'    => 'url',
    ) );

    // Twitter/X
    $wp_customize->add_setting( 'bima_studio_twitter', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( 'bima_studio_twitter', array(
        'label'   => __( 'Twitter/X URL', 'bima-studio' ),
        'section' => 'bima_studio_social',
        'type'    => 'url',
    ) );

    // Email
    $wp_customize->add_setting( 'bima_studio_email', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_email',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( 'bima_studio_email', array(
        'label'   => __( 'Email Address', 'bima-studio' ),
        'section' => 'bima_studio_social',
        'type'    => 'email',
    ) );

    // =========================================================================
    // Contact Info Section
    // =========================================================================
    $wp_customize->add_section( 'bima_studio_contact', array(
        'title'       => __( 'Contact Information', 'bima-studio' ),
        'description' => __( 'Add your contact details.', 'bima-studio' ),
        'priority'    => 121,
    ) );

    // Phone
    $wp_customize->add_setting( 'bima_studio_phone', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( 'bima_studio_phone', array(
        'label'   => __( 'Phone Number', 'bima-studio' ),
        'section' => 'bima_studio_contact',
        'type'    => 'text',
    ) );

    // Address
    $wp_customize->add_setting( 'bima_studio_address', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( 'bima_studio_address', array(
        'label'   => __( 'Address', 'bima-studio' ),
        'section' => 'bima_studio_contact',
        'type'    => 'textarea',
    ) );

    // =========================================================================
    // Colors Section
    // =========================================================================
    $wp_customize->add_setting( 'bima_studio_primary_color', array(
        'default'           => '#2563eb',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bima_studio_primary_color', array(
        'label'   => __( 'Primary Color', 'bima-studio' ),
        'section' => 'colors',
    ) ) );

    $wp_customize->add_setting( 'bima_studio_secondary_color', array(
        'default'           => '#10b981',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bima_studio_secondary_color', array(
        'label'   => __( 'Secondary Color', 'bima-studio' ),
        'section' => 'colors',
    ) ) );

    // =========================================================================
    // Hero Section
    // =========================================================================
    $wp_customize->add_section( 'bima_studio_hero', array(
        'title'       => __( 'Hero Section', 'bima-studio' ),
        'description' => __( 'Customize the homepage hero section.', 'bima-studio' ),
        'priority'    => 122,
    ) );

    // Hero Title
    $wp_customize->add_setting( 'bima_studio_hero_title', array(
        'default'           => __( 'Crafting Digital Experiences That Matter', 'bima-studio' ),
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( 'bima_studio_hero_title', array(
        'label'   => __( 'Hero Title', 'bima-studio' ),
        'section' => 'bima_studio_hero',
        'type'    => 'text',
    ) );

    // Hero Description
    $wp_customize->add_setting( 'bima_studio_hero_description', array(
        'default'           => __( 'We build modern, scalable web applications and digital solutions that help businesses grow.', 'bima-studio' ),
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( 'bima_studio_hero_description', array(
        'label'   => __( 'Hero Description', 'bima-studio' ),
        'section' => 'bima_studio_hero',
        'type'    => 'textarea',
    ) );

    // Stats
    $wp_customize->add_setting( 'bima_studio_stat_projects', array(
        'default'           => '50+',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( 'bima_studio_stat_projects', array(
        'label'   => __( 'Projects Completed', 'bima-studio' ),
        'section' => 'bima_studio_hero',
        'type'    => 'text',
    ) );

    $wp_customize->add_setting( 'bima_studio_stat_years', array(
        'default'           => '5+',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( 'bima_studio_stat_years', array(
        'label'   => __( 'Years Experience', 'bima-studio' ),
        'section' => 'bima_studio_hero',
        'type'    => 'text',
    ) );

    $wp_customize->add_setting( 'bima_studio_stat_satisfaction', array(
        'default'           => '100%',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( 'bima_studio_stat_satisfaction', array(
        'label'   => __( 'Client Satisfaction', 'bima-studio' ),
        'section' => 'bima_studio_hero',
        'type'    => 'text',
    ) );
}
add_action( 'customize_register', 'bima_studio_customize_register' );

/**
 * Output Custom CSS
 */
function bima_studio_customizer_css() {
    $primary_color   = get_theme_mod( 'bima_studio_primary_color', '#2563eb' );
    $secondary_color = get_theme_mod( 'bima_studio_secondary_color', '#10b981' );

    // Calculate darker shade for primary color
    $primary_dark = bima_studio_adjust_brightness( $primary_color, -20 );

    $custom_css = "
        :root {
            --color-primary: {$primary_color};
            --color-primary-dark: {$primary_dark};
            --color-secondary: {$secondary_color};
        }
    ";

    wp_add_inline_style( 'bima-studio-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'bima_studio_customizer_css', 20 );

/**
 * Adjust color brightness
 */
function bima_studio_adjust_brightness( $hex, $percent ) {
    $hex = ltrim( $hex, '#' );

    if ( strlen( $hex ) == 3 ) {
        $hex = $hex[0] . $hex[0] . $hex[1] . $hex[1] . $hex[2] . $hex[2];
    }

    $r = hexdec( substr( $hex, 0, 2 ) );
    $g = hexdec( substr( $hex, 2, 2 ) );
    $b = hexdec( substr( $hex, 4, 2 ) );

    $r = max( 0, min( 255, $r + ( $r * $percent / 100 ) ) );
    $g = max( 0, min( 255, $g + ( $g * $percent / 100 ) ) );
    $b = max( 0, min( 255, $b + ( $b * $percent / 100 ) ) );

    return sprintf( '#%02x%02x%02x', $r, $g, $b );
}

/**
 * Enqueue customizer preview script
 */
function bima_studio_customize_preview_js() {
    wp_enqueue_script(
        'bima-studio-customizer',
        BIMA_STUDIO_URI . '/assets/js/customizer.js',
        array( 'customize-preview' ),
        BIMA_STUDIO_VERSION,
        true
    );
}
add_action( 'customize_preview_init', 'bima_studio_customize_preview_js' );
