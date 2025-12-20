<?php
/**
 * Archive Template
 *
 * @package Bima_Studio
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();
?>

<section class="section">
    <div class="container">
        <header class="section-header">
            <?php
            the_archive_title( '<h1>', '</h1>' );
            the_archive_description( '<p class="lead">', '</p>' );
            ?>
        </header>

        <?php if ( have_posts() ) : ?>
            <div class="grid grid--3">
                <?php
                while ( have_posts() ) :
                    the_post();
                    ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-card' ); ?>>
                        <?php if ( has_post_thumbnail() ) : ?>
                            <a href="<?php the_permalink(); ?>" class="blog-card__image">
                                <?php the_post_thumbnail( 'bima-portfolio-thumb' ); ?>
                            </a>
                        <?php endif; ?>

                        <div class="blog-card__content">
                            <div class="blog-card__meta">
                                <time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
                                    <?php echo esc_html( get_the_date() ); ?>
                                </time>
                            </div>

                            <h2 class="blog-card__title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>

                            <p class="blog-card__excerpt">
                                <?php echo esc_html( get_the_excerpt() ); ?>
                            </p>

                            <a href="<?php the_permalink(); ?>" class="blog-card__link">
                                <?php esc_html_e( 'Read More', 'bima-studio' ); ?>
                                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                            </a>
                        </div>
                    </article>
                    <?php
                endwhile;
                ?>
            </div>

            <?php
            the_posts_pagination( array(
                'mid_size'  => 2,
                'prev_text' => '<svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>',
                'next_text' => '<svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>',
            ) );
            ?>

        <?php else : ?>
            <div class="no-posts text-center">
                <h2><?php esc_html_e( 'No posts found', 'bima-studio' ); ?></h2>
                <p><?php esc_html_e( 'Sorry, no posts were found in this category.', 'bima-studio' ); ?></p>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php
get_footer();
