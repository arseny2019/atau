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
    <section class="banner-section">
        <div class="new-container">
            <div class="banner">
                <div class="banner__container js-banner-container">
                    <?php
                    $banner = carbon_get_theme_option('banner');
                    $idx = 0;
                    foreach ($banner as $slide) {
                        ?>
                        <div class="js-banner-slide banner__slide<?php
                        if ($idx === 0) {
                            echo ' banner__slide_active';
                        }
                        if ($slide['inverse']) {
                            echo ' banner__slide-inverted';
                        }
                        ?>" data-index="<?php echo $idx; ?>">
                            <?php if ($slide['inverse']) {
                                ?>
                                <div class="banner__slide-right">
                                    <img class="banner__image"
                                         src="<?php echo wp_get_attachment_image_url($slide['image'], 'full'); ?>"/>
                                </div>
                                <div class="banner__slide-left">
                                    <h3 class="banner__slide-title"><?php echo $slide['title'] ?></h3>
                                    <p class="banner__slide-description"><?php echo $slide['text'] ?></p>
                                    <a href="<?php echo $slide['link'] ?>">
                                        <button class="banner__slide-button orange-button">Подробнее</button>
                                    </a>
                                    <div class="banner__slide-features">
                                        <?php foreach ($slide['features'] as $feature) { ?>
                                            <div><span></span><span><?php echo $feature['title']; ?></span></div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <?php
                            } else { ?>
                                <div class="banner__slide-left">
                                    <h3 class="banner__slide-title"><?php echo $slide['title'] ?></h3>
                                    <p class="banner__slide-description"><?php echo $slide['text'] ?></p>
                                    <a href="<?php echo $slide['link'] ?>">
                                        <button class="banner__slide-button orange-button">Подробнее</button>
                                    </a>
                                    <div class="banner__slide-features">
                                        <?php foreach ($slide['features'] as $feature) { ?>
                                            <div><span></span><span><?php echo $feature['title']; ?></span></div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="banner__slide-right">
                                    <img class="banner__image"
                                         src="<?php echo wp_get_attachment_image_url($slide['image'], 'full'); ?>"/>
                                </div>
                            <?php } ?>
                        </div>
                        <?php
                        $idx++;
                    }
                    ?>
                </div>
                <div class="banner__navigation">
                    <div class="banner__prev js-banner-prev">
                        <svg width="56" height="40" viewBox="0 0 56 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g id="Arrow 1">
                                <path id="Arrow 3"
                                      d="M44 18.5C44.8284 18.5 45.5 19.1716 45.5 20C45.5 20.8284 44.8284 21.5 44 21.5V18.5ZM10.9393 21.0607C10.3536 20.4749 10.3536 19.5251 10.9393 18.9393L20.4853 9.3934C21.0711 8.80761 22.0208 8.80761 22.6066 9.3934C23.1924 9.97919 23.1924 10.9289 22.6066 11.5147L14.1213 20L22.6066 28.4853C23.1924 29.0711 23.1924 30.0208 22.6066 30.6066C22.0208 31.1924 21.0711 31.1924 20.4853 30.6066L10.9393 21.0607ZM44 21.5H12V18.5H44V21.5Z"
                                      fill="currentColor"></path>
                            </g>
                        </svg>
                    </div>
                    <div class="banner__next js-banner-next">
                        <svg width="56" height="40" viewBox="0 0 56 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g id="Arrow 2">
                                <path id="Arrow 2_2"
                                      d="M12 18.5C11.1716 18.5 10.5 19.1716 10.5 20C10.5 20.8284 11.1716 21.5 12 21.5V18.5ZM45.0607 21.0607C45.6464 20.4749 45.6464 19.5251 45.0607 18.9393L35.5147 9.3934C34.9289 8.80761 33.9792 8.80761 33.3934 9.3934C32.8076 9.97919 32.8076 10.9289 33.3934 11.5147L41.8787 20L33.3934 28.4853C32.8076 29.0711 32.8076 30.0208 33.3934 30.6066C33.9792 31.1924 34.9289 31.1924 35.5147 30.6066L45.0607 21.0607ZM12 21.5H44V18.5H12V21.5Z"
                                      fill="currentColor"></path>
                            </g>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="banner-mobile">
                <div class="swiper js-banner-mobile">
                    <div class="swiper-wrapper">
                        <?php
                        foreach ($banner as $slide) {
                            ?>
                            <div class="swiper-slide">
                                <div class="banner-mobile__slide">
                                    <img class="banner__image"
                                         src="<?php echo wp_get_attachment_image_url($slide['image'], 'full'); ?>"/>
                                    <h3 class="banner__slide-title"><?php echo $slide['title']; ?></h3>
                                    <p class="banner__slide-description"><?php echo $slide['text']; ?></p>
                                    <div class="banner__slide-features">
                                        <?php foreach ($slide['features'] as $feature) { ?>
                                            <div><span></span><span><?php echo $feature['title']; ?></span></div>
                                        <?php } ?>
                                    </div>
                                    <a href="<?php echo $slide['link'] ?>">
                                        <button class="banner__slide-button orange-button">Подробнее</button>
                                    </a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="banner-mobile__pagination js-banner-mobile-pagination"></div>
                </div>
            </div>
        </div>
    </section>
    <section class="new-about">
        <div class="new-container"><h2
                    class="new-about__title"><?php echo carbon_get_theme_option('about-title') ?></h2>
            <div class="new-about__grid">
                <div class="new-about__left"><p
                            class="new-about__text"><?php echo carbon_get_theme_option('about-text') ?></p>
                    <a href="<?php echo carbon_get_theme_option('about-link') ?>">
                        <button class="orange-button new-about__button">Подробнее</button>
                    </a>
                    <a href="<?php echo carbon_get_theme_option('about-link') ?>">
                        <button class="new-about__button-mobile">Подробнее</button>
                    </a>
                </div>
                <div class="new-about__image-container">
                    <img class="new-about__image"
                         src="<?php echo wp_get_attachment_image_url(carbon_get_theme_option('about-image'), 'full') ?>"/>
                </div>
            </div>
        </div>
    </section>
    <section class="new-our-projects">
        <div class="new-container"><h2
                    class="new-our-projects__title"><?php echo carbon_get_theme_option('projects-title') ?></h2>
            <div class="new-our-projects__grid">
                <?php
                $projects = carbon_get_theme_option('projects-images');
                foreach ($projects as $project) {
                    ?>
                    <div class="new-our-projects__item-container">
                        <img class="new-our-projects__item"
                             src="<?php echo wp_get_attachment_image_url($project, 'full') ?>"/>
                    </div>
                    <?php
                }
                ?>
            </div>
            <a href="<?php echo carbon_get_theme_option('projects-link') ?>"
               class="orange-button new-our-projects__button">Показать еще</a>
        </div>
    </section>
    <section class="why-we">
        <div class="new-container">
            <h2 class="why-we__title"><?php echo carbon_get_theme_option('why-we-title'); ?></h2>
            <div class="why-we__features">
                <div class="why-we__feature"><img src="<?php echo get_template_directory_uri() ?>/assets/img/like.svg"/>
                    <div class="why-we__feature-title"><?php echo carbon_get_theme_option('why-we-feature-1-title'); ?>
                        <
                    </div>
                    <div class="why-we__feature-text"><?php echo carbon_get_theme_option('why-we-feature-1-text'); ?></div>
                </div>
                <div class="why-we__feature"><img src="<?php echo get_template_directory_uri() ?>/assets/img/idea.svg"/>
                    <div class="why-we__feature-title"><?php echo carbon_get_theme_option('why-we-feature-2-title'); ?></div>
                    <div class="why-we__feature-text"><?php echo carbon_get_theme_option('why-we-feature-2-text'); ?></div>
                </div>
                <div class="why-we__feature"><img
                            src="<?php echo get_template_directory_uri() ?>/assets/img/approach.svg"/>
                    <div class="why-we__feature-title"><?php echo carbon_get_theme_option('why-we-feature-3-title'); ?></div>
                    <div class="why-we__feature-text"><?php echo carbon_get_theme_option('why-we-feature-3-text'); ?></div>
                </div>
            </div>
            <a href="#contactUs">
                <button class="orange-button why-we__button js-set-state-request">Оставить заявку</button>
            </a>
            <div class="why-we__partners">
                <div class="swiper js-new-partners-slider">
                    <div class="swiper-wrapper">
                        <?php
                        $partners = carbon_get_theme_option('why-we-images');
                        foreach ($partners as $partner) {
                            ?>

                            <div class="swiper-slide"><img
                                        src="<?php echo wp_get_attachment_image_url($partner, 'full'); ?>"/></div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <a id="contactUs"></a>
    <section class="new-contact-us">
        <div class="new-container">
            <div class="new-contact-us__grid">
                <div class="new-contact-us__left">
                    <h2 class="new-contact-us__title"><?php echo carbon_get_theme_option('form1-title'); ?></h2>
                    <p class="new-contact-us__text"><?php echo carbon_get_theme_option('form2-subtitle'); ?></p>
                    <div class="new-contact-us__form js-new-feedback-modal">
                        <?php echo do_shortcode('[contact-form-7 id="931" title="Оставить заявку"]') ?>
                    </div>
                </div>
                <div class="new-contact-us__image">
                    <img src="<?php echo wp_get_attachment_image_url(carbon_get_theme_option('form1-image'), 'full'); ?>"/>
                </div>
            </div>
        </div>
    </section>

<?php
get_footer();
