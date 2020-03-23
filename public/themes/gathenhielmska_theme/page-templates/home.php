<?php /* Template Name: Home */ ?>
<?php get_header(); ?>

<!-- Hero -->
<?php while (have_posts()) : the_post(); ?>

    <!-- temporary hero-image classname -->
    <h2><?php the_field('hero_text'); ?></h2>
    <img class="hero-image" src="<?php the_field('hero_image'); ?>" />

<?php endwhile; ?>

<!-- Nyheter -->
<h2>På gång i huset</h2>

<?php
$the_query = new WP_Query([
    'posts_per_page' => 1,
]);
?>

<?php if ($the_query->have_posts()) : ?>
    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>

        <h3><?php the_title(); ?></h3>
        <p><?php echo customFieldExcerpt(get_field("description")); ?></p>

    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>

<?php else : ?>
    <!-- dont know what the __() is about -->
    <p><?php __('No News'); ?></p>
<?php endif; ?>

<!-- Events -->
<h2>kommande evenemang</h2>

<?php
$the_query = new WP_Query([
    'post_type' => 'event',
    'posts_per_page' => 1
]);
?>

<?php if ($the_query->have_posts()) : ?>
    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>

        <h3><?php the_title(); ?></h3>
        <p><?php echo customFieldExcerpt(get_field("description")); ?></p>
        <p><?php the_field("start_date"); ?></p>
        <p><?php the_field("start_time"); ?></p>

    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>

<?php else : ?>
    <p><?php __('No News'); ?></p>
<?php endif; ?>






<?php get_footer(); ?>
