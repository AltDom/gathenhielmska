<?php /* Template Name: Posts */ ?>

<!-- This is for posts/nyheter/articles -->

<?php get_header(); ?>


<?php while (have_posts()) : the_post(); ?>

    <div>
        <h1><?php the_title(); ?></h1>
        <p><?php the_excerpt(); ?></p>
    </div>

<?php endwhile; ?>






<?php get_footer(); ?>
