<?php
/**
 * Template Name: Portfolio Page
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
            <p class="lead"><?php esc_html_e( 'A showcase of projects I\'ve worked on. Each project represents unique challenges and solutions.', 'bima-studio' ); ?></p>
        </header>

        <!-- Portfolio Filters -->
        <div class="portfolio-filters">
            <button class="filter-btn active" data-filter="all"><?php esc_html_e( 'All', 'bima-studio' ); ?></button>
            <?php
            $categories = bima_studio_get_portfolio_categories();

            if ( ! empty( $categories ) && ! is_wp_error( $categories ) ) :
                foreach ( $categories as $category ) :
                    ?>
                    <button class="filter-btn" data-filter="<?php echo esc_attr( $category->slug ); ?>">
                        <?php echo esc_html( $category->name ); ?>
                    </button>
                    <?php
                endforeach;
            else :
                // Default filter buttons
                $default_cats = array(
                    'web'      => __( 'Web Development', 'bima-studio' ),
                    'backend'  => __( 'Backend', 'bima-studio' ),
                    'devops'   => __( 'DevOps', 'bima-studio' ),
                    'fullstack' => __( 'Full Stack', 'bima-studio' ),
                );

                foreach ( $default_cats as $slug => $name ) :
                    ?>
                    <button class="filter-btn" data-filter="<?php echo esc_attr( $slug ); ?>">
                        <?php echo esc_html( $name ); ?>
                    </button>
                    <?php
                endforeach;
            endif;
            ?>
        </div>
    </div>
</section>

<!-- Portfolio Grid -->
<section class="section section--alt">
    <div class="container">
        <div class="portfolio-grid grid grid--3" id="portfolio-grid">
            <?php
            $portfolio = bima_studio_get_portfolio();

            if ( $portfolio->have_posts() ) :
                while ( $portfolio->have_posts() ) :
                    $portfolio->the_post();

                    $terms      = get_the_terms( get_the_ID(), 'portfolio_category' );
                    $term_slugs = $terms ? wp_list_pluck( $terms, 'slug' ) : array();
                    $category   = get_post_meta( get_the_ID(), '_bima_portfolio_category', true );
                    ?>
                    <article class="portfolio-card" data-category="<?php echo esc_attr( implode( ' ', $term_slugs ) ); ?>">
                        <a href="<?php the_permalink(); ?>" class="portfolio-item">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <?php the_post_thumbnail( 'bima-portfolio-thumb' ); ?>
                            <?php else : ?>
                                <div style="width: 100%; height: 100%; background: linear-gradient(135deg, var(--color-primary), var(--color-secondary));"></div>
                            <?php endif; ?>
                            <div class="portfolio-overlay">
                                <h3><?php the_title(); ?></h3>
                                <p><?php echo esc_html( $category ); ?></p>
                            </div>
                        </a>
                    </article>
                    <?php
                endwhile;
                wp_reset_postdata();
            else :
                // Default portfolio items from CV
                $demo_items = array(
                    array(
                        'title'       => __( 'Percival (PMO)', 'bima-studio' ),
                        'category'    => __( 'Full Stack', 'bima-studio' ),
                        'filter'      => 'fullstack',
                        'description' => __( 'Full-stack PMO application for project tracking and reporting. Features project/task management, team & resource allocation, dashboard analytics.', 'bima-studio' ),
                        'tech'        => 'Next.js, TypeScript, Rust (Axum), PostgreSQL, Docker',
                        'github'      => 'https://github.com/bimakw/percival',
                        'color'       => 'linear-gradient(135deg, #6366f1, #8b5cf6)',
                    ),
                    array(
                        'title'       => __( 'GCP DevOps Infrastructure', 'bima-studio' ),
                        'category'    => __( 'DevOps / IaC', 'bima-studio' ),
                        'filter'      => 'devops',
                        'description' => __( 'Production-ready GCP infrastructure using Terraform. GKE cluster with autoscaling, Cloud SQL, ArgoCD for GitOps, Prometheus + Grafana monitoring.', 'bima-studio' ),
                        'tech'        => 'Terraform, GKE, Cloud SQL, ArgoCD, Prometheus, Grafana',
                        'github'      => 'https://github.com/bimakw/gcp-devops-iac',
                        'color'       => 'linear-gradient(135deg, #4285f4, #34a853)',
                    ),
                    array(
                        'title'       => __( 'Auth Service', 'bima-studio' ),
                        'category'    => __( 'Backend / Rust', 'bima-studio' ),
                        'filter'      => 'backend',
                        'description' => __( 'Authentication microservice with JWT, Google OAuth2, Two-Factor Authentication (TOTP) with backup codes, and RBAC.', 'bima-studio' ),
                        'tech'        => 'Rust, Actix-web, PostgreSQL, Redis, JWT, OAuth2',
                        'github'      => 'https://github.com/bimakw/auth-service',
                        'color'       => 'linear-gradient(135deg, #f74c00, #b7410e)',
                    ),
                    array(
                        'title'       => __( 'URL Shortener', 'bima-studio' ),
                        'category'    => __( 'Backend / Go', 'bima-studio' ),
                        'filter'      => 'backend',
                        'description' => __( 'High-performance URL shortening service with analytics and QR code generation. Throughput: 10,000+ req/s.', 'bima-studio' ),
                        'tech'        => 'Go, PostgreSQL, Redis, Clean Architecture, Docker',
                        'github'      => 'https://github.com/bimakw/url-shortener',
                        'color'       => 'linear-gradient(135deg, #00add8, #5dc9e2)',
                    ),
                    array(
                        'title'       => __( 'API Gateway', 'bima-studio' ),
                        'category'    => __( 'Backend / Go', 'bima-studio' ),
                        'filter'      => 'backend',
                        'description' => __( 'Lightweight API Gateway with rate limiting (token bucket), API key management, health checking, and reverse proxy.', 'bima-studio' ),
                        'tech'        => 'Go, Redis, Docker',
                        'github'      => 'https://github.com/bimakw/api-gateway',
                        'color'       => 'linear-gradient(135deg, #00add8, #00758f)',
                    ),
                    array(
                        'title'       => __( 'HR Attendance System', 'bima-studio' ),
                        'category'    => __( 'Full Stack', 'bima-studio' ),
                        'filter'      => 'fullstack',
                        'description' => __( 'Modern microservices-based attendance platform. Redis caching improved API response by 60%. Handles 10K+ concurrent users.', 'bima-studio' ),
                        'tech'        => 'Golang (Fiber), Redis, PostgreSQL, GCP, Docker',
                        'github'      => 'https://github.com/bimakw/service-presensi',
                        'color'       => 'linear-gradient(135deg, #10b981, #059669)',
                    ),
                );

                foreach ( $demo_items as $item ) :
                    ?>
                    <article class="portfolio-card" data-category="<?php echo esc_attr( $item['filter'] ); ?>">
                        <a href="<?php echo esc_url( $item['github'] ); ?>" class="portfolio-item" target="_blank" rel="noopener noreferrer">
                            <div style="width: 100%; height: 100%; background: <?php echo esc_attr( $item['color'] ); ?>; display: flex; align-items: center; justify-content: center;">
                                <span style="font-size: 3rem; opacity: 0.3; color: white;">{ }</span>
                            </div>
                            <div class="portfolio-overlay" style="opacity: 1;">
                                <h3><?php echo esc_html( $item['title'] ); ?></h3>
                                <p><?php echo esc_html( $item['category'] ); ?></p>
                                <p style="font-size: 0.75rem; margin-top: 0.5rem; opacity: 0.8;"><?php echo esc_html( $item['tech'] ); ?></p>
                            </div>
                        </a>
                    </article>
                    <?php
                endforeach;
            endif;
            ?>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="section">
    <div class="container">
        <div class="text-center" style="max-width: 700px; margin: 0 auto;">
            <h2><?php esc_html_e( 'Have a Project in Mind?', 'bima-studio' ); ?></h2>
            <p class="lead" style="margin-bottom: var(--spacing-xl);">
                <?php esc_html_e( 'Let\'s discuss how we can bring your ideas to life.', 'bima-studio' ); ?>
            </p>
            <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn--primary btn--large">
                <?php esc_html_e( 'Start a Project', 'bima-studio' ); ?>
            </a>
        </div>
    </div>
</section>

<?php
get_footer();
