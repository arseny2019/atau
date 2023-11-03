<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package atau
 */

?>
<div class="new-modal-overlay js-success-modal-overlay"></div>
<div class="new-modal js-success-modal">
    <div class="new-modal__cross js-success-close"></div>
    <h4 class="new-modal__title js-success-title"></h4>
    <p class="new-modal__text js-success-text"></p>
    <p class="new-modal__text-gray"><?php echo wpautop(carbon_get_theme_option('form-footer-text')); ?></p>
    <a class="new-modal__phone" href="tel: <?php output_phone_number('carbon_phone', true); ?>"
    ><?php output_phone_number('carbon_phone', false); ?></a>
    <button class="new-modal__back js-success-close">Назад</button>
</div>
<div class="new-modal-overlay js-new-feedback-modal-overlay"></div>
<div class="new-modal new-modal_feedback js-new-feedback-modal-2">
    <div class="new-modal__cross js-feedback-close"></div>
    <h4 class="new-modal__title"><?php echo carbon_get_theme_option('form2-title'); ?></h4>
    <div class="new-modal__form">
        <?php echo do_shortcode('[contact-form-7 id="930" title="Обратная связь"]'); ?>
    </div>
    <button class="new-modal__back new-modal__back_margin js-feedback-close">Назад</button>
</div>
<footer class="new-footer">
    <div class="new-container">
        <div class="new-footer__top">
            <div class="new-footer__menu">
                <?php output_footer_left_menu(); ?>
                <?php output_footer_right_menu(); ?>
            </div>
            <div class="new-footer__form-container"><h3><?php echo carbon_get_theme_option('form4-title'); ?></h3>
                <p><?php echo carbon_get_theme_option('form4-subtitle'); ?></p>
                <div class="new-footer__form js-new-feedback-modal">
                    <?php echo do_shortcode('[contact-form-7 id="932" title="Остались вопросы"]'); ?>
                </div>
            </div>
            <div class="new-footer__menu-mobile">
                <div><?php output_footer_left_menu(); ?></div>
                <div><?php output_footer_right_menu(); ?></div>
            </div>
        </div>
        <div class="new-footer__bottom">
            <div class="new-footer__bottom-left">
                <div class="new-footer__link">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/img/new-map-pin.svg"/><span><?php output_address(); ?></span>
                </div>
                <a class="new-footer__link" href="tel: <?php output_phone_number('carbon_phone', true); ?>">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/img/new-phone.svg"/>
                    <span><?php output_phone_number('carbon_phone', false); ?></span>
                </a>
            </div>
            <div class="new-footer__features">
                <a href="<?php output_vk(); ?>" target="_blank" rel="noreferrer noopener">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/img/new-vk.svg"/>
                </a>
                <a href="<?php output_inst(); ?>" target="_blank" rel="noreferrer noopener">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/img/new-tg.svg"/>
                </a>
                <a href="<?php output_rutube(); ?>" target="_blank" rel="noreferrer noopener">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/img/rutube.svg"/>
                </a>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>

</body>
</html>
