<?php

/**
 * Enqueue custom stylesheets
 */
function load_stylesheets()
{
    $template_dir = get_template_directory_uri();
    wp_register_style('app-styles', $template_dir . '/lib/app.css', array(), false, "all");
    wp_enqueue_style('app-styles');
}

add_action("wp_enqueue_scripts", "load_stylesheets");

/**
 * Enqueue custom javascript files
 */
function load_scripts()
{
    $template_dir = get_template_directory_uri();
    wp_register_script("app-script", $template_dir . '/lib/app.js', array(), false, true);
    wp_enqueue_script("app-script");
}

add_action("wp_enqueue_scripts", "load_scripts");
