<?php
/**
 * Template Functions
 *
 * @package Bima_Studio
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Get Portfolio Items
 *
 * @param int $limit Number of items to retrieve.
 * @return WP_Query
 */
function bima_studio_get_portfolio( $limit = -1 ) {
    return new WP_Query( array(
        'post_type'      => 'portfolio',
        'posts_per_page' => $limit,
        'orderby'        => 'date',
        'order'          => 'DESC',
    ) );
}

/**
 * Get Portfolio by Category
 *
 * @param string $category Category slug.
 * @param int    $limit    Number of items to retrieve.
 * @return WP_Query
 */
function bima_studio_get_portfolio_by_category( $category, $limit = -1 ) {
    return new WP_Query( array(
        'post_type'      => 'portfolio',
        'posts_per_page' => $limit,
        'orderby'        => 'date',
        'order'          => 'DESC',
        'tax_query'      => array(
            array(
                'taxonomy' => 'portfolio_category',
                'field'    => 'slug',
                'terms'    => $category,
            ),
        ),
    ) );
}

/**
 * Get Services
 *
 * @param int $limit Number of items to retrieve.
 * @return WP_Query
 */
function bima_studio_get_services( $limit = -1 ) {
    return new WP_Query( array(
        'post_type'      => 'services',
        'posts_per_page' => $limit,
        'orderby'        => 'menu_order',
        'order'          => 'ASC',
    ) );
}

/**
 * Get Testimonials
 *
 * @param int $limit Number of items to retrieve.
 * @return WP_Query
 */
function bima_studio_get_testimonials( $limit = -1 ) {
    return new WP_Query( array(
        'post_type'      => 'testimonials',
        'posts_per_page' => $limit,
        'orderby'        => 'date',
        'order'          => 'DESC',
    ) );
}

/**
 * Get Portfolio Categories
 *
 * @return array
 */
function bima_studio_get_portfolio_categories() {
    return get_terms( array(
        'taxonomy'   => 'portfolio_category',
        'hide_empty' => true,
    ) );
}

/**
 * Display Portfolio Tech Stack
 *
 * @param int $post_id Post ID.
 * @return void
 */
function bima_studio_display_tech_stack( $post_id = null ) {
    if ( ! $post_id ) {
        $post_id = get_the_ID();
    }

    $tech_stack = get_post_meta( $post_id, '_bima_portfolio_tech_stack', true );

    if ( empty( $tech_stack ) ) {
        return;
    }

    $technologies = array_map( 'trim', explode( ',', $tech_stack ) );

    echo '<div class="skills-list">';
    foreach ( $technologies as $tech ) {
        echo '<span class="skill-tag">' . esc_html( $tech ) . '</span>';
    }
    echo '</div>';
}

/**
 * Display Portfolio Links
 *
 * @param int $post_id Post ID.
 * @return void
 */
function bima_studio_display_portfolio_links( $post_id = null ) {
    if ( ! $post_id ) {
        $post_id = get_the_ID();
    }

    $url        = get_post_meta( $post_id, '_bima_portfolio_url', true );
    $github_url = get_post_meta( $post_id, '_bima_portfolio_github', true );

    if ( empty( $url ) && empty( $github_url ) ) {
        return;
    }

    echo '<div class="portfolio-links">';

    if ( ! empty( $url ) ) {
        echo '<a href="' . esc_url( $url ) . '" class="btn btn--primary" target="_blank" rel="noopener noreferrer">';
        echo '<svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6M15 3h6v6M10 14 21 3"/></svg>';
        esc_html_e( 'View Project', 'bima-studio' );
        echo '</a>';
    }

    if ( ! empty( $github_url ) ) {
        echo '<a href="' . esc_url( $github_url ) . '" class="btn btn--secondary" target="_blank" rel="noopener noreferrer">';
        echo '<svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>';
        esc_html_e( 'View Code', 'bima-studio' );
        echo '</a>';
    }

    echo '</div>';
}

/**
 * Get Reading Time
 *
 * @param int $post_id Post ID.
 * @return string
 */
function bima_studio_reading_time( $post_id = null ) {
    if ( ! $post_id ) {
        $post_id = get_the_ID();
    }

    $content    = get_post_field( 'post_content', $post_id );
    $word_count = str_word_count( wp_strip_all_tags( $content ) );
    $minutes    = ceil( $word_count / 200 );

    return sprintf(
        /* translators: %d: number of minutes */
        _n( '%d min read', '%d min read', $minutes, 'bima-studio' ),
        $minutes
    );
}

/**
 * Custom Excerpt
 *
 * @param int $length Number of words.
 * @param int $post_id Post ID.
 * @return string
 */
function bima_studio_custom_excerpt( $length = 20, $post_id = null ) {
    if ( ! $post_id ) {
        $post_id = get_the_ID();
    }

    $excerpt = get_the_excerpt( $post_id );

    if ( empty( $excerpt ) ) {
        $excerpt = get_the_content( null, false, $post_id );
    }

    $excerpt = wp_strip_all_tags( $excerpt );
    $words   = explode( ' ', $excerpt );

    if ( count( $words ) > $length ) {
        $words   = array_slice( $words, 0, $length );
        $excerpt = implode( ' ', $words ) . '...';
    }

    return $excerpt;
}

/**
 * Posted On
 *
 * @return void
 */
function bima_studio_posted_on() {
    $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';

    $time_string = sprintf(
        $time_string,
        esc_attr( get_the_date( DATE_W3C ) ),
        esc_html( get_the_date() )
    );

    echo '<span class="posted-on">' . $time_string . '</span>';
}

/**
 * Posted By
 *
 * @return void
 */
function bima_studio_posted_by() {
    echo '<span class="byline">' . esc_html__( 'by', 'bima-studio' ) . ' ';
    echo '<span class="author vcard">';
    echo '<a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">';
    echo esc_html( get_the_author() );
    echo '</a></span></span>';
}

/**
 * Entry Footer
 *
 * @return void
 */
function bima_studio_entry_footer() {
    if ( 'post' === get_post_type() ) {
        $categories_list = get_the_category_list( ', ' );
        if ( $categories_list ) {
            echo '<span class="cat-links">' . $categories_list . '</span>';
        }

        $tags_list = get_the_tag_list( '', ', ' );
        if ( $tags_list ) {
            echo '<span class="tags-links">' . $tags_list . '</span>';
        }
    }

    edit_post_link(
        sprintf(
            /* translators: %s: Name of current post */
            esc_html__( 'Edit %s', 'bima-studio' ),
            the_title( '<span class="sr-only">"', '"</span>', false )
        ),
        '<span class="edit-link">',
        '</span>'
    );
}

/**
 * Pagination
 *
 * @return void
 */
function bima_studio_pagination() {
    the_posts_pagination( array(
        'mid_size'  => 2,
        'prev_text' => '<svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>',
        'next_text' => '<svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>',
    ) );
}

/**
 * Breadcrumbs
 *
 * @return void
 */
function bima_studio_breadcrumbs() {
    if ( is_front_page() ) {
        return;
    }

    echo '<nav class="breadcrumbs" aria-label="' . esc_attr__( 'Breadcrumb', 'bima-studio' ) . '">';
    echo '<ol class="breadcrumbs-list">';

    // Home
    echo '<li><a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html__( 'Home', 'bima-studio' ) . '</a></li>';

    if ( is_archive() ) {
        echo '<li><span class="current">' . esc_html( get_the_archive_title() ) . '</span></li>';
    } elseif ( is_single() ) {
        $post_type = get_post_type();
        if ( 'portfolio' === $post_type ) {
            echo '<li><a href="' . esc_url( home_url( '/portfolio' ) ) . '">' . esc_html__( 'Portfolio', 'bima-studio' ) . '</a></li>';
        } elseif ( 'post' === $post_type ) {
            $categories = get_the_category();
            if ( ! empty( $categories ) ) {
                echo '<li><a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a></li>';
            }
        }
        echo '<li><span class="current">' . esc_html( get_the_title() ) . '</span></li>';
    } elseif ( is_page() ) {
        echo '<li><span class="current">' . esc_html( get_the_title() ) . '</span></li>';
    } elseif ( is_search() ) {
        echo '<li><span class="current">' . esc_html__( 'Search Results', 'bima-studio' ) . '</span></li>';
    } elseif ( is_404() ) {
        echo '<li><span class="current">' . esc_html__( '404 Error', 'bima-studio' ) . '</span></li>';
    }

    echo '</ol>';
    echo '</nav>';
}
