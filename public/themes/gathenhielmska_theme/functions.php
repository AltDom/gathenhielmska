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
require get_template_directory() . '/fields/event.php';
require get_template_directory() . '/fields/history.php';
require get_template_directory() . '/post-types/post.php';
require get_template_directory() . '/post-types/event.php';
require get_template_directory() . '/post-types/staff.php';
require get_template_directory() . '/post-types/affiliations.php';
require get_template_directory() . '/post-types/venues.php';
require get_template_directory() . '/post-types/tours.php';
require get_template_directory() . '/post-types/history.php';
require get_template_directory() . '/taxonomies/category.php';

add_theme_support('soil-js-to-footer');
add_theme_support('soil-clean-up');
add_theme_support('soil-disable-asset-versioning');
add_theme_support('soil-disable-trackbacks');
add_theme_support('soil-nice-search');
add_theme_support('soil-relative-urls');


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

if (!function_exists('redirect')) {
    /**
     * Redirect the user to given path.
     *
     * @param string $path
     *
     * @return void
     */
    function redirect(string $path)
    {
        header("Location: ${path}");
        exit;
    }
}

//search meta values in rest
//https://gist.github.com/maheshwaghmare/0bbe5eabceed24aa76ef1eabe684a748
if (!function_exists('post_meta_request_params')) :
    function post_meta_request_params($args, $request)
    {
        $args += array(
            $compare = $request['compare'],
            'meta_key'   => 'date',
            'meta_query' => [
                'key' => 'date',
                'value' => date('Y-m-d'),
                'compare' => $compare,
                'type' => 'DATE'
            ],
        );

        return $args;
    }
    add_filter('rest_event_query', 'post_meta_request_params', 99, 2); // Add support for `my-custom-post`
// add_filter('rest_post_query', 'post_meta_request_params', 99, 2);
// add_filter( 'rest_page_query', 'post_meta_request_params', 99, 2 ); // Add support for `page`
endif;
