<?php
/*
Plugin Name: Assinante Newsletter
Plugin URI: https://www.alura.com.br
Description: Widget para mostrar assinante newsletter
Version: 1.0.0
Author: Rafael Silva Nercessian
License: GPLv2 or later
*/

require_once plugin_dir_path(__FILE__).'/includes/entrar-contato-alura-widget.php';

add_action( 'widgets_init', 'register_newsletter_subscriber' );
function register_newsletter_subscriber() {
    register_widget( 'Newsletter_Subscriber_Widget' );
}
