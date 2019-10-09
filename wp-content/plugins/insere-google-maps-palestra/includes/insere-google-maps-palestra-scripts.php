<?php

add_action('wp_enqueue_scripts', 'insere_google_maps_palestra_css_scripts');

function insere_google_maps_palestra_css_scripts()
{
    wp_enqueue_style('custom_css_google_maps', plugins_url() . '/insere-google-maps-palestra/css/google_maps_style.css');
    wp_enqueue_script('jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/1.8.3/jquery.min.js', array(), false, true);
    wp_enqueue_script('countdown', plugins_url() . '/insere-google-maps-palestra/js/jquery.countdown.min.js', array(), false, true);

    //passando data do evento
    wp_register_script( 'calcula-data-evento', plugins_url() . '/insere-google-maps-palestra/js/calculate_countdown.js', array(), false, true );
    $data = get_option('insere-local-palestra-data');
    wp_localize_script( 'calcula-data-evento', 'data', $data );
    wp_enqueue_script( 'calcula-data-evento' );
}