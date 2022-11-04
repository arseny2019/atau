<?php

if (!defined('ABSPATH')) exit();

/**
 * Enqueue scripts and styles.
 */
function atau_scripts() {
    wp_enqueue_style( 'atau-style', get_template_directory_uri() . '/assets/main.css', array(), _S_VERSION );
    wp_enqueue_style( 'atau-style-addition', get_template_directory_uri() . '/assets/addition.css', array(), _S_VERSION );

    wp_enqueue_script( 'atau-main', get_template_directory_uri() . '/assets/main.js', array(), _S_VERSION, true );
    wp_enqueue_script( 'atau-addition', get_template_directory_uri() . '/assets/addition.js', array(), _S_VERSION, true );

    wp_localize_script('atau-main', 'additionajax', array(
        'url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('equipment_nonce'),
    ));
}
add_action( 'wp_enqueue_scripts', 'atau_scripts' );
