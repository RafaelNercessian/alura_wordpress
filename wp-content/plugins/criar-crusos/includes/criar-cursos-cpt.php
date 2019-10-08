<?php
function criar_cursos_cpt()
{
    $labels = array(
        'name' => __('Cursos'),
        'singular_name' => __('Curso'),
        'add_new' => 'Add New',
        'add_new_item' => 'Add New ' . __('Curso'),
        'edit' => 'Edit',
        'edit_item' => 'Edit ' . __('Curso'),
        'new_item' => 'New ' . __('Curso'),
        'view' => 'View',
        'view_item' => 'View ' . __('Curso'),
        'search_items' => 'Search ' . __('Cursos'),
        'not_found' => 'No ' . __('Cursos') . ' Found',
        'not_found_in_trash' => 'No ' . __('Cursos') . ' Found',
        'menu_name' => __('Cursos')
    );
    $args = apply_filters('criar_cursos_args', array(
            'labels' => $labels,
            'description' => 'Videos by category',
            'taxonomies' => array('category'),
            'public' => true,
            'show_in_menu' => true,
            'menu_position' => 5,
            'menu_icon' => 'dashicons-video-alt',
            'show_in_nav_menus' => true,
            'capability_type' => 'post',
            'supports' => array('title','thumbnail'),
        )
    );
    register_post_type('cursos',$args);
}

add_action('init', 'criar_cursos_cpt');