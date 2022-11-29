<?php

if (!defined('ABSPATH')) {
    exit;
}

add_action('redirect_action', 'redirect_from_detail', 2);

function redirect_from_detail()
{
    if (is_singular(['partner', 'project', 'feedback'])) {
        header('Location: https://' . $_SERVER['HTTP_HOST']);
    }
}

