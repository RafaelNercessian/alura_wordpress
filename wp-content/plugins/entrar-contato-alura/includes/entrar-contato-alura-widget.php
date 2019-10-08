<?php

class Newsletter_Subscriber_Widget extends WP_Widget
{
    /**
     * Sets up the widgets name etc
     */
    public function __construct()
    {
        $widget_ops = array(
            'description' => __('Enviando email contato', 'ns_domain'),
        );
        parent::__construct('newsletter_subscriber_widget', __('Newsletter Subscriber', 'ns_domain'), $widget_ops);
    }

    /**
     * Outputs the content of the widget
     *
     * @param array $args
     * @param array $instance
     */
    public function widget($args, $instance)
    {
        ?>
        <div id="form-msg"></div>
        <br>
        <form class="rodapePrincipal-contatoForm"
              action="<?= plugins_url() . '/entrar-contato-alura/includes/newsletter-subscriber-mailer.php' ?>"
              method="post">
            <fieldset>
                <legend class="rodapePrincipal-contatoForm-legend" for="email-contato">Entre em contato conosco</legend>
                <div class="rodapePrincipal-contatoForm-fieldset">
                    <input class="rodapePrincipal-contatoForm-emailInput" type="email" name="email-contato"
                           id="email-contato">
                    <button class="rodapePrincipal-contatoForm-submit" type="submit">Enviar</button>
                </div>
            </fieldset>
            <input type="hidden" name="titulo" value="<?= $instance['titulo'] ?>">
            <input type="hidden" name="destinatario" value="<?= $instance['destinatario'] ?>">
            <input type="hidden" name="assunto" value="<?= $instance['assunto'] ?>">
        </form>
        <?php
    }

    /**
     * Outputs the options form on admin
     *
     * @param array $instance The widget options
     */
    public function form($instance)
    {
        $titulo = !empty($instance['titulo']) ? esc_attr($instance['titulo']) : __('Contato Alurinha', 'ns_domain');
        $destinatario = $instance['destinatario'];
        $assunto = !empty($instance['assunto']) ? esc_attr($instance['assunto']) : __('Você tem um novo contato na Alurinha', 'ns_domain');
        ?>
        <p>
            <label for="<?= $this->get_field_id('titulo') ?>"><?= _e('Título:'); ?></label><br>
            <input type="text" id="<?= $this->get_field_id('titulo') ?>" name="<?= $this->get_field_name('titulo') ?>"
                   value="<?= $titulo ?>">
        </p>
        <p>
            <label for="<?= $this->get_field_id('destinatario') ?>"><?= _e('Destinatário:'); ?></label><br>
            <input type="text" id="<?= $this->get_field_id('destinatario') ?>"
                   name="<?= $this->get_field_name('destinatario') ?>" value="<?= $destinatario ?>">
        </p>
        <p>
            <label for="<?= $this->get_field_id('assunto') ?>"><?= _e('Assunto:'); ?></label><br>
            <input type="text" id="<?= $this->get_field_id('assunto') ?>" name="<?= $this->get_field_name('assunto') ?>"
                   value="<?= $assunto ?>">
        </p>
        <?php
    }

    /**
     * Processing widget options on save
     *
     * @param array $new_instance The new options
     * @param array $old_instance The previous options
     *
     * @return array
     */
    public function update($new_instance, $old_instance)
    {
        $instance = array(
            'titulo' => !empty($new_instance['titulo']) ? strip_tags($new_instance['titulo']) : '',
            'destinatario' => !empty($new_instance['destinatario']) ? strip_tags($new_instance['destinatario']) : '',
            'assunto' => !empty($new_instance['assunto']) ? strip_tags($new_instance['assunto']) : ''
        );
        return $instance;
    }
}

