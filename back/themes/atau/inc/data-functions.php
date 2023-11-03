<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

//Вывод номера телефона
function output_phone_number($name, $attr)
{
    $buffer = carbon_get_theme_option($name);

    if ($attr) {
        $buffer = filter_phone_number($buffer);
    }

    echo $buffer;
}

function filter_phone_number($str)
{
    $regexp = '/[ ()-]/U';
    $str = preg_replace($regexp, '', $str);
    return $str;
}

//выводим 6 цифр и добавляем тире
function slice_to_6_numbers($str)
{
    return substr($str, -6, 3) . '-' . substr($str, -3, 3);
}

//Почта
function output_email()
{
    echo carbon_get_theme_option('carbon_email');
}

//socials
function output_inst()
{
    echo carbon_get_theme_option('carbon_inst');
}

function output_vk()
{
    echo carbon_get_theme_option('carbon_vk');
}

function output_rutube()
{
    echo carbon_get_theme_option('carbon_rutube');
}

//Адрес
function output_address()
{
    echo carbon_get_theme_option('carbon_address');
}

//Карта
function output_map_code()
{
    echo carbon_get_theme_option('carbon_map');
}

//Вывод даты в формате день.месяц
function output_date($str)
{
    $date = new DateTime($str);
    return $date->format('d.m');
}

//Вывод числа в формате млн
function output_price_in_millions($number)
{
    $millions = $number / 1000000;
    $millions = str_replace('.', ',', (string)$millions);
    return $millions;
}

//Вывод строки с числом с тысячными разделителями
function output_number_with_separator($number)
{
    return number_format($number, 0, '', ' ');
}

