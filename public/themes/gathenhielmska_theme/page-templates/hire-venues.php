<?php /* Template Name: Hire Venues */ ?>
<?php get_header(); ?>

<div class="news-container">
    <img class = "floral-divider" src="<?php bloginfo('template_directory') ?>/assets/images/floral-divider.png" alt="floral-divider">
    <div class = "opacity-div"></div>
    <div class = "booking-form">
        <form name="hire-venue-form" method="post" action="/email/" enctype="multipart/form-data">
            <label id="label"></label>
            <input type="hidden" id="venue" name="venue" value="">
            <input type="hidden" name="path" value="/hyr-vara-lokaler/">
            <input type="text" name="applicant-name" placeholder="För- & Efternamn" required>
            <input type="text" name="applicant-email" placeholder="Email" required>
            <input type="text" name="phone-number" placeholder="Telefonnummer" required>
            <input type="text" name="event-name" placeholder="Titel på event" required>
            <input type="text" name="number-organisers" placeholder="Antal anordnare" required>
            <div class="date-time-div">
                <input class="date-input" name="hire-date" type="date" required>
                <input class="time-input" name="hire-time" type="time" required>
            </div>
            <input type="text" name="category" placeholder="Event kategori" required>
            <div class="upload-button-wrapper">
                <input class="upload-input" type="file" accept=".jpg, .jpeg, .png" name="event-picture" placeholder="Event bildfil">
                <button class="upload-picture-button">+</button>
            </div>
            <input class="about-event-input" type="text" name="about-event" placeholder="Om gruppen">
            <button type="submit">SKICKA</button>
        </form>
    </div>

    <p>Om du är intresserad av att ta del av vårt kulturarv och bidra till ett rikare kulturliv finns möjlighet att hyra våra lokaler. Allt från en konferens, workshop eller ett event för allmänheten. Nedan listar vi våra olika salar med möjlighet att hyra och vad dem passar för. Välkommen att kontakta oss vid intresse.</p>

    <div class = "venues-box">
        <?php
        $the_query = new WP_Query([
            'posts_per_page' => 4,
            'post_type' => 'venues'
        ]);
        ?>

        <?php if ($the_query->have_posts()) : ?>
            <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>

            <div class = "individual-venue-box">
                <img class = "venue-img" src="<?php echo customFieldExcerpt(get_field("photo"), 1, ""); ?>" alt="">
                <h1 class = "venue-name"><?php echo strtoupper(customFieldExcerpt(get_field("venue_name"), 4, "")); ?></h1>
                <p class = "venue-capacity">Upp till <?php echo customFieldExcerpt(get_field("capacity"), 1, ""); ?> personer</p>
                <p class = "venue-availability"><?php echo customFieldExcerpt(get_field("availability_status"), 15, ""); ?></p>
            </div>
            <div id="<?php echo strtoupper(customFieldExcerpt(get_field("venue_name"), 4, "")); ?>" class="book-button"><h2>BOKNINGSFÖRFRÅGAN</h2></div>

            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>

        <?php else : ?>
            <!-- dont know what the __() is about -->
            <p><?php __('No Venues'); ?></p>
        <?php endif; ?>
    </div>

</div>

<?php get_footer(); ?>
