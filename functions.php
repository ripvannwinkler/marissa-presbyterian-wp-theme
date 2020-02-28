<?php

function load_stylesheets()
{
    wp_register_style('app-styles', get_template_directory_uri() . '/lib/app.css', array(), false, "all");
    wp_enqueue_style('app-styles');
}

function load_scripts()
{
    wp_register_script("app-script", get_template_directory_uri() . '/lib/app.js', array(), false, true);
    wp_enqueue_script("app-script");
}

add_action("wp_enqueue_scripts", "load_stylesheets");
add_action("wp_enqueue_scripts", "load_scripts");
