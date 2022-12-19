<?php

get_header();
global $post;
$thumbnail_url = get_the_post_thumbnail_url($post->ID, 'full');
?>

    <div class="blog-detail">
        <div class="container"><a class="blog-detail__back" href="/blog">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15 18.5L9 12.5L15 6.5" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                          stroke-linejoin="round"></path>
                </svg>
                Новости</a>
            <h2 class="blog-detail__title"><?php echo $post->post_title; ?></h2>
            <img class="blog-detail__image" src="<?php echo $thumbnail_url; ?>"/>
            <div class="blog-detail__gallery-mobile">
                <?php $slides = carbon_get_post_meta($post->ID, 'slider');
                if (!empty($slides && !empty($slides[0]))) {
                    $image_url = wp_get_attachment_image_url($slides[0], 'full');
                    ?>
                    <img src="<?php echo $image_url; ?>"/>
                    <?php
                }
                if (!empty($slides && !empty($slides[1]))) {
                    $image_url = wp_get_attachment_image_url($slides[1], 'full');
                    ?>
                    <img src="<?php echo $image_url; ?>"/>
                    <?php
                }
                ?>
            </div>
            <?php if (count($slides) > 2) { ?>
                <button class="blog__item-link blog-detail__gallery-mobile-button js-open-modal-slider">Посмотреть все
                    фото
                </button>
            <?php } ?>
            <div class="slider-modal-overlay">
                <div class="slider-modal">
                    <div class="slider-modal__cross js-slider-modal-close"></div>
                    <div class="slider-modal-container">
                        <div class="swiper modal-slider">
                            <div class="swiper-wrapper">
                                <?php ?>
                                <?php if ($thumbnail_url) { ?>
                                    <div class="swiper-slide slider-modal__slide">
                                        <img class="slider-modal__image" src="<?php echo $thumbnail_url; ?>"/>
                                    </div>
                                    <?php
                                }
                                foreach ($slides as $slide) {
                                    $image_url = wp_get_attachment_image_url($slide, 'full');
                                    ?>
                                    <div class="swiper-slide slider-modal__slide">
                                        <img class="slider-modal__image" src="<?php echo $image_url; ?>"/>
                                    </div>
                                    <?php
                                }
                                ?>
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
            <div class="blog-detail__grid">
                <?php
                $post_author = carbon_get_post_meta($post->ID, 'author');
                $post_author_status = carbon_get_post_meta($post->ID, 'author_status');
                $post_date = carbon_get_post_meta($post->ID, 'date');

                ?>
                <div class="blog-detail__left">
                    <div class="blog-detail__text">
                        <?php echo wpautop($post->post_content); ?>
                    </div>
                    <div class="blog-detail__footer">
                        <?php if ($post_date) { ?>
                            <div class="blog-detail__date">
                                <span>Дата написания статьи:</span><span><?php echo $post_date; ?></span>
                            </div>
                        <?php } ?>
                        <?php if ($post_author) { ?>
                            <div class="blog-detail__author blog-detail__author_mobile">
                                <span>Автор статьи:</span><span><?php echo $post_author; ?></span>
                                <?php if ($post_author_status) { ?>
                                    <span><?php echo $post_author_status; ?></span>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="blog-detail__right">
                    <?php if ($post_author) { ?>
                        <div class="blog-detail__author">
                            <span>Автор статьи:</span><span><?php echo $post_author; ?></span>
                            <?php if ($post_author_status) { ?>
                                <span><?php echo $post_author_status; ?></span>
                            <?php } ?>
                        </div>
                    <?php } ?>
                    <div class="blog-detail__gallery">
                        <?php
                        foreach ($slides as $slide) {
                            $image_url = wp_get_attachment_image_url($slide, 'full');
                            ?>
                            <img src="<?php echo $image_url; ?>"/>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
get_footer();
