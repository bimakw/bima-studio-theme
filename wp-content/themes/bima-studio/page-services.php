<?php
/**
 * Template Name: Services Page
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
            <p class="lead"><?php esc_html_e( 'Comprehensive digital solutions to help your business grow and succeed.', 'bima-studio' ); ?></p>
        </header>
    </div>
</section>

<!-- Services Grid -->
<section class="section section--alt">
    <div class="container">
        <div class="grid grid--2" style="gap: var(--spacing-2xl);">
            <?php
            $services = bima_studio_get_services();

            if ( $services->have_posts() ) :
                while ( $services->have_posts() ) :
                    $services->the_post();
                    ?>
                    <div class="service-card service-card--large">
                        <div class="service-icon">
                            <?php echo esc_html( get_post_meta( get_the_ID(), '_bima_service_icon', true ) ?: '🚀' ); ?>
                        </div>
                        <h2><?php the_title(); ?></h2>
                        <div class="service-content">
                            <?php the_content(); ?>
                        </div>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();
            else :
                // Default services
                $services_data = array(
                    array(
                        'icon'        => '💻',
                        'title'       => __( 'Web Development', 'bima-studio' ),
                        'description' => __( 'Modern, responsive websites and web applications built with the latest technologies. From simple landing pages to complex single-page applications.', 'bima-studio' ),
                        'features'    => array(
                            __( 'Custom website development', 'bima-studio' ),
                            __( 'E-commerce solutions', 'bima-studio' ),
                            __( 'CMS integration (WordPress, etc.)', 'bima-studio' ),
                            __( 'Performance optimization', 'bima-studio' ),
                        ),
                    ),
                    array(
                        'icon'        => '⚙️',
                        'title'       => __( 'Backend Development', 'bima-studio' ),
                        'description' => __( 'Robust backend systems that power your applications. RESTful APIs, microservices architecture, and database design.', 'bima-studio' ),
                        'features'    => array(
                            __( 'API development (REST, GraphQL)', 'bima-studio' ),
                            __( 'Microservices architecture', 'bima-studio' ),
                            __( 'Database design & optimization', 'bima-studio' ),
                            __( 'Authentication & security', 'bima-studio' ),
                        ),
                    ),
                    array(
                        'icon'        => '☁️',
                        'title'       => __( 'DevOps & Cloud', 'bima-studio' ),
                        'description' => __( 'Cloud infrastructure on GCP, AWS, or Azure. CI/CD pipelines, containerization, and infrastructure as code.', 'bima-studio' ),
                        'features'    => array(
                            __( 'Cloud architecture (GCP, AWS, Azure)', 'bima-studio' ),
                            __( 'CI/CD pipeline setup', 'bima-studio' ),
                            __( 'Docker & Kubernetes', 'bima-studio' ),
                            __( 'Infrastructure as Code (Terraform)', 'bima-studio' ),
                        ),
                    ),
                    array(
                        'icon'        => '🔌',
                        'title'       => __( 'API Integration', 'bima-studio' ),
                        'description' => __( 'Connect your systems with third-party services. Payment gateways, social media APIs, analytics, and more.', 'bima-studio' ),
                        'features'    => array(
                            __( 'Payment gateway integration', 'bima-studio' ),
                            __( 'Third-party API connections', 'bima-studio' ),
                            __( 'Webhook implementation', 'bima-studio' ),
                            __( 'Data synchronization', 'bima-studio' ),
                        ),
                    ),
                    array(
                        'icon'        => '🛡️',
                        'title'       => __( 'Security & Auditing', 'bima-studio' ),
                        'description' => __( 'Secure your applications with industry best practices. Security audits, penetration testing, and compliance.', 'bima-studio' ),
                        'features'    => array(
                            __( 'Security audit & review', 'bima-studio' ),
                            __( 'Authentication implementation', 'bima-studio' ),
                            __( 'Data encryption', 'bima-studio' ),
                            __( 'Compliance consulting', 'bima-studio' ),
                        ),
                    ),
                    array(
                        'icon'        => '📊',
                        'title'       => __( 'Technical Consulting', 'bima-studio' ),
                        'description' => __( 'Expert guidance to help you make the right technology decisions. Architecture review, technology selection, and team mentoring.', 'bima-studio' ),
                        'features'    => array(
                            __( 'Architecture review', 'bima-studio' ),
                            __( 'Technology stack selection', 'bima-studio' ),
                            __( 'Code review & best practices', 'bima-studio' ),
                            __( 'Team mentoring', 'bima-studio' ),
                        ),
                    ),
                );

                foreach ( $services_data as $service ) :
                    ?>
                    <div class="service-card service-card--large">
                        <div class="service-icon"><?php echo esc_html( $service['icon'] ); ?></div>
                        <h2><?php echo esc_html( $service['title'] ); ?></h2>
                        <p><?php echo esc_html( $service['description'] ); ?></p>
                        <ul class="service-features">
                            <?php foreach ( $service['features'] as $feature ) : ?>
                                <li>
                                    <svg width="16" height="16" fill="none" stroke="var(--color-primary)" stroke-width="2" viewBox="0 0 24 24"><path d="M5 13l4 4L19 7"/></svg>
                                    <?php echo esc_html( $feature ); ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <?php
                endforeach;
            endif;
            ?>
        </div>
    </div>
</section>

<!-- Process Section -->
<section class="section">
    <div class="container">
        <header class="section-header">
            <h2><?php esc_html_e( 'How I Work', 'bima-studio' ); ?></h2>
            <p class="lead"><?php esc_html_e( 'A simple, transparent process from start to finish.', 'bima-studio' ); ?></p>
        </header>

        <div class="grid grid--4">
            <?php
            $process = array(
                array(
                    'number' => '01',
                    'title'  => __( 'Discovery', 'bima-studio' ),
                    'desc'   => __( 'Understanding your requirements, goals, and vision for the project.', 'bima-studio' ),
                ),
                array(
                    'number' => '02',
                    'title'  => __( 'Planning', 'bima-studio' ),
                    'desc'   => __( 'Creating a detailed roadmap with milestones and deliverables.', 'bima-studio' ),
                ),
                array(
                    'number' => '03',
                    'title'  => __( 'Development', 'bima-studio' ),
                    'desc'   => __( 'Building your solution with regular updates and feedback loops.', 'bima-studio' ),
                ),
                array(
                    'number' => '04',
                    'title'  => __( 'Delivery', 'bima-studio' ),
                    'desc'   => __( 'Deploying, testing, and providing documentation and support.', 'bima-studio' ),
                ),
            );

            foreach ( $process as $step ) :
                ?>
                <div class="process-step">
                    <span class="process-number"><?php echo esc_html( $step['number'] ); ?></span>
                    <h3><?php echo esc_html( $step['title'] ); ?></h3>
                    <p><?php echo esc_html( $step['desc'] ); ?></p>
                </div>
                <?php
            endforeach;
            ?>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="section section--alt">
    <div class="container">
        <div class="text-center" style="max-width: 700px; margin: 0 auto;">
            <h2><?php esc_html_e( 'Ready to Start Your Project?', 'bima-studio' ); ?></h2>
            <p class="lead" style="margin-bottom: var(--spacing-xl);">
                <?php esc_html_e( 'Let\'s discuss your requirements and create something amazing together.', 'bima-studio' ); ?>
            </p>
            <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn--primary btn--large">
                <?php esc_html_e( 'Get a Quote', 'bima-studio' ); ?>
            </a>
        </div>
    </div>
</section>

<?php
get_footer();
