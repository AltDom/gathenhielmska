<?php

declare(strict_types=1);

add_action('init', function () {
    register_post_type('affiliations', [
        'has_archive' => true,
        'labels' => [
            'add_new_item' => __('Add New Affiliation'),
            'edit_item' => __('Edit Affiliation'),
            'name' => __('Affiliation'),
            'search_items' => __('Search Affiliation'),
            'singular_name' => __('Affiliation'),
        ],
        'supports' => [
            'title',
            'editor',
            'thumbnail',
        ],
        'menu_icon' => 'dashicons-groups',
        'menu_position' => 21,
        'public' => true,
        'show_in_rest' => true
    ]);
});
