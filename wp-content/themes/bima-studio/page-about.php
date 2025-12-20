<?php
/**
 * Template Name: About Page
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
            <p class="lead"><?php esc_html_e( 'Passionate about building digital solutions that make a difference.', 'bima-studio' ); ?></p>
        </header>
    </div>
</section>

<!-- About Content -->
<section class="section section--alt">
    <div class="container">
        <div class="about-content">
            <div class="about-image">
                <?php if ( has_post_thumbnail() ) : ?>
                    <?php the_post_thumbnail( 'large' ); ?>
                <?php else : ?>
                    <div style="width: 100%; aspect-ratio: 4/5; background: linear-gradient(135deg, var(--color-primary), var(--color-secondary)); border-radius: var(--radius-lg);"></div>
                <?php endif; ?>
            </div>

            <div class="about-text">
                <h2><?php esc_html_e( 'Hello, I\'m Bima', 'bima-studio' ); ?></h2>

                <?php
                if ( have_posts() ) :
                    while ( have_posts() ) :
                        the_post();
                        the_content();
                    endwhile;
                else :
                    ?>
                    <p><?php esc_html_e( 'A software engineer with passion for building scalable, reliable systems. I specialize in backend development, cloud infrastructure, and DevOps practices.', 'bima-studio' ); ?></p>

                    <p><?php esc_html_e( 'With experience in various technologies and industries, I help businesses transform their ideas into robust digital solutions that scale with their growth.', 'bima-studio' ); ?></p>
                    <?php
                endif;
                ?>

                <h3 style="margin-top: var(--spacing-xl);"><?php esc_html_e( 'Skills & Technologies', 'bima-studio' ); ?></h3>

                <div class="skills-list">
                    <?php
                    $skills = array(
                        'Golang', 'PHP', 'C#', 'JavaScript', 'SQL', 'Rust',
                        'Fiber', '.NET Core', 'Laravel', 'Actix-web',
                        'Docker', 'Kubernetes', 'Terraform',
                        'GCP', 'Firebase', 'Redis', 'Nginx',
                        'CI/CD', 'Microservices', 'DDD', 'Clean Architecture',
                    );

                    foreach ( $skills as $skill ) :
                        ?>
                        <span class="skill-tag"><?php echo esc_html( $skill ); ?></span>
                        <?php
                    endforeach;
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Experience Timeline -->
<section class="section">
    <div class="container">
        <header class="section-header">
            <h2><?php esc_html_e( 'Experience', 'bima-studio' ); ?></h2>
            <p class="lead"><?php esc_html_e( 'My professional journey in software development.', 'bima-studio' ); ?></p>
        </header>

        <div class="timeline">
            <?php
            $experiences = array(
                array(
                    'year'        => 'Sep 2021 - Present',
                    'title'       => __( 'Technical Lead', 'bima-studio' ),
                    'company'     => __( 'PT. Indomarco Prismatama (Indomaret Group) - Jakarta', 'bima-studio' ),
                    'description' => __( 'Led a 20-member technical division across 4 specialized units. Architected Golang (Fiber) backend services supporting 100K+ internal users. Built custom API Gateway with Laravel and spearheaded CI/CD automation using GitHub Actions and Jenkins.', 'bima-studio' ),
                ),
                array(
                    'year'        => 'Jul 2020 - Aug 2021',
                    'title'       => __( 'Technical Architect', 'bima-studio' ),
                    'company'     => __( 'PT. Indomarco Prismatama - Yogyakarta', 'bima-studio' ),
                    'description' => __( 'Led monolith-to-microservices migration using Docker and GCP. Designed high-availability systems and scalable API Gateway infrastructure. Implemented Terraform-based IaC to standardize cloud provisioning.', 'bima-studio' ),
                ),
                array(
                    'year'        => 'Sep 2019 - Jun 2020',
                    'title'       => __( 'Full Stack Developer', 'bima-studio' ),
                    'company'     => __( 'PT. Indomarco Prismatama - Yogyakarta', 'bima-studio' ),
                    'description' => __( 'Built and maintained HR systems using .NET MVC, Laravel, and WCF. Managed SQL Server and PostgreSQL databases for various modules.', 'bima-studio' ),
                ),
            );

            foreach ( $experiences as $exp ) :
                ?>
                <div class="timeline-item">
                    <div class="timeline-marker"></div>
                    <div class="timeline-content">
                        <span class="timeline-year"><?php echo esc_html( $exp['year'] ); ?></span>
                        <h3><?php echo esc_html( $exp['title'] ); ?></h3>
                        <p class="timeline-company"><?php echo esc_html( $exp['company'] ); ?></p>
                        <p><?php echo esc_html( $exp['description'] ); ?></p>
                    </div>
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
            <h2><?php esc_html_e( 'Let\'s Work Together', 'bima-studio' ); ?></h2>
            <p class="lead" style="margin-bottom: var(--spacing-xl);">
                <?php esc_html_e( 'Have a project in mind? I\'d love to hear about it and discuss how I can help.', 'bima-studio' ); ?>
            </p>
            <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn--primary btn--large">
                <?php esc_html_e( 'Get in Touch', 'bima-studio' ); ?>
            </a>
        </div>
    </div>
</section>

<?php
get_footer();
