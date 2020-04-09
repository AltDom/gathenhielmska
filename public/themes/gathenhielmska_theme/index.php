<?php get_header(); ?>

<!-- <h1>No feed recognised. index.php loading.</h1> -->
<main role="main">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article>
                <header>
                    <!-- <h1><?php // the_title(); ?></h1> -->
                </header>

                <?php the_content(); ?>
            </article>
        <?php endwhile;
    else : ?>
        <article>
        </article>
    <?php endif; ?>
</main>

</body>

<?php get_footer();
