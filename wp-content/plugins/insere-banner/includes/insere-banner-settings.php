<?php
add_action("admin_menu", "adiciona_menu_banner");
function adiciona_menu_banner()
{
    //add a new menu item. This is a top level menu item i.e., this menu item can have sub menus
    add_menu_page(
        "Banner Home", //Required. Text in browser title bar when the page associated with this menu item is displayed.
        "Banner Home", //Required. Text to be displayed in the menu.
        "manage_options", //Required. The required capability of users to access this menu item.
        "banner-home", //Required. A unique identifier to identify this menu item.
        "pagina_banner_home", //Optional. This callback outputs the content of the page associated with this menu item.
        "", //Optional. The URL to the menu item icon.
        100 //Optional. Position of the menu item in the menu.
    );

}

function pagina_banner_home()
{
    ?>
    <div class="wrap">
        <div id="icon-options-general" class="icon32"></div>
        <form method="post" action="options.php" enctype="multipart/form-data">
            <?php
            do_settings_sections('banner-home');
            settings_fields('banner-home-settings');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}

add_action('admin_init', 'mostra_settings_banner');
function mostra_settings_banner()
{
    add_settings_section(
        'insere-banner-home-secao-1',
        'Banner Home Page',
        null,
        'banner-home'
    );

    add_settings_field(
        'insere-banner-home-texto',
        'Texto para o banner',
        'mostra_conteudo_texto_banner_admin',
        'banner-home',
        'insere-banner-home-secao-1'
    );
    register_setting(
        'banner-home-settings',
        'insere-banner-home-texto'
    );

}

function mostra_conteudo_texto_banner_admin()
{
    $input = get_option('insere-banner-home-texto');
    echo '<input required type="text" id="insere-banner-home-texto" name="insere-banner-home-texto" value="' . $input . '" />';
}

add_action('admin_init', 'mostra_imagem_banner');
function mostra_imagem_banner()
{
    add_settings_field(
        'insere-imagem-banner',
        'Banner',
        'mostra_imagem_banner_admin',
        'banner-home',
        'insere-banner-home-secao-1'
    );
    register_setting(
        'banner-home-settings',
        'insere-imagem-banner',
        'verifica_arquivo_enviado'
    );

}

function mostra_imagem_banner_admin()
{
    echo '<input type="file" id="insere-imagem-banner" name="insere-imagem-banner" required/>';
}

function verifica_arquivo_enviado()
{
    $urls = wp_handle_upload($_FILES["insere-imagem-banner"], array('test_form' => FALSE,
        'mimes' => array('png' => 'image/png', 'jpeg' => 'images/jpeg','jpg'=>'image/jpeg')));
    $temp = $urls["url"];
    error_log("Valor do tmp " . print_r($temp,1));
    return $temp;
}