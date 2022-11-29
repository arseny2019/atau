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
<header class="header">
    <div class="container">
        <div class="header__top">
            <div class="header__burger"><span class="header__burger-line"></span></div>
            <div class="header__left"><a class="header__logo" href="/"></a>
                <button class="header__modal-button js-question-form-button blue-text-hover">
                    <?php echo carbon_get_theme_option('form1-call'); ?>
                </button>
            </div>
            <div class="header__right">
                <a class="header__phone blue-text-hover" href="tel: <?php output_phone_number('carbon_phone', true); ?>">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M21.9992 16.9199V19.9199C22.0003 20.1984 21.9433 20.474 21.8317 20.7292C21.7201 20.9844 21.5565 21.2134 21.3512 21.4017C21.146 21.59 20.9037 21.7333 20.6399 21.8226C20.3761 21.9118 20.0965 21.9449 19.8192 21.9199C16.742 21.5855 13.7862 20.534 11.1892 18.8499C8.773 17.3145 6.72451 15.266 5.18917 12.8499C3.49915 10.2411 2.44741 7.27085 2.11917 4.17985C2.09418 3.90332 2.12705 3.62461 2.21567 3.36148C2.3043 3.09834 2.44674 2.85654 2.63394 2.65147C2.82113 2.44641 3.04898 2.28256 3.30296 2.17037C3.55695 2.05819 3.83151 2.00011 4.10917 1.99985H7.10917C7.59448 1.99508 8.06496 2.16693 8.43293 2.48339C8.8009 2.79984 9.04125 3.2393 9.10917 3.71985C9.23579 4.67992 9.47062 5.62258 9.80917 6.52985C9.94371 6.88778 9.97283 7.27677 9.89308 7.65073C9.81332 8.0247 9.62803 8.36796 9.35917 8.63985L8.08917 9.90985C9.51273 12.4134 11.5856 14.4863 14.0892 15.9099L15.3592 14.6399C15.6311 14.371 15.9743 14.1857 16.3483 14.1059C16.7223 14.0262 17.1112 14.0553 17.4692 14.1899C18.3764 14.5284 19.3191 14.7632 20.2792 14.8899C20.7649 14.9584 21.2086 15.2031 21.5257 15.5773C21.8428 15.9516 22.0113 16.4294 21.9992 16.9199Z"
                              stroke="currentColor" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round"></path>
                    </svg>
                    <span><?php output_phone_number('carbon_phone', false); ?></span>
                </a>
                <div class="header__socials">
                    <a class="blue-text-hover" href="<?php output_inst(); ?>" target="_blank">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M22.2646 2.42778C21.9799 2.19091 21.6363 2.03567 21.2704 1.97858C20.9044 1.92149 20.5298 1.96469 20.1865 2.10357L2.2656 9.33892C1.88235 9.4966 1.55612 9.76711 1.3302 10.1145C1.10428 10.462 0.989366 10.8699 1.0007 11.2841C1.01204 11.6984 1.1491 12.0994 1.39368 12.434C1.63826 12.7685 1.9788 13.0208 2.3701 13.1573L5.9951 14.418L8.0156 21.0997C8.04306 21.1889 8.0829 21.2739 8.13398 21.352C8.14173 21.364 8.15266 21.373 8.1609 21.3846C8.2199 21.467 8.29121 21.5397 8.37233 21.6004C8.3954 21.618 8.41749 21.6345 8.44215 21.6501C8.53708 21.7131 8.64222 21.7591 8.75288 21.7862L8.76472 21.7872L8.77143 21.7901C8.83796 21.8036 8.90568 21.8105 8.97358 21.8106C8.98011 21.8106 8.98591 21.8074 8.99238 21.8073C9.09484 21.8055 9.19641 21.7879 9.29347 21.755C9.31605 21.7473 9.3354 21.7345 9.35731 21.7252C9.42969 21.6952 9.49826 21.6567 9.5616 21.6106C9.61232 21.5679 9.66306 21.5251 9.71382 21.4824L12.416 18.4991L16.4462 21.6211C16.8011 21.8974 17.2378 22.0475 17.6875 22.0479C18.1586 22.0473 18.6153 21.8847 18.9808 21.5874C19.3464 21.2901 19.5987 20.8762 19.6953 20.4151L22.958 4.39849C23.0319 4.03801 23.0065 3.66421 22.8843 3.31708C22.7622 2.96995 22.548 2.66255 22.2646 2.42778ZM9.3701 14.7364C9.23144 14.8745 9.13666 15.0505 9.09764 15.2422L8.78813 16.7462L8.00407 14.1532L12.0693 12.0362L9.3701 14.7364ZM17.6719 20.0401L12.9092 16.3506C12.7099 16.1966 12.4599 16.1234 12.2091 16.1455C11.9583 16.1675 11.7249 16.2833 11.5556 16.4697L10.6902 17.4249L10.9961 15.9385L18.0791 8.85549C18.2481 8.68665 18.3511 8.46285 18.3694 8.22461C18.3877 7.98638 18.3201 7.74947 18.1788 7.55681C18.0375 7.36414 17.8318 7.22845 17.5991 7.17433C17.3664 7.1202 17.122 7.15121 16.9101 7.26174L6.74485 12.5544L3.02049 11.1915L20.999 3.99905L17.6719 20.0401Z"
                                  fill="currentColor"></path>
                        </svg>
                    </a>
                    <a class="blue-text-hover" href="<?php output_vk(); ?>" target="_blank">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15.0729 2H8.9375C3.33331 2 2 3.33331 2 8.92706V15.0625C2 20.6666 3.32294 22 8.92706 22H15.0625C20.6667 22 22 20.6771 22 15.0729V8.9375C22 3.33331 20.6771 2 15.0729 2ZM18.1458 16.2708H16.6875C16.1354 16.2708 15.9688 15.8229 14.9792 14.8333C14.1146 14 13.75 13.8958 13.5312 13.8958C13.2292 13.8958 13.1458 13.9791 13.1458 14.3958V15.7083C13.1458 16.0625 13.0312 16.2708 12.1042 16.2708C11.2046 16.2104 10.3322 15.9371 9.55888 15.4735C8.78557 15.0098 8.13346 14.3691 7.65625 13.6041C6.52336 12.194 5.73511 10.5391 5.35419 8.77081C5.35419 8.55206 5.4375 8.35413 5.85419 8.35413H7.3125C7.6875 8.35413 7.82294 8.52081 7.96875 8.90625C8.67706 10.9896 9.88544 12.8021 10.375 12.8021C10.5625 12.8021 10.6458 12.7188 10.6458 12.25V10.1041C10.5833 9.125 10.0625 9.04163 10.0625 8.6875C10.0694 8.59407 10.1124 8.50699 10.1824 8.44475C10.2524 8.3825 10.3439 8.35 10.4375 8.35413H12.7292C13.0417 8.35413 13.1458 8.51038 13.1458 8.88538V11.7812C13.1458 12.0938 13.2812 12.1979 13.375 12.1979C13.5625 12.1979 13.7083 12.0938 14.0521 11.75C14.7907 10.8492 15.3943 9.84559 15.8438 8.77081C15.8896 8.64149 15.9766 8.53074 16.0913 8.4555C16.2061 8.38025 16.3423 8.34465 16.4792 8.35413H17.9375C18.375 8.35413 18.4688 8.57288 18.375 8.88538C17.8444 10.0737 17.1878 11.2017 16.4167 12.25C16.2604 12.4896 16.1979 12.6146 16.4167 12.8958C16.5625 13.1146 17.0729 13.5416 17.4167 13.9479C17.9167 14.4466 18.3318 15.0237 18.6458 15.6562C18.7708 16.0625 18.5625 16.2708 18.1458 16.2708Z"
                                  fill="currentColor"></path>
                        </svg>
                    </a></div>
            </div>
        </div>
        <div class="header__bottom">
            <?php output_header_main_menu(); ?>
        </div>
    </div>
</header>
<div class="sidebar sidebar_hidden<?php if (is_user_logged_in()) echo ' sidebar_admin' ?>">
    <div class="sidebar__header"><a class="sidebar__logo" href="/"></a>
        <div class="sidebar__cross"></div>
    </div>
    <div class="sidebar__content">
        <div class="sidebar__menu">
            <?php output_mobile_menu(); ?>
            <button class="header__modal-button header__modal-button_sidebar js-question-form-button blue-text-hover">
                Задать вопрос?
            </button>
        </div>
        <div class="sidebar__contacts">
            <div class="sidebar__socials"><a class="blue-text-hover" href="<?php output_inst(); ?>" target="_blank">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M22.2646 2.42778C21.9799 2.19091 21.6363 2.03567 21.2704 1.97858C20.9044 1.92149 20.5298 1.96469 20.1865 2.10357L2.2656 9.33892C1.88235 9.4966 1.55612 9.76711 1.3302 10.1145C1.10428 10.462 0.989366 10.8699 1.0007 11.2841C1.01204 11.6984 1.1491 12.0994 1.39368 12.434C1.63826 12.7685 1.9788 13.0208 2.3701 13.1573L5.9951 14.418L8.0156 21.0997C8.04306 21.1889 8.0829 21.2739 8.13398 21.352C8.14173 21.364 8.15266 21.373 8.1609 21.3846C8.2199 21.467 8.29121 21.5397 8.37233 21.6004C8.3954 21.618 8.41749 21.6345 8.44215 21.6501C8.53708 21.7131 8.64222 21.7591 8.75288 21.7862L8.76472 21.7872L8.77143 21.7901C8.83796 21.8036 8.90568 21.8105 8.97358 21.8106C8.98011 21.8106 8.98591 21.8074 8.99238 21.8073C9.09484 21.8055 9.19641 21.7879 9.29347 21.755C9.31605 21.7473 9.3354 21.7345 9.35731 21.7252C9.42969 21.6952 9.49826 21.6567 9.5616 21.6106C9.61232 21.5679 9.66306 21.5251 9.71382 21.4824L12.416 18.4991L16.4462 21.6211C16.8011 21.8974 17.2378 22.0475 17.6875 22.0479C18.1586 22.0473 18.6153 21.8847 18.9808 21.5874C19.3464 21.2901 19.5987 20.8762 19.6953 20.4151L22.958 4.39849C23.0319 4.03801 23.0065 3.66421 22.8843 3.31708C22.7622 2.96995 22.548 2.66255 22.2646 2.42778ZM9.3701 14.7364C9.23144 14.8745 9.13666 15.0505 9.09764 15.2422L8.78813 16.7462L8.00407 14.1532L12.0693 12.0362L9.3701 14.7364ZM17.6719 20.0401L12.9092 16.3506C12.7099 16.1966 12.4599 16.1234 12.2091 16.1455C11.9583 16.1675 11.7249 16.2833 11.5556 16.4697L10.6902 17.4249L10.9961 15.9385L18.0791 8.85549C18.2481 8.68665 18.3511 8.46285 18.3694 8.22461C18.3877 7.98638 18.3201 7.74947 18.1788 7.55681C18.0375 7.36414 17.8318 7.22845 17.5991 7.17433C17.3664 7.1202 17.122 7.15121 16.9101 7.26174L6.74485 12.5544L3.02049 11.1915L20.999 3.99905L17.6719 20.0401Z"
                              fill="currentColor"></path>
                    </svg>
                </a><a class="blue-text-hover" href="<?php output_vk(); ?>" target="_blank">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15.0729 2H8.9375C3.33331 2 2 3.33331 2 8.92706V15.0625C2 20.6666 3.32294 22 8.92706 22H15.0625C20.6667 22 22 20.6771 22 15.0729V8.9375C22 3.33331 20.6771 2 15.0729 2ZM18.1458 16.2708H16.6875C16.1354 16.2708 15.9688 15.8229 14.9792 14.8333C14.1146 14 13.75 13.8958 13.5312 13.8958C13.2292 13.8958 13.1458 13.9791 13.1458 14.3958V15.7083C13.1458 16.0625 13.0312 16.2708 12.1042 16.2708C11.2046 16.2104 10.3322 15.9371 9.55888 15.4735C8.78557 15.0098 8.13346 14.3691 7.65625 13.6041C6.52336 12.194 5.73511 10.5391 5.35419 8.77081C5.35419 8.55206 5.4375 8.35413 5.85419 8.35413H7.3125C7.6875 8.35413 7.82294 8.52081 7.96875 8.90625C8.67706 10.9896 9.88544 12.8021 10.375 12.8021C10.5625 12.8021 10.6458 12.7188 10.6458 12.25V10.1041C10.5833 9.125 10.0625 9.04163 10.0625 8.6875C10.0694 8.59407 10.1124 8.50699 10.1824 8.44475C10.2524 8.3825 10.3439 8.35 10.4375 8.35413H12.7292C13.0417 8.35413 13.1458 8.51038 13.1458 8.88538V11.7812C13.1458 12.0938 13.2812 12.1979 13.375 12.1979C13.5625 12.1979 13.7083 12.0938 14.0521 11.75C14.7907 10.8492 15.3943 9.84559 15.8438 8.77081C15.8896 8.64149 15.9766 8.53074 16.0913 8.4555C16.2061 8.38025 16.3423 8.34465 16.4792 8.35413H17.9375C18.375 8.35413 18.4688 8.57288 18.375 8.88538C17.8444 10.0737 17.1878 11.2017 16.4167 12.25C16.2604 12.4896 16.1979 12.6146 16.4167 12.8958C16.5625 13.1146 17.0729 13.5416 17.4167 13.9479C17.9167 14.4466 18.3318 15.0237 18.6458 15.6562C18.7708 16.0625 18.5625 16.2708 18.1458 16.2708Z"
                              fill="currentColor"></path>
                    </svg>
                </a></div>
            <a class="sidebar__phone blue-text-hover" href="tel: <?php output_phone_number('carbon_phone', true); ?>">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M21.9992 16.9199V19.9199C22.0003 20.1984 21.9433 20.474 21.8317 20.7292C21.7201 20.9844 21.5565 21.2134 21.3512 21.4017C21.146 21.59 20.9037 21.7333 20.6399 21.8226C20.3761 21.9118 20.0965 21.9449 19.8192 21.9199C16.742 21.5855 13.7862 20.534 11.1892 18.8499C8.773 17.3145 6.72451 15.266 5.18917 12.8499C3.49915 10.2411 2.44741 7.27085 2.11917 4.17985C2.09418 3.90332 2.12705 3.62461 2.21567 3.36148C2.3043 3.09834 2.44674 2.85654 2.63394 2.65147C2.82113 2.44641 3.04898 2.28256 3.30296 2.17037C3.55695 2.05819 3.83151 2.00011 4.10917 1.99985H7.10917C7.59448 1.99508 8.06496 2.16693 8.43293 2.48339C8.8009 2.79984 9.04125 3.2393 9.10917 3.71985C9.23579 4.67992 9.47062 5.62258 9.80917 6.52985C9.94371 6.88778 9.97283 7.27677 9.89308 7.65073C9.81332 8.0247 9.62803 8.36796 9.35917 8.63985L8.08917 9.90985C9.51273 12.4134 11.5856 14.4863 14.0892 15.9099L15.3592 14.6399C15.6311 14.371 15.9743 14.1857 16.3483 14.1059C16.7223 14.0262 17.1112 14.0553 17.4692 14.1899C18.3764 14.5284 19.3191 14.7632 20.2792 14.8899C20.7649 14.9584 21.2086 15.2031 21.5257 15.5773C21.8428 15.9516 22.0113 16.4294 21.9992 16.9199Z"
                          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
                <span><?php output_phone_number('carbon_phone', false); ?></span></a></div>
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

