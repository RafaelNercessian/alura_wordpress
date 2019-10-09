<?php
add_action('wp_enqueue_scripts', 'insere_banner_scripts');
function insere_banner_scripts()
{
    wp_enqueue_style('estilos-banner',plugins_url() . '/insere-banner/css/insere-banner-estilos.css');
    wp_enqueue_script('jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/1.8.3/jquery.min.js', array(), false, true);
    wp_enqueue_script('script-parallax', plugins_url() . '/insere-banner/js/parallax.min.js', array(), false, true);
}