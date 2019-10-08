<?php

add_action('wp_enqueue_scripts', 'insere_google_maps_palestra_css_scripts');

function insere_google_maps_palestra_css_scripts()
{
    wp_enqueue_style('custom_css_google_maps',plugins_url() . '/insere-google-maps-palestra/css/google_maps_style.css');
}