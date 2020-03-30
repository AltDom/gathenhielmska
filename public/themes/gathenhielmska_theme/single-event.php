<?php get_header();
$categories = get_the_terms($post, 'category'); ?>

<main role="main">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article>
                <?php if ($categories) : ?>
                    <?php foreach ($categories as $category) : ?>
                        <p><?php echo $category->name ?></p>
                    <?php endforeach; ?>
                <?php endif; ?>

                <h1><?php the_title(); ?></h1>
                <p><?php the_field("description"); ?></p>
                <?php  ?>
                <p><?php the_field("date"); ?></p>
                <p><?php the_field("time"); ?></p>

            </article>
        <?php endwhile;
    else : ?>
        <article>
            <p>Nothing to see.</p>
        </article>
    <?php endif; ?>
</main>

<?php get_footer();
