<?php

// Tilføj tema funktioner
function massage_theme_setup()
{

    // Tilføj mulighed for at ændre <title> i head automatisk
    add_theme_support('title-tag');

    // Tilføj menu-styring fra WordPress backend
    add_theme_support('menus');

    register_nav_menus(array(
        "primary" => "Primary Menu",
        "footer"  => "Footer Menu"
    ));
}
add_action('after_setup_theme', 'massage_theme_setup');

function my_theme_enqueue_styles()
{
    wp_enqueue_style('dashicons');
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles');



// Indlæs styles og scripts
function massage_theme_enqueue_scripts()
{

    // Hoved stylesheet
    wp_enqueue_style('massage-theme-style', get_stylesheet_uri());

    // Hvis du vil tilføje JavaScript kan du gøre det sådan her:
    // wp_enqueue_script( 'massage-theme-script', get_template_directory_uri() . '/js/script.js', array(), false, true );
}
add_action('wp_enqueue_scripts', 'massage_theme_enqueue_scripts');

function opret_behandlingsformer_posttype()
{
    register_post_type('behandlingsformer', array(
        'labels' => array(
            'name' => 'Behandlingsformer',
            'singular_name' => 'Behandlingsform'
        ),
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-format-image', // Find ikon i backend
        'supports' => array('title', 'editor', 'thumbnail'), // 'text' findes ikke - brug 'editor'
        'rewrite' => array('slug' => 'behandlingsformer'), // Flot URL
    ));
}

add_action('init', 'opret_behandlingsformer_posttype');
function massage_theme_add_custom_fields()
{
    add_post_type_support('behandlingsformer', 'custom-fields');
}
add_action('init', 'massage_theme_add_custom_fields');

function enqueue_material_icons()
{
    wp_enqueue_style('mdi-icons', 'https://cdn.materialdesignicons.com/7.2.96/css/materialdesignicons.min.css');
}
add_action('wp_enqueue_scripts', 'enqueue_material_icons');

function opret_pris_post_type()
{
    register_post_type('pris', array(
        'labels' => array(
            'name' => 'Priser',
            'singular_name' => 'Pris',
        ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'priser'),
        'supports' => array('title', 'editor', 'thumbnail'),
        'menu_icon' => 'dashicons-money-alt',
    ));
}
add_action('init', 'opret_pris_post_type');


function opret_pris_post_type1()
{
    register_post_type('pris', array(
        'labels' => array(
            'name' => __('Priser'),
            'singular_name' => __('Pris')
        ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'priser'),
        'supports' => array('title', 'editor'),
        'menu_icon' => 'dashicons-money-alt',
        'show_in_rest' => true,
    ));
}
add_action('init', 'opret_pris_post_type');
