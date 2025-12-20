<?php
/**
 * Theme Header
 *
 * @package Bima_Studio
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link sr-only" href="#main-content"><?php esc_html_e( 'Skip to content', 'bima-studio' ); ?></a>

<header class="site-header" id="site-header">
    <div class="container">
        <div class="header-inner">
            <!-- Logo -->
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-logo" rel="home">
                <?php if ( has_custom_logo() ) : ?>
                    <?php the_custom_logo(); ?>
                <?php else : ?>
                    <?php echo esc_html( get_bloginfo( 'name' ) ); ?>
                    <span>.</span>
                <?php endif; ?>
            </a>

            <!-- Desktop Navigation -->
            <nav class="main-nav" aria-label="<?php esc_attr_e( 'Primary Navigation', 'bima-studio' ); ?>">
                <?php
                if ( has_nav_menu( 'primary' ) ) {
                    wp_nav_menu( array(
                        'theme_location' => 'primary',
                        'menu_class'     => 'nav-menu',
                        'container'      => false,
                        'depth'          => 1,
                    ) );
                } else {
                    ?>
                    <ul class="nav-menu">
                        <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'bima-studio' ); ?></a></li>
                        <li><a href="<?php echo esc_url( home_url( '/about' ) ); ?>"><?php esc_html_e( 'About', 'bima-studio' ); ?></a></li>
                        <li><a href="<?php echo esc_url( home_url( '/services' ) ); ?>"><?php esc_html_e( 'Services', 'bima-studio' ); ?></a></li>
                        <li><a href="<?php echo esc_url( home_url( '/works' ) ); ?>"><?php esc_html_e( 'Portfolio', 'bima-studio' ); ?></a></li>
                        <li><a href="<?php echo esc_url( home_url( '/blog' ) ); ?>"><?php esc_html_e( 'Blog', 'bima-studio' ); ?></a></li>
                    </ul>
                    <?php
                }
                ?>
            </nav>

            <!-- CTA Button -->
            <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn--primary nav-cta">
                <?php esc_html_e( 'Contact', 'bima-studio' ); ?>
            </a>

            <!-- Mobile Menu Toggle -->
            <button class="menu-toggle" id="menu-toggle" aria-expanded="false" aria-controls="mobile-nav" aria-label="<?php esc_attr_e( 'Toggle Navigation', 'bima-studio' ); ?>">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </div>

    <!-- Mobile Navigation -->
    <nav class="mobile-nav" id="mobile-nav" aria-label="<?php esc_attr_e( 'Mobile Navigation', 'bima-studio' ); ?>">
        <?php
        if ( has_nav_menu( 'primary' ) ) {
            wp_nav_menu( array(
                'theme_location' => 'primary',
                'menu_class'     => 'nav-menu',
                'container'      => false,
                'depth'          => 1,
            ) );
        } else {
            ?>
            <ul class="nav-menu">
                <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'bima-studio' ); ?></a></li>
                <li><a href="<?php echo esc_url( home_url( '/about' ) ); ?>"><?php esc_html_e( 'About', 'bima-studio' ); ?></a></li>
                <li><a href="<?php echo esc_url( home_url( '/services' ) ); ?>"><?php esc_html_e( 'Services', 'bima-studio' ); ?></a></li>
                <li><a href="<?php echo esc_url( home_url( '/works' ) ); ?>"><?php esc_html_e( 'Portfolio', 'bima-studio' ); ?></a></li>
                <li><a href="<?php echo esc_url( home_url( '/blog' ) ); ?>"><?php esc_html_e( 'Blog', 'bima-studio' ); ?></a></li>
                <li><a href="<?php echo esc_url( home_url( '/contact' ) ); ?>"><?php esc_html_e( 'Contact', 'bima-studio' ); ?></a></li>
            </ul>
            <?php
        }
        ?>
    </nav>
</header>

<main id="main-content" class="site-main">
