<?php /* Template Name: Events */ ?>
<?php get_header(); ?>

<?php
$the_query = new WP_Query([
    'posts_per_page' => 8,
    'post_type' => 'event'
]);
?>

<?php if ($the_query->have_posts()) : ?>
    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>


        <a href="<?php the_permalink(); ?>">
            <h2><?php the_title(); ?></h2>
        </a>

        <p><?php echo customFieldExcerpt(get_field("description")); ?></p>

        <p><?php the_field("start_date"); ?></p>
        <p><?php the_field("start_time"); ?></p>

    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>

<?php else : ?>
    <!-- dont know what the __() is about -->
    <p><?php __('No News'); ?></p>
<?php endif; ?>




<?php get_footer(); ?>
