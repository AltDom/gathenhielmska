<?php

declare(strict_types=1);

// Register plugin helpers.
require get_theme_file_path('includes/plugins/plate.php');

add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('style', get_stylesheet_directory_uri() . "/assets/styles/app.css");
    wp_enqueue_script("script", get_template_directory_uri() . "/assets/scripts/app.js");
});

// Set theme defaults.
add_action('after_setup_theme', function () {
    // Disable the admin toolbar.
    show_admin_bar(false);

    // Add post thumbnails support.
    add_theme_support('post-thumbnails');

    // Add title tag theme support.
    add_theme_support('title-tag');

    // Add HTML5 theme support.
    add_theme_support('html5', [
        'caption',
        'comment-form',
        'comment-list',
        'gallery',
        'search-form',
        'widgets',
    ]);

    // Register navigation menus.
    register_nav_menus([
        'navigation' => __('Navigation', 'wordplate'),
    ]);
});

// Remove JPEG compression.
add_filter('jpeg_quality', function () {
    return 100;
}, 10, 2);


//require fields/post-types etc
require get_template_directory() . '/fields/home.php';
require get_template_directory() . '/fields/post.php';
require get_template_directory() . '/post-types/event.php';




// regular function made to get the excerpt, should we make a new file for this, or use wp functions?

if (!function_exists("customFieldExcerpt")) {
    /**
     * Turn a string into a short summary, second parameter is optional, the default is 20 words.
     * Third parameter is also optional, end of string is ... by default.
     *
     * @param string $text
     * @param integer $numberOfWords
     * @return string
     */
    function customFieldExcerpt(string $text, int $numberOfWords = 20, $endOfString = "..."): string
    {
        $words = explode(" ", $text);
        array_splice($words, $numberOfWords);
        $result = implode(" ", $words) . $endOfString;

        return $result;
    }
}
