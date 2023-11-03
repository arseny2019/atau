<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package atau
 */

do_action('redirect_action');
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body>
<?php wp_body_open(); ?>
<?php
$object = [];
$object['request']['success']['title'] = carbon_get_theme_option('form1-title-success');
$object['request']['success']['text'] = carbon_get_theme_option('form1-subtitle-success');
$object['request']['fail']['title'] = carbon_get_theme_option('form1-title-fail');
$object['request']['fail']['text'] = carbon_get_theme_option('form1-subtitle-fail');

$object['feedback']['success']['title'] = carbon_get_theme_option('form2-title-success');
$object['feedback']['success']['text'] = carbon_get_theme_option('form2-subtitle-success');
$object['feedback']['fail']['title'] = carbon_get_theme_option('form2-title-fail');
$object['feedback']['fail']['text'] = carbon_get_theme_option('form2-subtitle-fail');

$object['call']['success']['title'] = carbon_get_theme_option('form4-title-success');
$object['call']['success']['text'] = carbon_get_theme_option('form4-subtitle-success');
$object['call']['fail']['title'] = carbon_get_theme_option('form4-title-fail');
$object['call']['fail']['text'] = carbon_get_theme_option('form4-subtitle-fail');
?>
<input type="hidden" id="modal-info" value='<?php echo json_encode($object); ?>'>
<div class="new-header fira-sans">
    <div class="new-container">
        <div class="new-header__top">
            <div class="tablet-vertical-only new-header__burger">
                <span class="header__burger-line"></span>
            </div>
            <div class="new-header__link tablet-vertical-hidden">
                <img src="<?php echo get_template_directory_uri() ?>/assets/img/new-map-pin-white.svg"/>
                <span><?php output_address(); ?></span>
            </div>
            <a href="/">
                <img class="new-header__logo" src="<?php echo get_template_directory_uri() ?>/assets/img/logo.svg"/>
            </a>
            <div class="new-header__socials tablet-vertical-hidden">
                <a class="new-header__link new-header__phone" href="tel: <?php output_phone_number('carbon_phone', true); ?>">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/img/new-phone-white.svg"/>
                    <span><?php output_phone_number('carbon_phone', false); ?></span>
                </a>
                <a href="/" target="_blank" rel="noreferrer noopener">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/img/new-tg-white.svg"/>
                </a>
                <a href="/" target="_blank" rel="noreferrer noopener">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/img/new-vk-white.svg"/>
                </a>
                <a href="<?php output_rutube(); ?>" target="_blank" rel="noreferrer noopener">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/img/rutube-white.svg"/>
                </a>
            </div>
        </div>
    </div>
    <div class="new-header__bottom tablet-vertical-hidden">
        <div class="new-container">
            <div class="new-header__menu"><?php output_header_main_menu(); ?></div>
            <button class="new-header__feedback js-set-state-feedback"><?php echo carbon_get_theme_option('form2-call'); ?></button>
        </div>
    </div>
</div>
<div class="new-sidebar fira-sans new-sidebar_hidden<?php if (is_user_logged_in()) echo ' sidebar_admin' ?>">
    <div class="new-container">
        <div class="new-sidebar__top">
            <a href="/">
                <img class="new-sidebar__logo" src="<?php echo get_template_directory_uri() ?>/assets/img/logo.svg"/>
            </a>
            <div class="new-sidebar__cross"></div>
        </div>
        <div class="new-sidebar__container">
            <div class="new-sidebar__menu">
                <?php output_mobile_menu(); ?>
                <div class="new-sidebar__feedback js-set-state-feedback"><?php echo carbon_get_theme_option('form2-call'); ?></div>
            </div>
            <div class="new-sidebar__bottom">
                <div class="new-sidebar__link">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/img/new-map-pin-white.svg"/>
                    <span><?php output_address(); ?></span>
                </div>
                <a class="new-sidebar__link" href="tel: <?php output_phone_number('carbon_phone', true); ?>">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/img/new-phone-white.svg"/>
                    <span><?php output_phone_number('carbon_phone', false); ?></span>
                </a>
                <div class="new-sidebar__socials">
                    <a href="<?php output_inst(); ?>" target="_blank" rel="noreferrer noopener">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/img/new-tg-white.svg"/>
                    </a>
                    <a href="<?php output_vk(); ?>" target="_blank" rel="noreferrer noopener">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/img/new-vk-white.svg"/>
                    </a>
                    <a href="/" target="_blank" rel="noreferrer noopener">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/img/rutube-white.svg"/>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="question-modal-overlay<?php if (is_user_logged_in()) echo ' question-modal-overlay_admin' ?>">
    <div class="question-modal<?php if (is_user_logged_in()) echo ' question-modal_admin' ?>">
        <div class="question-modal__cross question-modal-close"></div>
        <div class="modal-body">
            <div class="question-modal__title"><?php echo carbon_get_theme_option('form1-title'); ?></div>
            <div class="question-modal__subtitle"><?php echo carbon_get_theme_option('form1-subtitle'); ?></div>
            <?php echo do_shortcode('[contact-form-7 id="73" title="Задать вопрос"]'); ?>
        </div>
        <div class="modal-success">
            <div class="question-modal__title"><?php echo carbon_get_theme_option('form1-title-success'); ?></div>
            <div class="question-modal__subtitle"><?php echo carbon_get_theme_option('form1-title-success'); ?></div>
        </div>
    </div>
</div>
<div class="call-modal-overlay">
    <div class="call-modal">
        <div class="call-modal__cross call-modal-close"></div>
        <div class="modal-body">
            <div class="call-modal__title"><?php echo carbon_get_theme_option('form2-title'); ?></div>
            <div class="call-modal__subtitle"><?php echo carbon_get_theme_option('form2-subtitle'); ?></div>
            <?php echo do_shortcode('[contact-form-7 id="74" title="Заказать звонок"]'); ?>
        </div>
        <div class="modal-success">
            <div class="call-modal__title"><?php echo carbon_get_theme_option('form2-title-success'); ?></div>
            <div class="call-modal__subtitle"><?php echo carbon_get_theme_option('form2-subtitle-success'); ?></div>
        </div>
    </div>
</div>

