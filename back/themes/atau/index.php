<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package atau
 */

get_header();
?>

    <section class="slider-section">
        <div class="container">
            <div class="slider-container">
                <div class="slider">
                    <?php
                    $slides = carbon_get_theme_option('main_slider');
                    ?>
                    <div class="swiper main-slider">
                        <div class="swiper-wrapper">
                            <?php foreach ($slides as $image_id) {
                                $image_url = wp_get_attachment_image_url($image_id, 'full');
                                ?>
                                <div class="swiper-slide slider__slide">
                                    <img class="slider__image" src="<?php echo $image_url; ?>"/>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination main-slider-pagination"></div>
                <button class="swiper-button-prev slider-arrow slider-arrow_prev blue-text-hover">
                    <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="30" cy="30" r="30" transform="rotate(-180 30 30)" fill="currentColor"></circle>
                        <path d="M40 30L24 44L34 30L24 16L40 30Z" fill="white"></path>
                    </svg>
                </button>
                <button class="swiper-button-next slider-arrow slider-arrow_next blue-text-hover">
                    <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="30" cy="30" r="30" transform="rotate(-180 30 30)" fill="currentColor"></circle>
                        <path d="M40 30L24 44L34 30L24 16L40 30Z" fill="white"></path>
                    </svg>
                </button>
            </div>
        </div>
    </section>
    <section class="info-section">
        <?php

        ?>
        <div class="container">
            <div class="info-section__top"><h2
                        class="info-section__title"><?php echo carbon_get_theme_option('main-block1-title'); ?></h2>
                <p class="info-section__subtitle">
                    <?php echo carbon_get_theme_option('main-block1-text'); ?>
                </p></div>
            <div class="info-section__bottom">
                <div class="info-section__features">
                    <?php
                    $features = carbon_get_theme_option('main-block-1-features');
                    foreach ($features as $feature) {
                        $image_url = wp_get_attachment_image_url($feature['image'], 'full');
                        ?>
                        <div class="info-section__feature">
                            <div class="info-section__feature-img"
                                 style="background-image: url('<?php echo $image_url ?>')"></div>
                            <h3 class="info-section__feature-title"><?php echo $feature['title']; ?></h3>
                            <p class="info-section__feature-text"><?php echo $feature['text']; ?></p></div>
                    <?php } ?>
                </div>
                <a class="info-section__more main-button" href="/about">Узнать больше</a></div>
        </div>
    </section>
    <section class="category-section">
        <div class="category-section__image"></div>
        <div class="container">
            <?php
            $terms = get_terms([
                'taxonomy' => 'equipment_type',
                'hide_empty' => false,
            ]);
            ?>
            <div class="category-section__header"><h2
                        class="category-section__title"><?php echo carbon_get_theme_option('main-block2-title'); ?></h2>
                <p class="category-section__subtitle"><?php echo carbon_get_theme_option('main-block2-subtitle'); ?></p>
            </div>
            <div class="category-section__grid">
                <?php foreach ($terms as $term) {
                    $image_url = wp_get_attachment_image_url(carbon_get_term_meta($term->term_id, 'thumbnail'), 'full');
                    ?>
                    <a class="category-section__item"
                       href="<?php echo get_term_link($term, $taxonomy = 'equipment_type'); ?>">
                        <img class="category-section__item-img" src="<?php echo $image_url; ?>"/>
                        <p class="category-section__item-title"><?php echo $term->name; ?></p></a>
                <?php } ?>
            </div>
        </div>
    </section>
    <section class="feedback-section">
        <?php
        $args = array(
            'post_type' => 'feedback',
            'post_status' => 'publish',
            'posts_per_page' => -1
        );
        $query = new WP_Query($args);
        ?>
        <div class="container"><h2
                    class="feedback-section__title"><?php echo carbon_get_theme_option('main-block3-title'); ?></h2>
            <div class="feedback-section__container">
                <div class="feedback-section__author"><img class="feedback-section__author-img" id="feedbackAvatar"/>
                    <p class="feedback-section__author-name" id="feedbackName"></p></div>
                <div class="feedback-section__slider">
                    <div class="swiper feedback-slider">
                        <div class="swiper-wrapper">
                            <?php foreach ($query->posts as $feedback) {
//                                $video_url = wp_get_attachment_url(carbon_get_post_meta($feedback->ID, 'feedback_video')[0]);
                                ?>
                                <div class="swiper-slide feedback-slider__slide">
                                    <?php
                                    $video = carbon_get_post_meta($feedback->ID, 'video');
                                    $src = explode('src="', $video);
                                    $src = explode('"', $src[1]);
                                    ?>
                                    <iframe
                                            width="100%"
                                            height="100%"
                                            class="feedback-slider__image"
                                            src="<?php echo $src[0]; ?>"
                                            allow="encrypted-media; fullscreen; picture-in-picture;"
                                            frameborder="0"
                                            allowfullscreen="allowfullscreen"></iframe>
                                    <input type="hidden"
                                           value='{"image":"<?php echo get_the_post_thumbnail_url($feedback->ID, 'full'); ?>",
                                       "name":"<?php echo $feedback->post_title ?>","text":"<?php echo $feedback->post_excerpt ?>"}'/>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <button class="swiper-button-prev feedback-slider-arrow feedback-slider-arrow_prev">
                        <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="30" cy="30" r="30" transform="rotate(-180 30 30)" fill="currentColor"></circle>
                            <path d="M40 30L24 44L34 30L24 16L40 30Z" fill="#1A2854"></path>
                        </svg>
                    </button>
                    <button class="swiper-button-next feedback-slider-arrow feedback-slider-arrow_next">
                        <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="30" cy="30" r="30" transform="rotate(-180 30 30)" fill="currentColor"></circle>
                            <path d="M40 30L24 44L34 30L24 16L40 30Z" fill="#1A2854"></path>
                        </svg>
                    </button>
                    <div class="swiper-pagination feedback-slider-pagination"></div>
                </div>
                <div class="feedback-slider-text" id="feedbackText">Текст слайда</div>
            </div>
        </div>
    </section>
    <section class="projects-section">
        <?php
        $args = array(
            'post_type' => 'project',
            'post_status' => 'publish',
            'posts_per_page' => 3
        );
        $query = new WP_Query($args);
        ?>
        <div class="container">
            <div class="projects-section__header">
                <h2 class="projects-section__title"><?php echo carbon_get_theme_option('main-block4-title'); ?></h2>
                <p class="projects-section__subtitle"><?php echo carbon_get_theme_option('main-block4-subtitle'); ?></p>
            </div>
            <div class="projects-section__grid">
                <?php foreach ($query->posts as $partner) {
                    $thumbnail = carbon_get_post_meta($partner->ID, 'slider')[0];
                    if ($thumbnail) {
                        ?>
                        <img class="projects-section__item"
                             src="<?php echo wp_get_attachment_image_url($thumbnail, 'full'); ?>"/>
                        <?php
                    }
                }
                ?>
            </div>
            <a class="projects-section__more main-button" href="/project">Показать больше</a>
        </div>
    </section>
    <div class="partners">
        <div class="container">
            <?php
            $args = array(
                'post_type' => 'partner',
                'post_status' => 'publish',
                'posts_per_page' => -1
            );
            $query = new WP_Query($args);
            ?>
            <h2 class="partners__title"><?php echo carbon_get_theme_option('main-block5-title'); ?></h2>
            <div class="partners__grid">
                <?php foreach ($query->posts as $partner) {
                    ?>
                    <img class="partners__item" src="<?php echo get_the_post_thumbnail_url($partner->ID, 'full'); ?>"/>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="text-section">
        <div class="container">
            <div class="text-section__content text-section__content_hidden">
                <?php echo wpautop(carbon_get_theme_option('main-block6-text')); ?>
            </div>
            <button class="text-section__more blue-text-hover">Показать еще</button>
        </div>
    </div>

<?php
get_footer();
