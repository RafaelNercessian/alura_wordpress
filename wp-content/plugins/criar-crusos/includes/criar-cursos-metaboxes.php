<?php

function criar_cursos_metabox()
{
    add_meta_box(
        'criar_cursos_metabox',
        __('Campos cursos'),
        'criar_cursos_metabox_callback',
        'cursos',
        'normal',
        'default'
    );
}

add_action('add_meta_boxes', 'criar_cursos_metabox');

function criar_cursos_metabox_callback($post)
{
    wp_nonce_field(basename(__FILE__), 'criar_cursos_nonce');
    $criar_curso_meta = get_post_meta($post->ID);
    ?>
    <div class="wrap video-form">
        <div class="form-group">
            <h2 for="video_url"><?= esc_html_e('Video URL', 'criar_cursos_dominio') ?></h2>
            <input type="text" name="video_url" id="video_url"
                   value="<?php if (!empty($criar_curso_meta['video_url'])) echo $criar_curso_meta['video_url'][0] ?>">
        </div>
        <br><br>
        <div class="form-group">
            <h2 for="details"><?= esc_html_e('Faça esse curso e', 'criar_cursos_dominio') ?></h2>
            <?php
            $content = get_post_meta($post->ID, 'details', true);
            $editor = 'details';
            $settings = array(
                'textarea_rows' => 5,
                'media_buttons' => false
            );
            wp_editor($content, $editor, $settings);
            ?>
        </div>
        <br>
        <br>
        <div class="form-group">
            <h2 for="details"><?= esc_html_e('Conteúdo detalhado', 'criar_cursos_dominio') ?></h2>
            <?php
            $content = get_post_meta($post->ID, 'conteudo_detalhado', true);
            $editor = 'conteudo_detalhado';
            $settings = array(
                'textarea_rows' => 5,
                'media_buttons' => false
            );
            wp_editor($content, $editor, $settings);
            ?>
        </div>
    </div>
    <?php
}

function criar_cursos_tags_html()
{
    return array(
        'ul' => array(),
        'li' => array(
            'class'
        ),
        'ol' => array(
            'class'
        ),
        'h3' => array(
            'class'
        ),
    );
}

function yvg_video_save($post_id)
{
    $is_autosave = wp_is_post_autosave($post_id);
    $is_revision = wp_is_post_revision($post_id);
    $is_valid_nonce = (isset($_POST['criar_cursos_nonce']) &&
        wp_verify_nonce($_POST['criar_cursos_nonce'], basename(__FILE__))) ?
        'true' : 'false';
    if ($is_autosave || $is_revision || !$is_valid_nonce) {
        return;
    }
    if (isset($_POST['video_url'])) {
        update_post_meta($post_id, 'video_url', sanitize_text_field($_POST['video_url']));
    }
    if (isset($_POST['details'])) {
        update_post_meta($post_id, 'details', wp_kses($_POST['details'], criar_cursos_tags_html()));
    }

    if (isset($_POST['conteudo_detalhado'])) {
        update_post_meta($post_id, 'conteudo_detalhado', wp_kses($_POST['conteudo_detalhado'], criar_cursos_tags_html()));
    }
}

add_action('save_post', 'yvg_video_save');