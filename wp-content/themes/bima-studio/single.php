<?php
/**
 * Single Post Template
 *
 * @package Bima_Studio
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'single-post' ); ?>>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <!-- Hero -->
        <header class="single-post__header">
            <div class="container">
                <div class="single-post__meta">
                    <time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
                        <?php echo esc_html( get_the_date() ); ?>
                    </time>
                    <?php
                    $categories = get_the_category();
                    if ( ! empty( $categories ) ) :
                        ?>
                        <span class="single-post__category">
                            <?php echo esc_html( $categories[0]->name ); ?>
                        </span>
                    <?php endif; ?>
                </div>

                <h1 class="single-post__title"><?php the_title(); ?></h1>

                <?php if ( has_excerpt() ) : ?>
                    <p class="single-post__excerpt lead"><?php echo esc_html( get_the_excerpt() ); ?></p>
                <?php endif; ?>

                <div class="single-post__author">
                    <?php echo get_avatar( get_the_author_meta( 'ID' ), 48 ); ?>
                    <div>
                        <strong><?php the_author(); ?></strong>
                        <span><?php echo esc_html( human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) ); ?> ago</span>
                    </div>
                </div>
            </div>
        </header>

        <?php if ( has_post_thumbnail() ) : ?>
            <div class="single-post__featured-image">
                <div class="container">
                    <?php the_post_thumbnail( 'bima-hero' ); ?>
                </div>
            </div>
        <?php endif; ?>

        <!-- Content -->
        <div class="single-post__content">
            <div class="container container--narrow">
                <?php the_content(); ?>

                <?php
                wp_link_pages( array(
                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bima-studio' ),
                    'after'  => '</div>',
                ) );
                ?>
            </div>
        </div>

        <!-- Tags -->
        <?php
        $tags = get_the_tags();
        if ( $tags ) :
            ?>
            <footer class="single-post__footer">
                <div class="container container--narrow">
                    <div class="single-post__tags">
                        <span><?php esc_html_e( 'Tags:', 'bima-studio' ); ?></span>
                        <?php foreach ( $tags as $tag ) : ?>
                            <a href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>" class="skill-tag">
                                <?php echo esc_html( $tag->name ); ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </footer>
        <?php endif; ?>

    <?php endwhile; endif; ?>
</article>

<!-- Post Navigation -->
<nav class="post-navigation section">
    <div class="container">
        <div class="post-navigation__inner">
            <?php
            $prev_post = get_previous_post();
            $next_post = get_next_post();
            ?>

            <?php if ( $prev_post ) : ?>
                <a href="<?php echo esc_url( get_permalink( $prev_post->ID ) ); ?>" class="post-navigation__link post-navigation__link--prev">
                    <span class="post-navigation__label">
                        <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
                        <?php esc_html_e( 'Previous Post', 'bima-studio' ); ?>
                    </span>
                    <span class="post-navigation__title"><?php echo esc_html( $prev_post->post_title ); ?></span>
                </a>
            <?php endif; ?>

            <?php if ( $next_post ) : ?>
                <a href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>" class="post-navigation__link post-navigation__link--next">
                    <span class="post-navigation__label">
                        <?php esc_html_e( 'Next Post', 'bima-studio' ); ?>
                        <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </span>
                    <span class="post-navigation__title"><?php echo esc_html( $next_post->post_title ); ?></span>
                </a>
            <?php endif; ?>
        </div>
    </div>
</nav>

<!-- Comments -->
<?php
if ( comments_open() || get_comments_number() ) :
    ?>
    <section class="comments-section section section--alt">
        <div class="container container--narrow">
            <?php comments_template(); ?>
        </div>
    </section>
    <?php
endif;

get_footer();
