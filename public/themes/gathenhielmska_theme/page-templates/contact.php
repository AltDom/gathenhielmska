<?php /* Template Name: Contact */ ?>
<?php get_header(); ?>

<div class="news-container">
    <p>I april 2020 öppnas Gathenhielmska Huset upp med ett officiellt program från det fria kulturlivet. Huset
är en sammanlänkande plats för gränsöverskridande kulturella möten. Ett program med föreställningar, visningar, utställningar och andra evenemang för att tillgängliggöra huset och dess kulturhistoriska värde.</p>
    <p>Välkomna att kontakta oss för eventuella frågor.</p>
</div>

<div class = "contact-floral-background">
    <div class="news-container">
        <div class = "staff-box">
            <h1 class="h1-center">VI ÄR GATHENHIELMSKA</h1>
            <?php
            $the_query = new WP_Query([
                'posts_per_page' => 3,
                'post_type' => 'staff'
            ]);
            ?>

            <?php if ($the_query->have_posts()) : ?>
                <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>

                <div class = "staff-member-box">
                    <img class = "staff-img" src="<?php echo customFieldExcerpt(get_field("profile_photo"), 1, ""); ?>" alt="">
                    <h2><?php echo strtoupper(customFieldExcerpt(get_field("name"), 4, "")); ?></h2>
                    <h3><?php echo customFieldExcerpt(get_field("position"), 1, ""); ?></h3>
                    <p>tlf: <?php echo customFieldExcerpt(get_field("phone_number"), 1, ""); ?></p>
                    <p><?php echo customFieldExcerpt(get_field("email"), 1, ""); ?></p>
                </div>

                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>

            <?php else : ?>
                <!-- dont know what the __() is about -->
                <p><?php __('No Staff'); ?></p>
            <?php endif; ?>
        </div>
    </div>
</div>

<div class="news-container">
    <div class = "affiliates-box">
        <h1 class="h1-center">ÖVRIGA VERKSAMHETER I HUSET</h1>

        <?php
        $the_query = new WP_Query([
            'posts_per_page' => 3,
            'post_type' => 'affiliations'
        ]);
        ?>

        <?php if ($the_query->have_posts()) : ?>
            <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>

            <div class = "affiliate-member-box">
                <img class = "affiliate-img" src="<?php echo customFieldExcerpt(get_field("photo"), 1, ""); ?>" alt="">
                <div class = "affiliate-text-box">
                    <h2 class = "affiliate-name"><?php echo strtoupper(customFieldExcerpt(get_field("company_name"), 4, "")); ?></h2>
                    <div class = "affiliate-email-website">
                        <p><?php echo customFieldExcerpt(get_field("email"), 1, ""); ?></p>
                        <p class = "affiliate-email"><?php echo customFieldExcerpt(get_field("website"), 1, ""); ?></p>
                    </div>
                </div>
            </div>

            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>

        <?php else : ?>
            <!-- dont know what the __() is about -->
            <p><?php __('No Affiliates'); ?></p>
        <?php endif; ?>
    </div>

    <div class = "find-us-box">
        <h1 class="h1-center">HITTA HIT</h1>

        <div class = "address">
            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M5.49999 16.5C2.46243 13.4624 2.46243 8.53757 5.5 5.5C8.53756 2.46244 13.4624 2.46244 16.5 5.50001C19.5376 8.53757 19.5376 13.4624 16.5 16.5L11 22L5.49999 16.5Z" fill="#FFA450"/>
                <circle cx="11" cy="11" r="5" fill="#FF823F"/></svg>
            <h3>Adress</h3>
        </div>
        <div class = "address-text">
            <p>Gathenhielmska Huset</p>
            <p>Stigbergetstorget 7</p>
            <p>414 63 Göteborg</p>
        </div>
        <img src="<?php bloginfo('template_directory') ?>/assets/images/map.png" alt="gathenhielmska-map">
        <div class="directions-div">
            <h3 class = "directions">Vägbeskrivning: </h3>
            <p class = "directions">Närmaste hållplats är blablabla och intill denfinns bla bla. Sen borde du se dadada. Sen är du där cacaca</p>
        </div>
    </div>



</div>

<?php get_footer(); ?>



