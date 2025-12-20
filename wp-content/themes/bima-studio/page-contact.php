<?php
/**
 * Template Name: Contact Page
 *
 * @package Bima_Studio
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();
?>

<!-- Page Header -->
<section class="section" style="padding-top: calc(80px + var(--spacing-3xl));">
    <div class="container">
        <header class="section-header">
            <h1><?php the_title(); ?></h1>
            <p class="lead"><?php esc_html_e( 'Have a project in mind? Let\'s talk about how I can help bring your ideas to life.', 'bima-studio' ); ?></p>
        </header>
    </div>
</section>

<!-- Contact Content -->
<section class="section section--alt">
    <div class="container">
        <div class="contact-content">
            <!-- Contact Info -->
            <div class="contact-info">
                <h3><?php esc_html_e( 'Get in Touch', 'bima-studio' ); ?></h3>
                <p><?php esc_html_e( 'I\'m always open to discussing new projects, creative ideas, or opportunities to be part of your visions.', 'bima-studio' ); ?></p>

                <?php
                $email   = get_theme_mod( 'bima_studio_email', 'hello@bimastudio.com' );
                $phone   = get_theme_mod( 'bima_studio_phone', '' );
                $address = get_theme_mod( 'bima_studio_address', '' );
                ?>

                <div class="contact-item">
                    <div class="contact-icon">
                        <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                    </div>
                    <div>
                        <strong><?php esc_html_e( 'Email', 'bima-studio' ); ?></strong>
                        <p class="mb-0">
                            <a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?></a>
                        </p>
                    </div>
                </div>

                <?php if ( ! empty( $phone ) ) : ?>
                    <div class="contact-item">
                        <div class="contact-icon">
                            <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                        </div>
                        <div>
                            <strong><?php esc_html_e( 'Phone', 'bima-studio' ); ?></strong>
                            <p class="mb-0">
                                <a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $phone ) ); ?>"><?php echo esc_html( $phone ); ?></a>
                            </p>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if ( ! empty( $address ) ) : ?>
                    <div class="contact-item">
                        <div class="contact-icon">
                            <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                        </div>
                        <div>
                            <strong><?php esc_html_e( 'Location', 'bima-studio' ); ?></strong>
                            <p class="mb-0"><?php echo esc_html( $address ); ?></p>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Social Links -->
                <div style="margin-top: var(--spacing-xl);">
                    <strong><?php esc_html_e( 'Connect with me', 'bima-studio' ); ?></strong>
                    <div class="social-links" style="margin-top: var(--spacing-sm);">
                        <?php
                        $github   = get_theme_mod( 'bima_studio_github', 'https://github.com/bimakw' );
                        $linkedin = get_theme_mod( 'bima_studio_linkedin', '' );
                        $twitter  = get_theme_mod( 'bima_studio_twitter', '' );
                        ?>

                        <?php if ( ! empty( $github ) ) : ?>
                            <a href="<?php echo esc_url( $github ); ?>" class="social-link" target="_blank" rel="noopener noreferrer" aria-label="GitHub" style="background: var(--color-dark);">
                                <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                            </a>
                        <?php endif; ?>

                        <?php if ( ! empty( $linkedin ) ) : ?>
                            <a href="<?php echo esc_url( $linkedin ); ?>" class="social-link" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn" style="background: #0077b5;">
                                <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                            </a>
                        <?php endif; ?>

                        <?php if ( ! empty( $twitter ) ) : ?>
                            <a href="<?php echo esc_url( $twitter ); ?>" class="social-link" target="_blank" rel="noopener noreferrer" aria-label="Twitter" style="background: #1da1f2;">
                                <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="contact-form">
                <h3><?php esc_html_e( 'Send a Message', 'bima-studio' ); ?></h3>

                <?php
                // Check for Contact Form 7
                if ( shortcode_exists( 'contact-form-7' ) ) :
                    // Replace with your Contact Form 7 shortcode
                    echo do_shortcode( '[contact-form-7 id="contact-form" title="Contact Form"]' );
                else :
                    ?>
                    <form id="contact-form" action="" method="post">
                        <?php wp_nonce_field( 'bima_contact_form', 'bima_contact_nonce' ); ?>

                        <div class="form-group">
                            <label for="name"><?php esc_html_e( 'Name', 'bima-studio' ); ?> <span>*</span></label>
                            <input type="text" id="name" name="name" required>
                        </div>

                        <div class="form-group">
                            <label for="email"><?php esc_html_e( 'Email', 'bima-studio' ); ?> <span>*</span></label>
                            <input type="email" id="email" name="email" required>
                        </div>

                        <div class="form-group">
                            <label for="subject"><?php esc_html_e( 'Subject', 'bima-studio' ); ?></label>
                            <input type="text" id="subject" name="subject">
                        </div>

                        <div class="form-group">
                            <label for="message"><?php esc_html_e( 'Message', 'bima-studio' ); ?> <span>*</span></label>
                            <textarea id="message" name="message" rows="5" required></textarea>
                        </div>

                        <button type="submit" class="btn btn--primary" style="width: 100%;">
                            <?php esc_html_e( 'Send Message', 'bima-studio' ); ?>
                        </button>
                    </form>
                    <?php
                endif;
                ?>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section (Optional) -->
<section class="section">
    <div class="container">
        <header class="section-header">
            <h2><?php esc_html_e( 'Frequently Asked Questions', 'bima-studio' ); ?></h2>
        </header>

        <div style="max-width: 800px; margin: 0 auto;">
            <?php
            $faqs = array(
                array(
                    'question' => __( 'What is your typical project timeline?', 'bima-studio' ),
                    'answer'   => __( 'Project timelines vary based on scope and complexity. A simple website might take 2-4 weeks, while complex applications can take several months. I provide detailed estimates after our initial discussion.', 'bima-studio' ),
                ),
                array(
                    'question' => __( 'Do you offer ongoing support and maintenance?', 'bima-studio' ),
                    'answer'   => __( 'Yes, I offer ongoing support and maintenance packages. This includes bug fixes, security updates, and minor feature additions to keep your application running smoothly.', 'bima-studio' ),
                ),
                array(
                    'question' => __( 'How do you handle project communication?', 'bima-studio' ),
                    'answer'   => __( 'I believe in clear and regular communication. We can use tools like Slack, email, or video calls for updates. I typically provide weekly progress reports and am available for questions during business hours.', 'bima-studio' ),
                ),
                array(
                    'question' => __( 'What is your payment structure?', 'bima-studio' ),
                    'answer'   => __( 'Typically, projects start with a 30-50% upfront deposit, with the remainder due upon completion. For larger projects, we can arrange milestone-based payments.', 'bima-studio' ),
                ),
            );

            foreach ( $faqs as $index => $faq ) :
                ?>
                <div class="faq-item">
                    <button class="faq-question" aria-expanded="false" aria-controls="faq-<?php echo esc_attr( $index ); ?>">
                        <?php echo esc_html( $faq['question'] ); ?>
                        <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    <div class="faq-answer" id="faq-<?php echo esc_attr( $index ); ?>">
                        <p><?php echo esc_html( $faq['answer'] ); ?></p>
                    </div>
                </div>
                <?php
            endforeach;
            ?>
        </div>
    </div>
</section>

<?php
get_footer();
