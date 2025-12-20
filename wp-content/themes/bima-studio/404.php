<?php
/**
 * 404 Error Page
 *
 * @package Bima_Studio
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();
?>

<section class="error-404">
    <div class="container text-center">
        <h1>404</h1>
        <h2><?php esc_html_e( 'Page Not Found', 'bima-studio' ); ?></h2>
        <p class="lead">
            <?php esc_html_e( 'The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.', 'bima-studio' ); ?>
        </p>
        <div class="hero-actions" style="justify-content: center; margin-top: 2rem;">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn--primary">
                <?php esc_html_e( 'Back to Home', 'bima-studio' ); ?>
            </a>
            <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn--secondary">
                <?php esc_html_e( 'Contact Us', 'bima-studio' ); ?>
            </a>
        </div>
    </div>
</section>

<?php
get_footer();
