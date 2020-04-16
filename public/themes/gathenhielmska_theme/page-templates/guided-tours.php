<?php /* Template Name: Guided Tours */ ?>
<?php get_header(); ?>

<div class="news-container">
    <img class = "floral-divider" src="<?php bloginfo('template_directory') ?>/assets/images/floral-divider.png" alt="floral-divider">

    <div class = "opacity-div"></div>
    <div class = "booking-form">
        <form name="group-tour-form" method="POST" action="/email/">
            <label>Gruppbokningar</label>
            <input type="hidden" name="path" value="/guidade-turer/">
            <input type="text" name="applicant-name" placeholder="För- & Efternamn" required>
            <input type="text" name="applicant-email" placeholder="Email" required>
            <input type="text" name="phone-number" placeholder="Telefonnummer" required>
            <input type="text" name="group-size" placeholder="Antal i gruppen" required>
            <div class="date-time-div">
                <input class="tour-date-input" name="group-date" type="date" required>
            </div>
            <input class="about-event-input" name="group-about" type="text" placeholder="Meddelande">
            <button type="submit">SKICKA</button>
        </form>
    </div>

    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Amet, vitae interdum risus cursus. Purus pellentesque aliquet sapien turpis at. Enim laoreet aliquam pharetra sagittis id elit lacus tempus. Sed magna enim, parturient maecenas. Odio faucibus sed hendrerit fringilla. Arcu leo volutpat massa.</p>
    <h2>PRISER</h2>
    <div class = "prices-text">
        <p>vuxna -</p>
        <p>barn -</p>
        <p>senior -</p>
    </div>
    <h1 class="h1-center">2020 GUIDADE TURER</h1>

    <div class = "venues-box">
        <?php
        $the_query = new WP_Query([
            'posts_per_page' => 3,
            'post_type' => 'tours'
        ]);
        ?>

        <?php if ($the_query->have_posts()) : ?>
            <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>

            <div class = "individual-tour-box">
                <div class = "tour-div">
                    <h1 class = "tour-date"><?php echo strtoupper(customFieldExcerpt(get_field("date"), 4, "")); ?></h1>
                    <h2>INFO</h2>
                </div>
                <div class = "tour-div">
                    <h1 class = "tour-time"><?php echo customFieldExcerpt(get_field("time"), 4, ""); ?></h1>
                    <p>Samling vid huvudentré</p>
                </div>
                <div class = "book-ticket-button"><h2>BOKA BILJETT</h2></div>

            </div>


            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>

        <?php else : ?>
            <!-- dont know what the __() is about -->
            <p><?php __('No Tours'); ?></p>
        <?php endif; ?>
    </div>


    <h1 class="h1-center">GRUPPBOKNINGAR</h1>
    <p>Är ni en grupp finns möjligheten att boka en egen guidad tur en tid och dag som passar just er. Kontakta oss  via telefon eller fyll i formuläret nedan.</p>
    <div class = "book-button"><h2>BOKNINGSFÖRFRÅGAN</h2></div>














</div>

<?php get_footer(); ?>

