<?php
/**
 * Front Page Template
 *
 * @package Bima_Studio
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();
?>

<!-- Hero Section -->
<section class="hero">
    <div class="container">
        <div class="hero-content animate-fade-in-up">
            <span class="hero-subtitle"><?php esc_html_e( 'Welcome to Bima Studio', 'bima-studio' ); ?></span>

            <h1 class="hero-title">
                <?php esc_html_e( 'Crafting Digital', 'bima-studio' ); ?>
                <span><?php esc_html_e( 'Experiences', 'bima-studio' ); ?></span>
                <?php esc_html_e( 'That Matter', 'bima-studio' ); ?>
            </h1>

            <p class="hero-description">
                <?php esc_html_e( 'We build modern, scalable web applications and digital solutions that help businesses grow. From backend services to cloud infrastructure.', 'bima-studio' ); ?>
            </p>

            <div class="hero-actions">
                <a href="<?php echo esc_url( home_url( '/portfolio' ) ); ?>" class="btn btn--primary btn--large">
                    <?php esc_html_e( 'View Our Work', 'bima-studio' ); ?>
                </a>
                <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn--secondary btn--large">
                    <?php esc_html_e( 'Get in Touch', 'bima-studio' ); ?>
                </a>
            </div>

            <div class="hero-stats">
                <div class="stat">
                    <span class="stat-number">50+</span>
                    <span class="stat-label"><?php esc_html_e( 'Projects Completed', 'bima-studio' ); ?></span>
                </div>
                <div class="stat">
                    <span class="stat-number">5+</span>
                    <span class="stat-label"><?php esc_html_e( 'Years Experience', 'bima-studio' ); ?></span>
                </div>
                <div class="stat">
                    <span class="stat-number">100%</span>
                    <span class="stat-label"><?php esc_html_e( 'Client Satisfaction', 'bima-studio' ); ?></span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="section section--alt" id="services">
    <div class="container">
        <header class="section-header">
            <h2><?php esc_html_e( 'What We Do', 'bima-studio' ); ?></h2>
            <p class="lead"><?php esc_html_e( 'We offer a range of services to help you build and scale your digital presence.', 'bima-studio' ); ?></p>
        </header>

        <div class="grid grid--3 stagger-children">
            <?php
            $services = bima_studio_get_services();

            if ( $services->have_posts() ) :
                while ( $services->have_posts() ) :
                    $services->the_post();
                    ?>
                    <div class="service-card">
                        <div class="service-icon">
                            <?php echo esc_html( get_post_meta( get_the_ID(), '_bima_service_icon', true ) ?: '🚀' ); ?>
                        </div>
                        <h3><?php the_title(); ?></h3>
                        <p><?php echo esc_html( get_the_excerpt() ); ?></p>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();
            else :
                // Default services if no CPT entries
                $default_services = array(
                    array(
                        'icon'        => '💻',
                        'title'       => __( 'Web Development', 'bima-studio' ),
                        'description' => __( 'Modern, responsive websites built with the latest technologies. From simple landing pages to complex web applications.', 'bima-studio' ),
                    ),
                    array(
                        'icon'        => '⚙️',
                        'title'       => __( 'Backend Development', 'bima-studio' ),
                        'description' => __( 'Robust backend systems using Go, PHP, and Node.js. RESTful APIs, microservices, and database design.', 'bima-studio' ),
                    ),
                    array(
                        'icon'        => '☁️',
                        'title'       => __( 'DevOps & Cloud', 'bima-studio' ),
                        'description' => __( 'Cloud infrastructure on GCP, AWS, or Azure. CI/CD pipelines, Docker, Kubernetes, and infrastructure as code.', 'bima-studio' ),
                    ),
                    array(
                        'icon'        => '🔌',
                        'title'       => __( 'API Integration', 'bima-studio' ),
                        'description' => __( 'Connect your systems with third-party services. Payment gateways, social media, analytics, and more.', 'bima-studio' ),
                    ),
                    array(
                        'icon'        => '🛡️',
                        'title'       => __( 'Security', 'bima-studio' ),
                        'description' => __( 'Secure your applications with best practices. Authentication, authorization, encryption, and security audits.', 'bima-studio' ),
                    ),
                    array(
                        'icon'        => '📊',
                        'title'       => __( 'Consulting', 'bima-studio' ),
                        'description' => __( 'Technical consulting to help you make the right technology decisions for your business growth.', 'bima-studio' ),
                    ),
                );

                foreach ( $default_services as $service ) :
                    ?>
                    <div class="service-card">
                        <div class="service-icon"><?php echo esc_html( $service['icon'] ); ?></div>
                        <h3><?php echo esc_html( $service['title'] ); ?></h3>
                        <p><?php echo esc_html( $service['description'] ); ?></p>
                    </div>
                    <?php
                endforeach;
            endif;
            ?>
        </div>
    </div>
</section>

<!-- Portfolio Section -->
<section class="section" id="portfolio">
    <div class="container">
        <header class="section-header">
            <h2><?php esc_html_e( 'Featured Projects', 'bima-studio' ); ?></h2>
            <p class="lead"><?php esc_html_e( 'A selection of our recent work showcasing our capabilities.', 'bima-studio' ); ?></p>
        </header>

        <div class="grid grid--3 stagger-children">
            <?php
            $portfolio = bima_studio_get_portfolio( 6 );

            if ( $portfolio->have_posts() ) :
                while ( $portfolio->have_posts() ) :
                    $portfolio->the_post();
                    ?>
                    <a href="<?php the_permalink(); ?>" class="portfolio-item">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <?php the_post_thumbnail( 'bima-portfolio-thumb' ); ?>
                        <?php else : ?>
                            <img src="<?php echo esc_url( BIMA_STUDIO_URI . '/assets/images/placeholder.jpg' ); ?>" alt="<?php the_title_attribute(); ?>">
                        <?php endif; ?>
                        <div class="portfolio-overlay">
                            <h3><?php the_title(); ?></h3>
                            <p><?php echo esc_html( get_post_meta( get_the_ID(), '_bima_portfolio_category', true ) ); ?></p>
                        </div>
                    </a>
                    <?php
                endwhile;
                wp_reset_postdata();
            else :
                // Default portfolio items
                $default_portfolio = array(
                    array(
                        'title'    => __( 'Auth Service', 'bima-studio' ),
                        'category' => __( 'Backend / Go', 'bima-studio' ),
                    ),
                    array(
                        'title'    => __( 'API Gateway', 'bima-studio' ),
                        'category' => __( 'Microservices', 'bima-studio' ),
                    ),
                    array(
                        'title'    => __( 'Attendance System', 'bima-studio' ),
                        'category' => __( 'Full Stack', 'bima-studio' ),
                    ),
                    array(
                        'title'    => __( 'GCP Infrastructure', 'bima-studio' ),
                        'category' => __( 'DevOps / IaC', 'bima-studio' ),
                    ),
                    array(
                        'title'    => __( 'URL Shortener', 'bima-studio' ),
                        'category' => __( 'Web App', 'bima-studio' ),
                    ),
                    array(
                        'title'    => __( 'PMO Dashboard', 'bima-studio' ),
                        'category' => __( 'Enterprise', 'bima-studio' ),
                    ),
                );

                foreach ( $default_portfolio as $item ) :
                    ?>
                    <div class="portfolio-item">
                        <div style="background: linear-gradient(135deg, var(--color-primary), var(--color-secondary)); width: 100%; height: 100%;"></div>
                        <div class="portfolio-overlay" style="opacity: 1;">
                            <h3><?php echo esc_html( $item['title'] ); ?></h3>
                            <p><?php echo esc_html( $item['category'] ); ?></p>
                        </div>
                    </div>
                    <?php
                endforeach;
            endif;
            ?>
        </div>

        <div class="text-center" style="margin-top: var(--spacing-2xl);">
            <a href="<?php echo esc_url( home_url( '/portfolio' ) ); ?>" class="btn btn--secondary">
                <?php esc_html_e( 'View All Projects', 'bima-studio' ); ?>
            </a>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="section section--alt" id="testimonials">
    <div class="container">
        <header class="section-header">
            <h2><?php esc_html_e( 'What Clients Say', 'bima-studio' ); ?></h2>
            <p class="lead"><?php esc_html_e( 'Trusted by businesses to deliver quality digital solutions.', 'bima-studio' ); ?></p>
        </header>

        <div class="grid grid--3 stagger-children">
            <?php
            $testimonials = bima_studio_get_testimonials( 3 );

            if ( $testimonials->have_posts() ) :
                while ( $testimonials->have_posts() ) :
                    $testimonials->the_post();
                    ?>
                    <div class="testimonial-card">
                        <div class="testimonial-content">
                            <?php the_content(); ?>
                        </div>
                        <div class="testimonial-author">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <?php the_post_thumbnail( 'thumbnail', array( 'class' => 'testimonial-avatar' ) ); ?>
                            <?php endif; ?>
                            <div class="testimonial-info">
                                <strong><?php the_title(); ?></strong>
                                <span><?php echo esc_html( get_post_meta( get_the_ID(), '_bima_testimonial_position', true ) ); ?></span>
                            </div>
                        </div>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();
            else :
                // Default testimonials
                $default_testimonials = array(
                    array(
                        'content'  => __( 'Excellent work on our backend infrastructure. The API is fast, reliable, and well-documented. Highly recommended for any technical project.', 'bima-studio' ),
                        'name'     => 'John Doe',
                        'position' => 'CTO, Tech Company',
                    ),
                    array(
                        'content'  => __( 'Professional approach to DevOps and cloud infrastructure. Our deployment process is now automated and reliable.', 'bima-studio' ),
                        'name'     => 'Jane Smith',
                        'position' => 'Engineering Manager',
                    ),
                    array(
                        'content'  => __( 'Great communication throughout the project. Delivered on time and exceeded our expectations with the quality of code.', 'bima-studio' ),
                        'name'     => 'Bob Johnson',
                        'position' => 'Startup Founder',
                    ),
                );

                foreach ( $default_testimonials as $testimonial ) :
                    ?>
                    <div class="testimonial-card">
                        <div class="testimonial-content">
                            <p><?php echo esc_html( $testimonial['content'] ); ?></p>
                        </div>
                        <div class="testimonial-author">
                            <div class="testimonial-avatar" style="width: 50px; height: 50px; background: var(--color-primary); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold;">
                                <?php echo esc_html( substr( $testimonial['name'], 0, 1 ) ); ?>
                            </div>
                            <div class="testimonial-info">
                                <strong><?php echo esc_html( $testimonial['name'] ); ?></strong>
                                <span><?php echo esc_html( $testimonial['position'] ); ?></span>
                            </div>
                        </div>
                    </div>
                    <?php
                endforeach;
            endif;
            ?>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="section" id="cta">
    <div class="container">
        <div class="text-center" style="max-width: 700px; margin: 0 auto;">
            <h2><?php esc_html_e( 'Ready to Start Your Project?', 'bima-studio' ); ?></h2>
            <p class="lead" style="margin-bottom: var(--spacing-xl);">
                <?php esc_html_e( 'Let\'s discuss how we can help bring your ideas to life. Get in touch for a free consultation.', 'bima-studio' ); ?>
            </p>
            <div class="hero-actions" style="justify-content: center;">
                <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn--primary btn--large">
                    <?php esc_html_e( 'Start a Project', 'bima-studio' ); ?>
                </a>
                <a href="mailto:<?php echo esc_attr( get_theme_mod( 'bima_studio_email', 'hello@bimastudio.com' ) ); ?>" class="btn btn--secondary btn--large">
                    <?php esc_html_e( 'Email Us', 'bima-studio' ); ?>
                </a>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
