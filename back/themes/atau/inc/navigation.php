<?php

if (!defined('ABSPATH')) {
    exit;
}

register_nav_menus(array(
    'header_main' => 'Основное меню в шапке',
    'footer_left' => 'Левая колонка меню в футере',
    'footer_right' => 'Правая колонка меню в футере',
    'mobile_main' => 'Основное мобильное меню'
));

//Удаляем шлак <li>
add_filter('wp_nav_menu_items', 'filter_custom_menu_items', 10, 2);
function filter_custom_menu_items($items, $args)
{
    // Удаляем флаг из названия пункта меню logo_yellow/logo_green/logo_blue которые нужны чтобы
    // добавить соответствующие классы для элементов меню
    $regexp = '/(logo_yellow)|(logo_green)|(logo_blue)/U';
    $items = preg_replace($regexp, '', $items);
    // Удаляем <li>
    $regexp = '/(<li.*>)|(<\/li>)/U';
    return preg_replace($regexp, '', $items);
}

//Добавляем классы ссылкам
//add_filter('nav_menu_link_attributes', 'filter_nav_menu_link_attributes', 10, 4);

function filter_nav_menu_link_attributes($atts, $item, $args, $depth)
{
    $regexp = '/(logo_yellow)|(logo_green)|(logo_blue)/U';
    preg_match($regexp, $item->title, $matches);
    $match = $matches[0];
    $full_url = $_SERVER['REQUEST_SCHEME'] . '://' .  $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

//    echo '<br><pre>';
//    var_dump(strpos($full_url, $item->url));
//    print_r($item);
//    echo '</pre>';

    switch ($args->menu_id) {

        case 'service_menu_footer':
        case 'main_menu_footer':
            $atts['class'] .= 'footer__link';
            break;

        case 'main_menu_header':
            $atts['class'] .= $match ?
                'header__menu-item blue-text-hover header__menu-item_logo header__menu-item_' . str_replace('_', '-', $match)
                : 'header__menu-item blue-text-hover';
            if (strpos($full_url, $item->url) !== false) {
                $atts['class'] .= ' active-link';
            }
            break;

        case 'main_menu_mobile':
            $atts['class'] .= $match ?
                'sidebar__menu-item blue-text-hover sidebar__menu-item_logo sidebar__menu-item_' . str_replace('_', '-', $match)
                : 'sidebar__menu-item blue-text-hover';
            if (strpos($full_url, $item->url) !== false) {
                $atts['class'] .= ' active-link';
            }
            break;

        case 'footer_left':
        case 'footer_right':
            $atts['class'] .= $match ?
                'footer__menu-item footer__menu-item_logo footer__menu-item_' . str_replace('_', '-', $match)
                : 'footer__menu-item';
            break;
    }

    return $atts;
}


function output_header_main_menu()
{
    $args = array(
        'theme_location' => 'header_main',
        'menu' => '',
        'container' => '',
        'container_class' => '',
        'container_id' => '',
        'menu_class' => '',
        'menu_id' => 'main_menu_header',
        'echo' => true,
        'fallback_cb' => '',
        'before' => '',
        'after' => '',
        'link_before' => '',
        'link_after' => '',
        'items_wrap' => '%3$s',
        'depth' => 0,
        'walker' => '',
    );

    wp_nav_menu($args);
}

function output_mobile_menu()
{
    $args = array(
        'theme_location' => 'mobile_main',
        'menu' => '',
        'container' => '',
        'container_class' => '',
        'container_id' => '',
        'menu_class' => '',
        'menu_id' => 'main_menu_mobile',
        'echo' => true,
        'fallback_cb' => '',
        'before' => '',
        'after' => '',
        'link_before' => '',
        'link_after' => '',
        'items_wrap' => '%3$s',
        'depth' => 0,
        'walker' => '',
    );

    wp_nav_menu($args);
}

function output_footer_left_menu()
{
    $args = array(
        'theme_location' => 'footer_left',
        'menu' => '',
        'container' => '',
        'container_class' => '',
        'container_id' => '',
        'menu_class' => '',
        'menu_id' => 'footer_left',
        'echo' => true,
        'fallback_cb' => '',
        'before' => '',
        'after' => '',
        'link_before' => '',
        'link_after' => '',
        'items_wrap' => '%3$s',
        'depth' => 0,
        'walker' => '',
    );

    wp_nav_menu($args);
}

function output_footer_right_menu()
{
    $args = array(
        'theme_location' => 'footer_right',
        'menu' => '',
        'container' => '',
        'container_class' => '',
        'container_id' => '',
        'menu_class' => '',
        'menu_id' => 'footer_right',
        'echo' => true,
        'fallback_cb' => '',
        'before' => '',
        'after' => '',
        'link_before' => '',
        'link_after' => '',
        'items_wrap' => '%3$s',
        'depth' => 0,
        'walker' => '',
    );

    wp_nav_menu($args);
}
