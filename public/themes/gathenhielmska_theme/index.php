<?php get_header(); ?>

<h1>hejkkkkkkk error index reached</h1>
<main role="main">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article>
                <header>
                    <h1><?php the_title(); ?></h1>
                </header>

                <?php the_content(); ?>
            </article>
        <?php endwhile;
    else : ?>
        <article>
            <p>Nothing to see.</p>
        </article>
    <?php endif; ?>
</main>

<?php get_footer();
