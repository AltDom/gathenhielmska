<?php /* Template Name: Home */ ?>
<?php get_header(); ?>

<section class="homePage">


    <!-- Hero -->
    <?php while (have_posts()) : the_post(); ?>
        <div class="homePage__heroContainer">

            <img src="<?php the_field('hero_image') ?>" alt="hero image" class="homePage__heroContainer__heroImage">
            <div class="homePage__heroContainer__textContainer">
                <h1><?php the_field('hero_headline'); ?></h1>
            </div>
        </div>
    <?php endwhile; ?>

    <!-- Links -->
    <div class="homePage__linksContainer">

        <div>
            <img src="<?php bloginfo('template_directory') ?>/assets/images/homePageLink1.png" alt="">
            <a href="/history">
                <h2>historia</h2>
            </a>
        </div>
        <div>
            <img src="<?php bloginfo('template_directory') ?>/assets/images/homePageLink2.png" alt="">
            <a href="/events">
                <h2>evenemang</h2>
            </a>
        </div>
        <div>
            <img src="<?php bloginfo('template_directory') ?>/assets/images/homePageLink3.png" alt="">
            <a href="/archive">
                <h2>arkiv</h2>
            </a>
        </div>
        <div>
            <img src="<?php bloginfo('template_directory') ?>/assets/images/homePageLink4.png" alt="">
            <a href="/hire-venue">
                <h2>hyr lokal</h2>
            </a>
        </div>
        <div>
            <img src="<?php bloginfo('template_directory') ?>/assets/images/homePageLink5.png" alt="">
            <a href="/news">
                <h2>nyheter</h2>
            </a>
        </div>
        <div>
            <img src="<?php bloginfo('template_directory') ?>/assets/images/homePageLink6.png" alt="">
            <a href="/guided-tour">
                <h2>guidad tur</h2>
            </a>
        </div>

    </div>


    <!-- Events -->
    <h1 class="homePage__h1">PÅ GÅNG</h1>

    <div class="eventCarousel"></div>


    <a href="/events">
        <h2 class="readMoreLink">se alla event</h2>
    </a>

    <!-- Nyheter -->

    <?php
    $the_query = new WP_Query([
        'post_type' => 'post',
        'posts_per_page' => 2
    ]);
    ?>

    <?php if ($the_query->have_posts()) : ?>
        <div class="homePage__newsContainer">
            <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>

                <div class="homePage__newsContainer__item">
                    <img src="<?php the_field('image') ?>" alt="">
                    <div class="homePage__newsContainer__textContainer">
                        <h2 class="homePage__newsContainer__textContainer__title"><?php echo the_title(); ?></h2>
                        <a href="<?php the_permalink(); ?>">
                            <h2 class="homePage__newsContainer__textContainer__readMore">LÄS ARTIKELN</h2>
                        </a>
                    </div>
                </div>

            <?php endwhile; ?>
        </div>
        <?php wp_reset_postdata(); ?>

    <?php else : ?>
        <p><?php __('No News'); ?></p>
    <?php endif; ?>

    <div class="homePage__booking">
        <h1>BOKA VÅRA SALAR</h1>
        <p>Möjlighet att boka våra salar för att hålla ett event eller varför inte en worshop med företaget i inspirerande miljö.</p>
        <div>
            <a href="/hire-venue">
                <h2>LÄS MER OCH BOKA</h2>
            </a>
        </div>
    </div>



</section>





<?php get_footer(); ?>
