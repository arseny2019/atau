<?php
get_header();

global $post;

$term = wp_get_post_terms($post->ID, 'equipment_type')[0];
$term_link = get_term_link($term, 'equipment_type');
?>
    <div class="order-modal-overlay">
        <div class="order-modal">
            <div class="order-modal__cross order-modal-close"></div>
            <div class="modal-body">
                <div class="order-modal__title"><?php echo carbon_get_theme_option('form3-title'); ?></div>
                <div class="order-modal__subtitle"><?php echo carbon_get_theme_option('form3-subtitle'); ?></div>
                <?php echo do_shortcode('[contact-form-7 id="94" title="Форма на деталке"]'); ?>
            </div>
            <div class="modal-success">
                <div class="order-modal__title"><?php echo carbon_get_theme_option('form3-title-success'); ?></div>
                <div class="order-modal__subtitle"><?php echo carbon_get_theme_option('form3-subtitle-success'); ?></div>
            </div>
        </div>
    </div>
    <div class="category-detail">
        <div class="container">
            <a class="category-detail__back" href="<?php echo $term_link; ?>">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15 18.5L9 12.5L15 6.5" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                          stroke-linejoin="round"></path>
                </svg>
                <?php echo $term->name; ?></a>
            <h2 class="category-detail__title"><?php echo $post->post_title; ?></h2>
            <?php $slides = carbon_get_post_meta($post->ID, 'gallery');
            if (!empty($slides)) {
                ?>
                <div class="slider-modal-overlay">
                    <div class="slider-modal">
                        <div class="slider-modal__cross js-slider-modal-close"></div>
                        <div class="slider-modal-container">
                            <div class="swiper modal-slider">
                                <div class="swiper-wrapper">
                                    <?php foreach ($slides as $slide) {
                                        $image_url = wp_get_attachment_image_url($slide, 'full');
                                        ?>
                                        <div class="swiper-slide slider-modal__slide">
                                            <img class="slider-modal__image" src="<?php echo $image_url; ?>"/>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="slider-modal-arrows">
                            <div class="slider-modal-arrow slider-modal-arrow_prev">
                                <svg width="60" height="60" viewBox="0 0 60 60" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="30" cy="30" r="30" transform="rotate(-180 30 30)"
                                            fill="currentColor"></circle>
                                    <path d="M40 30L24 44L34 30L24 16L40 30Z" fill="white"></path>
                                </svg>
                            </div>
                            <div class="slider-modal-arrow slider-modal-arrow_next">
                                <svg width="60" height="60" viewBox="0 0 60 60" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="30" cy="30" r="30" transform="rotate(-180 30 30)"
                                            fill="currentColor"></circle>
                                    <path d="M40 30L24 44L34 30L24 16L40 30Z" fill="white"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <div class="category-detail__container">
                <?php
                $video = carbon_get_post_meta($post->ID, 'video');
                $src = explode('src="', $video);
                $src = explode('"', $src[1]);
                ?>
                <iframe class="category-detail__video<?php if (count($slides) < 2) echo ' category-detail__video_fixed-height' ?>"
                        src="<?php echo $src[0]; ?>"
                        allow="autoplay; encrypted-media; fullscreen; picture-in-picture;" frameborder="0"
                        allowfullscreen="allowfullscreen"></iframe>
                <div class="category-detail__gallery">
                    <?php for ($i = 0; $i < 3; $i++) {
                        if (!empty($slides[$i])) {
                            $image_url = wp_get_attachment_image_url($slides[$i], 'full');
                            ?>
                            <img class="category-detail__gallery-image" src="<?php echo $image_url; ?>"/>
                        <?php }
                    } ?>
                    <?php if (!empty($slides)) { ?>
                        <div class="flex-basis">
                            <button class="category-detail__gallery-button mobile-hidden js-open-modal-slider">
                                Посмотреть
                                фото
                            </button>
                        </div>
                    <?php } ?>
                </div>
                <?php
                if (!empty($slides)) {
                    ?>
                    <div class="flex-basis">
                        <button class="category-detail__gallery-button mobile-only js-open-modal-slider">Посмотреть все
                            фото
                        </button>
                    </div>
                <?php } ?>
                <div class="category-detail__text">
                    <?php echo wpautop($post->post_content); ?>
                </div>
            </div>
            <button class="category-detail__modal-button main-button js-order-form-button"><?php echo carbon_get_theme_option('form3-call'); ?></button>
        </div>
    </div>
<?php
get_footer();
