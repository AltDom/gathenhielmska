<?php get_header(); ?>

<main role="main">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article>
                <h1><?php the_title(); ?></h1>
                <p><?php the_field("description"); ?></p>
            </article>
        <?php endwhile;
    else : ?>
        <article>
            <p>Nothing to see.</p>
        </article>
    <?php endif; ?>
</main>

<?php get_footer();
