<?php /* Template Name: Home */ ?>
<?php get_header(); ?>

<section class="homePage">


    <!-- Hero -->
    <?php while (have_posts()) : the_post(); ?>
        <?php // the_field('hero_text')
        ?>
        <!-- temporary hero-image classname -->


    <?php endwhile; ?>

    <!-- Events -->
    <h2>kommande evenemang</h2>

    <div class="eventCarousel"></div>

    <!-- Nyheter -->

    <?php
    $the_query = new WP_Query([
        'post_type' => 'post',
        'posts_per_page' => 3
    ]);
    $isFirstItem = true;
    ?>

    <?php if ($the_query->have_posts()) : ?>
        <div class="homePage__newsContainer">
            <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>

                <?php if ($isFirstItem) : ?>
                    <div>
                        <img src="<?php the_field("image"); ?>" alt="">

                    </div>
                <?php else : ?>
                    <div class="homePage__newsContainer__lastTwoItems">
                        <img src="<?php the_field("image"); ?>" alt="">
                    </div>
                <?php endif; ?>

                <?php $isFirstItem = false; ?>
            <?php endwhile; ?>
        </div>
        <?php wp_reset_postdata(); ?>

    <?php else : ?>
        <p><?php __('No News'); ?></p>
    <?php endif; ?>



</section>





<?php get_footer(); ?>
