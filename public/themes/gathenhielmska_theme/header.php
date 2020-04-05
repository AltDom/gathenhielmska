<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="theme-color" content="#6d9aea">
    <link href="https://unpkg.com/sanitize.css" rel="stylesheet" />

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header>
        <nav role="navigation">
            <div class="logo"><svg width="60" height="54" viewBox="0 0 60 54" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M37.3383 4.21904C39.6095 2.49749 44.2235 11.7503 50.0249 10.4392C51.3794 10.3386 51.9999 9.17926 53.0844 8.42124C53.501 11.3376 51.8693 14.8224 51.0013 15.5818C44.5587 20.2688 40.5859 16.363 40.5859 16.363C37.917 14.2799 38.6647 11.3203 37.3383 9.39769C33.3602 0.283975 23.2051 5.93927 21.5127 10.7647C19.0026 13.8451 16.5791 29.9295 22.4898 39.7837C28.5177 49.8281 35.5716 50.8162 42.115 45.8325C46.5455 42.4566 46.3606 32.8575 43.5992 28.4921C41.0475 24.4588 38.5028 22.0264 34.1251 25.1735C33.2411 25.555 32.4313 27.7435 33.9038 27.8985C35.1289 28.026 36.3462 30.4971 34.0874 31.8433C32.0173 33.0814 27.2411 27.3334 36.2147 23.511C46.3255 19.2042 51.0013 23.784 51.0013 23.784C52.3032 24.8906 53.4037 26.8742 53.8102 28.1914C53.8102 28.1914 57.7434 38.1173 51.002 44.4824C44.2606 50.8475 35.8736 52.152 23.2905 48.0392C12.9767 44.6672 1.76188 25.2035 14.3072 12.6516C26.8526 0.0997522 35.2786 4.594 37.3383 4.21904Z" fill="#6B8280" stroke="#1F3634" stroke-miterlimit="10"/>
                <path d="M51.6085 44.5227C47.4792 49.9939 30.7364 54.3951 25.3532 49.3016C32.3394 51.4728 41.8664 47.8478 45.0136 44.545C47.7016 41.7242 49.3668 39.215 49.3668 39.215C48.7772 38.0768 49.5658 37.3225 49.5658 37.3225C49.3393 36.3606 50.0002 35.4184 50.7662 35.3793C51.5322 35.3403 51.6345 37.3471 51.6345 37.3471C51.6345 37.3471 51.9784 35.9667 51.3329 34.8961C50.6873 33.8256 51.1458 33.5424 51.1458 33.5424C50.6477 33.0487 50.4285 32.215 51.06 31.8594C51.6914 31.5037 52.1828 31.8669 52.1828 31.8669L51.4752 30.7351C50.9669 28.8775 52.0079 28.4361 52.0079 28.4361C51.6571 27.3509 52.5078 26.6583 52.5078 26.6583C54.7529 25.5044 53.8201 26.902 53.8201 26.902C53.4989 27.5544 54.6068 28.4325 54.8426 28.4205C55.0784 28.4084 56.5396 31.5792 56.5396 31.5792C56.5396 31.5792 57.1876 29.842 57.358 31.1453C57.5283 32.4486 56.7133 34.7623 56.7133 34.7623C56.7133 34.7623 55.5866 36.3368 58.1618 33.8176C57.8067 36.9023 57.4275 35.8841 56.5418 37.3947C56.2424 37.9073 57.314 37.3279 55.7169 38.8912C55.0744 39.5743 54.7527 40.3567 51.6085 44.5227Z" fill="#6B8280" stroke="#1F3634" stroke-miterlimit="10"/>
                <path d="M11.2673 14.6095C7.52189 20.5923 9.92929 36.8043 17.1429 39.0721C12.1732 34.1207 11.9121 24.3886 13.9088 20.2211C15.6141 16.6617 17.4241 14.112 17.4241 14.112C18.7884 14.0978 19.2162 13.0868 19.2162 13.0868C20.2593 12.8439 20.9246 11.8562 20.6539 11.1879C20.3832 10.5196 18.3563 11.3407 18.3563 11.3407C18.3563 11.3407 19.5832 10.4241 20.9031 10.488C22.2231 10.5519 22.318 10.0344 22.318 10.0344C23.0077 10.2341 23.9211 10.043 24.0179 9.3458C24.1148 8.64855 23.5569 8.39551 23.5569 8.39551L24.9626 8.48446C27.0058 8.07565 27.022 6.9918 27.022 6.9918C28.2374 6.79875 28.5791 5.76282 28.5791 5.76282C28.814 3.33379 27.8079 4.75844 27.8079 4.75844C27.2922 5.32645 25.976 4.78275 25.8926 4.577C25.8093 4.37126 22.082 4.56475 22.082 4.56475C22.082 4.56475 23.5391 3.2284 22.1808 3.67338C20.8225 4.11837 18.8625 5.85752 18.8625 5.85752C18.8625 5.85752 17.7598 7.52684 19.2122 4.19968C16.3036 5.89705 17.4641 5.75846 16.3273 7.19419C15.941 7.68041 16.0816 6.50806 15.1798 8.57197C14.7635 9.42676 14.1192 10.054 11.2673 14.6095Z" fill="#6B8280" stroke="#1F3634" stroke-miterlimit="10"/>
                <path d="M12.954 43.1614C19.6673 52.7087 40.875 55.2498 49.6992 46.307C38.2738 50.1468 28.849 48.9209 23.7273 43.1614C19.3529 38.2423 16.6475 33.8625 16.6475 33.8625C17.6174 31.8676 16.3337 30.5528 16.3337 30.5528C16.7093 28.8687 15.6353 27.2241 14.3841 27.1603C13.133 27.0965 12.954 30.608 12.954 30.608C12.954 30.608 12.4005 28.1951 13.4613 26.3184C14.5222 24.4416 13.775 23.949 13.775 23.949C14.5915 23.0823 14.9546 21.6224 13.9251 21.004C12.8957 20.3855 12.0908 21.0239 12.0908 21.0239L13.2535 19.0395C14.0948 15.7867 12.3969 15.0207 12.3969 15.0207C12.9764 13.1201 11.5908 11.9135 11.5908 11.9135C7.92998 9.90803 9.44554 12.3476 9.44554 12.3476C9.96641 13.487 8.15139 15.0298 7.76621 15.0101C7.38103 14.9905 4.9752 20.5462 4.9752 20.5462C4.9752 20.5462 3.927 17.5109 3.64097 19.792C3.35494 22.0731 4.6727 26.1161 4.6727 26.1161C4.6727 26.1161 6.50388 28.8639 2.31192 24.4719C2.87384 29.8664 3.49931 28.0829 4.93724 30.7203C5.42324 31.6154 3.67614 30.608 6.27595 33.3336C7.32153 34.5248 7.8423 35.8918 12.954 43.1614Z" fill="#6B8280" stroke="#1F3634" stroke-miterlimit="10"/>
                </svg></div>
            <?php the_title(); ?>
            <!-- <div class="languages">
                <h4 class="swedish active">SV</h4>
                <h4>/</h4>
                <h4 class="english">ENG</h4>
            </div> -->
            <div class="menu">
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
