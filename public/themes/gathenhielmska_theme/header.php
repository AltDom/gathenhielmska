<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="theme-color" content="#6d9aea">
    <link href="https://unpkg.com/sanitize.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=Roboto:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap" rel="stylesheet">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header>
        <nav role="navigation">
            <div class="logo"><img src="<?php bloginfo('template_directory') ?>/assets/images/logo.svg" alt="">
            </div>
            <?php the_title(); ?>
            <div class="menu">
                <div class="floral-left"></div>
                <div class="floral-right"></div>
                <ul>
                    <?php foreach (wp_get_nav_menu_items('navigation') as $page) : ?>
                        <li class="nav-item <?php if (is_home() && $page->object_id == get_option('page_for_posts') || is_page($page->object_id)) {
                                                echo 'active';
                                            } ?>">
                            <a class="nav-link" href="<?php echo $page->url; ?>">
                                <?php echo $page->title; ?>
                            </a><!-- /nav-link -->
                        </li><!-- /nav-item -->
                    <?php endforeach; ?>
                    <li class="nav-item"><a class="nav-link">SV/ENG <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M6.5 12L0.00480941 0.75L12.9952 0.750001L6.5 12Z" fill="#FAF9F6"/>
</svg>
</a></li>
                </ul><!-- /navbar -->
            </div>
            <div class="close"><svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 1L32.5 32.5" stroke="white" stroke-width="2" stroke-linecap="round" />
                    <path d="M32.5 1L0.999999 32.5" stroke="white" stroke-width="2" stroke-linecap="round" /></svg></div>
            <div class="hamburger">
                <svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <line x1="6" y1="11.5" x2="38" y2="11.5" stroke="black" />
                    <line x1="6" y1="21.5" x2="38" y2="21.5" stroke="black" />
                    <line x1="6" y1="31.5" x2="38" y2="31.5" stroke="black" /></svg></div>

        </nav>
    </header>
