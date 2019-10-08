<?php
add_action("admin_menu", "adiciona_menu_local_palestra");
function adiciona_menu_local_palestra()
{
    //add a new menu item. This is a top level menu item i.e., this menu item can have sub menus
    add_menu_page(
        "Local Palestra", //Required. Text in browser title bar when the page associated with this menu item is displayed.
        "Local Palestra", //Required. Text to be displayed in the menu.
        "manage_options", //Required. The required capability of users to access this menu item.
        "local-palestra", //Required. A unique identifier to identify this menu item.
        "pagina_local_palestra", //Optional. This callback outputs the content of the page associated with this menu item.
        "", //Optional. The URL to the menu item icon.
        100 //Optional. Position of the menu item in the menu.
    );

}

function pagina_local_palestra()
{
    ?>
    <div class="wrap">
        <div id="icon-options-general" class="icon32"></div>
        <h1>Local Palestras</h1>
        <form method="post" action="options.php">
            <?php
                do_settings_sections( 'local-palestra' );
                settings_fields('local-palestra-settings');
                submit_button();
            ?>
        </form>
    </div>
    <?php
}

add_action('admin_init', 'mostra_endereco_palestra');
function mostra_endereco_palestra(){
    add_settings_section(
        'insere-local-palestra-secao-1',
        'Configurações local palestra',
        null,
        'local-palestra'
    );

    add_settings_field(
        'insere-local-palestra-endereco',
        'Endereço',
        'mostra_conteudo_endereco_pagina_admin',
        'local-palestra',
        'insere-local-palestra-secao-1'
    );
    register_setting(
        'local-palestra-settings',
        'insere-local-palestra-endereco'
    );

}

function mostra_conteudo_endereco_pagina_admin(){
    $input = get_option( 'insere-local-palestra-endereco' );
    echo '<input type="text" id="insere-local-palestra-endereco" name="insere-local-palestra-endereco" value="' . $input . '" />';
}

add_action('admin_init', 'mostra_cidade_palestra');
function mostra_cidade_palestra(){
    add_settings_field(
        'insere-local-palestra-cidade',
        'Cidade',
        'mostra_conteudo_cidade_pagina_admin',
        'local-palestra',
        'insere-local-palestra-secao-1'
    );
    register_setting(
        'local-palestra-settings',
        'insere-local-palestra-cidade'
    );

}

function mostra_conteudo_cidade_pagina_admin(){
    $input = get_option( 'insere-local-palestra-cidade' );
    echo '<input type="text" id="insere-local-palestra-cidade" name="insere-local-palestra-cidade" value="' . $input . '" />';
}

add_action('admin_init', 'insere_google_maps_datepicker');
function insere_google_maps_datepicker(){
    add_settings_field(
        'insere-local-palestra-data',
        'Data',
        'mostra_conteudo_data_pagina_admin',
        'local-palestra',
        'insere-local-palestra-secao-1'
    );
    register_setting(
        'local-palestra-settings',
        'insere-local-palestra-data'
    );
}

function mostra_conteudo_data_pagina_admin(){
    $input = get_option( 'insere-local-palestra-cidade' );
    echo '<input type="date" id="insere-local-palestra-data" name="insere-local-palestra-data[datepicker]" value="" class="example-datepicker" />';
}

add_action( 'admin_enqueue_scripts', 'enqueue_date_picker' );
function enqueue_date_picker(){
    wp_enqueue_script(
        'field-date-js',
        'Field_Date.js',
        array('jquery', 'jquery-ui-core', 'jquery-ui-datepicker'),
        time(),
        true
    );

    wp_enqueue_style( 'jquery-ui-datepicker' );
}