<?php
//enqueue scripts

function ticketingTheme_script_enqueue()
{

    wp_enqueue_style('customstyle', get_template_directory_uri() . '/custom/custom.css', [], '3.1.1', 'all');
    wp_enqueue_script('customjs', get_template_directory_uri() . '/custom/custom.js', [], '1.0.0', true);
}

add_action('wp_enqueue_scripts', 'ticketingTheme_script_enqueue');
