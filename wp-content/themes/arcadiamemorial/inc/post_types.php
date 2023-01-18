<?php
/**
 * Post Type Memorial
 */
function create_post_type_memorials()
{
    $labels = array(
        'name' => __('Memorials'),
        'singular_name' => __('Memorial'),
        'add_new' => __('New Memorial'),
    );
    $args = array(
        'labels' => $labels,
        'has_archive' => true,
        'public' => true,
        'hierarchical' => false,
        'menu_position' => 5,
        'supports' => array(
            'title',
            'custom-fields',
            'editor',
        ),
    );
    register_post_type('memorials', $args);
}

add_action('init', 'create_post_type_memorials');
/**
 * Post Type Premium Memorial
 */
function create_post_type_premium_memorials()
{
    $labels = array(
        'name' => __('Premium Memorials'),
        'singular_name' => __('Premium Memorial'),
        'add_new' => __('New Premium Memorial'),
    );
    $args = array(
        'labels' => $labels,
        'has_archive' => true,
        'public' => true,
        'hierarchical' => false,
        'menu_position' => 5,
        'supports' => array(
            'title',
            'custom-fields',
            'editor',
        ),
    );
    register_post_type('premium_memorials', $args);
}

add_action('init', 'create_post_type_premium_memorials');

if (function_exists('acf_add_options_page')) {
    acf_add_options_page([
        'page_title' => 'Memorials Sidebar',
        'menu_title' => 'Memorials Sidebar',
        'menu_slug' => 'memorials-sidebar',
        'capability' => 'edit_posts',
        'position' => '6',
        'icon_url' => 'dashicons-format-image',
        'redirect' => false
    ]);
}
