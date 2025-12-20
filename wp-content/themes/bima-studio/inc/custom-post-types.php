<?php
/**
 * Custom Post Types Registration
 *
 * @package Bima_Studio
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Register Custom Post Types
 */
function bima_studio_register_post_types() {
    // Portfolio CPT
    register_post_type( 'portfolio', array(
        'labels'              => array(
            'name'               => _x( 'Portfolio', 'post type general name', 'bima-studio' ),
            'singular_name'      => _x( 'Portfolio Item', 'post type singular name', 'bima-studio' ),
            'menu_name'          => _x( 'Portfolio', 'admin menu', 'bima-studio' ),
            'add_new'            => _x( 'Add New', 'portfolio', 'bima-studio' ),
            'add_new_item'       => __( 'Add New Portfolio Item', 'bima-studio' ),
            'edit_item'          => __( 'Edit Portfolio Item', 'bima-studio' ),
            'new_item'           => __( 'New Portfolio Item', 'bima-studio' ),
            'view_item'          => __( 'View Portfolio Item', 'bima-studio' ),
            'search_items'       => __( 'Search Portfolio', 'bima-studio' ),
            'not_found'          => __( 'No portfolio items found', 'bima-studio' ),
            'not_found_in_trash' => __( 'No portfolio items found in Trash', 'bima-studio' ),
        ),
        'public'              => true,
        'has_archive'         => true,
        'rewrite'             => array( 'slug' => 'portfolio' ),
        'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'menu_icon'           => 'dashicons-portfolio',
        'show_in_rest'        => true,
    ) );

    // Services CPT
    register_post_type( 'services', array(
        'labels'              => array(
            'name'               => _x( 'Services', 'post type general name', 'bima-studio' ),
            'singular_name'      => _x( 'Service', 'post type singular name', 'bima-studio' ),
            'menu_name'          => _x( 'Services', 'admin menu', 'bima-studio' ),
            'add_new'            => _x( 'Add New', 'service', 'bima-studio' ),
            'add_new_item'       => __( 'Add New Service', 'bima-studio' ),
            'edit_item'          => __( 'Edit Service', 'bima-studio' ),
            'new_item'           => __( 'New Service', 'bima-studio' ),
            'view_item'          => __( 'View Service', 'bima-studio' ),
            'search_items'       => __( 'Search Services', 'bima-studio' ),
            'not_found'          => __( 'No services found', 'bima-studio' ),
            'not_found_in_trash' => __( 'No services found in Trash', 'bima-studio' ),
        ),
        'public'              => true,
        'has_archive'         => false,
        'rewrite'             => array( 'slug' => 'service' ),
        'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'menu_icon'           => 'dashicons-admin-tools',
        'show_in_rest'        => true,
    ) );

    // Testimonials CPT
    register_post_type( 'testimonials', array(
        'labels'              => array(
            'name'               => _x( 'Testimonials', 'post type general name', 'bima-studio' ),
            'singular_name'      => _x( 'Testimonial', 'post type singular name', 'bima-studio' ),
            'menu_name'          => _x( 'Testimonials', 'admin menu', 'bima-studio' ),
            'add_new'            => _x( 'Add New', 'testimonial', 'bima-studio' ),
            'add_new_item'       => __( 'Add New Testimonial', 'bima-studio' ),
            'edit_item'          => __( 'Edit Testimonial', 'bima-studio' ),
            'new_item'           => __( 'New Testimonial', 'bima-studio' ),
            'view_item'          => __( 'View Testimonial', 'bima-studio' ),
            'search_items'       => __( 'Search Testimonials', 'bima-studio' ),
            'not_found'          => __( 'No testimonials found', 'bima-studio' ),
            'not_found_in_trash' => __( 'No testimonials found in Trash', 'bima-studio' ),
        ),
        'public'              => false,
        'show_ui'             => true,
        'has_archive'         => false,
        'supports'            => array( 'title', 'editor', 'thumbnail' ),
        'menu_icon'           => 'dashicons-format-quote',
        'show_in_rest'        => true,
    ) );
}
add_action( 'init', 'bima_studio_register_post_types' );

/**
 * Register Custom Taxonomies
 */
function bima_studio_register_taxonomies() {
    // Portfolio Category
    register_taxonomy( 'portfolio_category', 'portfolio', array(
        'labels'            => array(
            'name'              => _x( 'Portfolio Categories', 'taxonomy general name', 'bima-studio' ),
            'singular_name'     => _x( 'Portfolio Category', 'taxonomy singular name', 'bima-studio' ),
            'search_items'      => __( 'Search Categories', 'bima-studio' ),
            'all_items'         => __( 'All Categories', 'bima-studio' ),
            'edit_item'         => __( 'Edit Category', 'bima-studio' ),
            'update_item'       => __( 'Update Category', 'bima-studio' ),
            'add_new_item'      => __( 'Add New Category', 'bima-studio' ),
            'new_item_name'     => __( 'New Category Name', 'bima-studio' ),
            'menu_name'         => __( 'Categories', 'bima-studio' ),
        ),
        'hierarchical'      => true,
        'show_admin_column' => true,
        'rewrite'           => array( 'slug' => 'portfolio-category' ),
        'show_in_rest'      => true,
    ) );

    // Portfolio Tags
    register_taxonomy( 'portfolio_tag', 'portfolio', array(
        'labels'            => array(
            'name'              => _x( 'Portfolio Tags', 'taxonomy general name', 'bima-studio' ),
            'singular_name'     => _x( 'Portfolio Tag', 'taxonomy singular name', 'bima-studio' ),
            'search_items'      => __( 'Search Tags', 'bima-studio' ),
            'all_items'         => __( 'All Tags', 'bima-studio' ),
            'edit_item'         => __( 'Edit Tag', 'bima-studio' ),
            'update_item'       => __( 'Update Tag', 'bima-studio' ),
            'add_new_item'      => __( 'Add New Tag', 'bima-studio' ),
            'new_item_name'     => __( 'New Tag Name', 'bima-studio' ),
            'menu_name'         => __( 'Tags', 'bima-studio' ),
        ),
        'hierarchical'      => false,
        'show_admin_column' => true,
        'rewrite'           => array( 'slug' => 'portfolio-tag' ),
        'show_in_rest'      => true,
    ) );
}
add_action( 'init', 'bima_studio_register_taxonomies' );

/**
 * Add Custom Meta Boxes
 */
function bima_studio_add_meta_boxes() {
    // Portfolio Meta Box
    add_meta_box(
        'bima_portfolio_details',
        __( 'Portfolio Details', 'bima-studio' ),
        'bima_studio_portfolio_meta_box_callback',
        'portfolio',
        'normal',
        'high'
    );

    // Service Meta Box
    add_meta_box(
        'bima_service_details',
        __( 'Service Details', 'bima-studio' ),
        'bima_studio_service_meta_box_callback',
        'services',
        'normal',
        'high'
    );

    // Testimonial Meta Box
    add_meta_box(
        'bima_testimonial_details',
        __( 'Testimonial Details', 'bima-studio' ),
        'bima_studio_testimonial_meta_box_callback',
        'testimonials',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'bima_studio_add_meta_boxes' );

/**
 * Portfolio Meta Box Callback
 */
function bima_studio_portfolio_meta_box_callback( $post ) {
    wp_nonce_field( 'bima_portfolio_meta_box', 'bima_portfolio_meta_box_nonce' );

    $client      = get_post_meta( $post->ID, '_bima_portfolio_client', true );
    $category    = get_post_meta( $post->ID, '_bima_portfolio_category', true );
    $url         = get_post_meta( $post->ID, '_bima_portfolio_url', true );
    $github_url  = get_post_meta( $post->ID, '_bima_portfolio_github', true );
    $tech_stack  = get_post_meta( $post->ID, '_bima_portfolio_tech_stack', true );
    ?>
    <table class="form-table">
        <tr>
            <th><label for="bima_portfolio_client"><?php esc_html_e( 'Client Name', 'bima-studio' ); ?></label></th>
            <td><input type="text" id="bima_portfolio_client" name="bima_portfolio_client" value="<?php echo esc_attr( $client ); ?>" class="regular-text"></td>
        </tr>
        <tr>
            <th><label for="bima_portfolio_category"><?php esc_html_e( 'Category Label', 'bima-studio' ); ?></label></th>
            <td><input type="text" id="bima_portfolio_category" name="bima_portfolio_category" value="<?php echo esc_attr( $category ); ?>" class="regular-text" placeholder="e.g., Web Development, Backend"></td>
        </tr>
        <tr>
            <th><label for="bima_portfolio_url"><?php esc_html_e( 'Project URL', 'bima-studio' ); ?></label></th>
            <td><input type="url" id="bima_portfolio_url" name="bima_portfolio_url" value="<?php echo esc_url( $url ); ?>" class="regular-text"></td>
        </tr>
        <tr>
            <th><label for="bima_portfolio_github"><?php esc_html_e( 'GitHub URL', 'bima-studio' ); ?></label></th>
            <td><input type="url" id="bima_portfolio_github" name="bima_portfolio_github" value="<?php echo esc_url( $github_url ); ?>" class="regular-text"></td>
        </tr>
        <tr>
            <th><label for="bima_portfolio_tech_stack"><?php esc_html_e( 'Tech Stack', 'bima-studio' ); ?></label></th>
            <td><input type="text" id="bima_portfolio_tech_stack" name="bima_portfolio_tech_stack" value="<?php echo esc_attr( $tech_stack ); ?>" class="regular-text" placeholder="e.g., Go, MongoDB, Docker"></td>
        </tr>
    </table>
    <?php
}

/**
 * Service Meta Box Callback
 */
function bima_studio_service_meta_box_callback( $post ) {
    wp_nonce_field( 'bima_service_meta_box', 'bima_service_meta_box_nonce' );

    $icon = get_post_meta( $post->ID, '_bima_service_icon', true );
    ?>
    <table class="form-table">
        <tr>
            <th><label for="bima_service_icon"><?php esc_html_e( 'Service Icon (Emoji)', 'bima-studio' ); ?></label></th>
            <td>
                <input type="text" id="bima_service_icon" name="bima_service_icon" value="<?php echo esc_attr( $icon ); ?>" class="regular-text" placeholder="e.g., 💻, ⚙️, ☁️">
                <p class="description"><?php esc_html_e( 'Enter an emoji to represent this service.', 'bima-studio' ); ?></p>
            </td>
        </tr>
    </table>
    <?php
}

/**
 * Testimonial Meta Box Callback
 */
function bima_studio_testimonial_meta_box_callback( $post ) {
    wp_nonce_field( 'bima_testimonial_meta_box', 'bima_testimonial_meta_box_nonce' );

    $position = get_post_meta( $post->ID, '_bima_testimonial_position', true );
    $company  = get_post_meta( $post->ID, '_bima_testimonial_company', true );
    ?>
    <table class="form-table">
        <tr>
            <th><label for="bima_testimonial_position"><?php esc_html_e( 'Position', 'bima-studio' ); ?></label></th>
            <td><input type="text" id="bima_testimonial_position" name="bima_testimonial_position" value="<?php echo esc_attr( $position ); ?>" class="regular-text" placeholder="e.g., CTO, Founder"></td>
        </tr>
        <tr>
            <th><label for="bima_testimonial_company"><?php esc_html_e( 'Company', 'bima-studio' ); ?></label></th>
            <td><input type="text" id="bima_testimonial_company" name="bima_testimonial_company" value="<?php echo esc_attr( $company ); ?>" class="regular-text"></td>
        </tr>
    </table>
    <?php
}

/**
 * Save Meta Box Data
 */
function bima_studio_save_meta_box_data( $post_id ) {
    // Portfolio
    if ( isset( $_POST['bima_portfolio_meta_box_nonce'] ) ) {
        if ( ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['bima_portfolio_meta_box_nonce'] ) ), 'bima_portfolio_meta_box' ) ) {
            return;
        }

        if ( isset( $_POST['bima_portfolio_client'] ) ) {
            update_post_meta( $post_id, '_bima_portfolio_client', sanitize_text_field( wp_unslash( $_POST['bima_portfolio_client'] ) ) );
        }
        if ( isset( $_POST['bima_portfolio_category'] ) ) {
            update_post_meta( $post_id, '_bima_portfolio_category', sanitize_text_field( wp_unslash( $_POST['bima_portfolio_category'] ) ) );
        }
        if ( isset( $_POST['bima_portfolio_url'] ) ) {
            update_post_meta( $post_id, '_bima_portfolio_url', esc_url_raw( wp_unslash( $_POST['bima_portfolio_url'] ) ) );
        }
        if ( isset( $_POST['bima_portfolio_github'] ) ) {
            update_post_meta( $post_id, '_bima_portfolio_github', esc_url_raw( wp_unslash( $_POST['bima_portfolio_github'] ) ) );
        }
        if ( isset( $_POST['bima_portfolio_tech_stack'] ) ) {
            update_post_meta( $post_id, '_bima_portfolio_tech_stack', sanitize_text_field( wp_unslash( $_POST['bima_portfolio_tech_stack'] ) ) );
        }
    }

    // Service
    if ( isset( $_POST['bima_service_meta_box_nonce'] ) ) {
        if ( ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['bima_service_meta_box_nonce'] ) ), 'bima_service_meta_box' ) ) {
            return;
        }

        if ( isset( $_POST['bima_service_icon'] ) ) {
            update_post_meta( $post_id, '_bima_service_icon', sanitize_text_field( wp_unslash( $_POST['bima_service_icon'] ) ) );
        }
    }

    // Testimonial
    if ( isset( $_POST['bima_testimonial_meta_box_nonce'] ) ) {
        if ( ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['bima_testimonial_meta_box_nonce'] ) ), 'bima_testimonial_meta_box' ) ) {
            return;
        }

        if ( isset( $_POST['bima_testimonial_position'] ) ) {
            update_post_meta( $post_id, '_bima_testimonial_position', sanitize_text_field( wp_unslash( $_POST['bima_testimonial_position'] ) ) );
        }
        if ( isset( $_POST['bima_testimonial_company'] ) ) {
            update_post_meta( $post_id, '_bima_testimonial_company', sanitize_text_field( wp_unslash( $_POST['bima_testimonial_company'] ) ) );
        }
    }
}
add_action( 'save_post', 'bima_studio_save_meta_box_data' );
