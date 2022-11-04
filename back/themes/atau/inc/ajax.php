<?php

if (!defined('ABSPATH')) {
    exit; //exit if accesed directly
}

add_action('wp_ajax_nopriv_load_equipment', 'load_equipment');
add_action('wp_ajax_load_equipment', 'load_equipment');

function load_equipment()
{

    if (!wp_verify_nonce($_POST['nonce'], 'equipment_nonce')) {
        wp_die('data hacked!');
    }

    $offset = json_decode(stripslashes($_POST['offset']));

    $query = new WP_Query(
        array(
            'status' => 'publish',
            $_POST['taxonomy'] => $_POST['term'],
            'posts_per_page' => 6,
            'paged' => $offset + 1,
            'orderby' => 'menu_order',
            'order' => 'ASC'
        )
    );

    $posts = [];
//
    foreach ($query->posts as $post) {
        $formatted_post['post_thumbnail'] = get_the_post_thumbnail_url($post->ID, 'full');
        $formatted_post['post_title'] = $post->post_title;
        $formatted_post['post_content'] = $post->post_excerpt;
        $formatted_post['guid'] = html_entity_decode($post->guid);
        array_push($posts, $formatted_post);
    }

    $response['hasMore'] = $query->max_num_pages > $offset + 1;
    $response['posts'] = $posts;
    $response['newOffset'] = $offset + 1;

    wp_send_json($response);
    wp_die();
}

add_action('wp_ajax_nopriv_load_blog', 'load_blog');
add_action('wp_ajax_load_blog', 'load_blog');

function load_blog()
{

    if (!wp_verify_nonce($_POST['nonce'], 'equipment_nonce')) {
        wp_die('data hacked!');
    }

    $offset = json_decode(stripslashes($_POST['offset']));

    $query = new WP_Query(
        array(
            'status' => 'publish',
            'post_type' => 'blog',
            'posts_per_page' => 9,
            'paged' => $offset + 1,
            'orderby' => 'menu_order',
            'order' => 'ASC'
        )
    );

    $posts = [];

    foreach ($query->posts as $post) {
        $formatted_post['post_thumbnail'] = get_the_post_thumbnail_url($post->ID, 'full');
        $formatted_post['post_title'] = $post->post_title;
        $formatted_post['post_content'] = $post->post_excerpt;
        $formatted_post['guid'] = html_entity_decode($post->guid);
        array_push($posts, $formatted_post);
    }

    $response['hasMore'] = $query->max_num_pages > $offset + 1;
    $response['posts'] = $posts;
    $response['newOffset'] = $offset + 1;

    wp_send_json($response);
    wp_die();
}

add_action('wp_ajax_nopriv_load_projects', 'load_projects');
add_action('wp_ajax_load_projects', 'load_projects');

function load_projects()
{

    if (!wp_verify_nonce($_POST['nonce'], 'equipment_nonce')) {
        wp_die('data hacked!');
    }

    $offset = json_decode(stripslashes($_POST['offset']));

    $query = new WP_Query(
        array(
            'status' => 'publish',
            'post_type' => 'project',
            'posts_per_page' => 6,
            'paged' => $offset + 1,
            'orderby' => 'menu_order',
            'order' => 'ASC'
        )
    );

    $posts = [];

    function get_image_url($image_id)
    {
        return html_entity_decode(wp_get_attachment_image_url($image_id, 'full'));
    }

//
    foreach ($query->posts as $post) {
        $formatted_post['slides'] = array_map('get_image_url', carbon_get_post_meta($post->ID, 'slider'));
        $formatted_post['post_title'] = $post->post_title;
        $formatted_post['post_content'] = $post->post_content;
        $formatted_post['date'] = carbon_get_post_meta($post->ID, 'date');
        array_push($posts, $formatted_post);
    }

    $response['hasMore'] = $query->max_num_pages > $offset + 1;
    $response['posts'] = $posts;
    $response['newOffset'] = $offset + 1;

    wp_send_json($response);
    wp_die();
}
