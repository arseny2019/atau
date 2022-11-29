<?php

get_header();


$query = new WP_Query(
    array(
        'post_status' => 'publish',
        'posts_per_page' => 6,
        'post_type' => 'project'
    )
);
?>

    <section class="projects">
        <div class="container"><h1 class="projects__title">Наши работы</h1>
            <?php
            if (!empty($query->posts)) {
                ?>
                <div class="projects__grid">
                    <?php foreach ($query->posts as $post) { ?>
                        <div class="projects__item">
                            <div class="projects-slider-container">
                                <div class="swiper projects-slider">
                                    <div class="swiper-wrapper">
                                        <?php
                                        $slides = carbon_get_post_meta($post->ID, 'slider');

                                        foreach ($slides as $slide) {
                                            $image_url = wp_get_attachment_image_url($slide, 'full');
                                            ?>
                                            <div class="swiper-slide projects-slider__slide">
                                                <img class="projects-slider__image" src="<?php echo $image_url; ?>"/>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="projects-slider-arrows">
                                    <div class="projects-slider-arrow projects-slider-arrow_prev">
                                        <svg width="60" height="60" viewBox="0 0 60 60" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="30" cy="30" r="30" transform="rotate(-180 30 30)"
                                                    fill="currentColor"></circle>
                                            <path d="M40 30L24 44L34 30L24 16L40 30Z" fill="white"></path>
                                        </svg>
                                    </div>
                                    <div class="projects-slider-arrow projects-slider-arrow_next">
                                        <svg width="60" height="60" viewBox="0 0 60 60" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="30" cy="30" r="30" transform="rotate(-180 30 30)"
                                                    fill="currentColor"></circle>
                                            <path d="M40 30L24 44L34 30L24 16L40 30Z" fill="white"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="projects__item-content">
                                <div><p class="projects__item-title"><?php echo $post->post_title; ?></p>
                                    <div class="projects__item-text"><?php echo wpautop($post->post_content); ?></div>
                                </div>
                                <p class="projects__item-date"><?php echo carbon_get_post_meta($post->ID, 'date'); ?></p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>

            <?php if ($query->found_posts > 6) { ?>
                <button class="projects__more main-button js-more-button" data-offset="1">Показать еще</button>
            <?php } ?>
        </div>
    </section>

<?php

get_footer();
