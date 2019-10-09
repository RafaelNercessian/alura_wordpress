<?php

function myCatWidget()
{
    register_widget('my_custom_cat_widget');
}

add_action('widgets_init', 'myCatWidget');

class my_custom_cat_widget extends WP_Widget
{

    function __construct()
    {
        parent::__construct('patrocinadores_palestras', __('Patrocinadores Palestras', 'wpb_widget_domain'),
            array('description' => __('Selecione os patrocinadores da palestra', 'wpb_widget_domain'),)
        );
    }

    public function form($instance)
    {
        $caelum = $instance['caelum'];
        $casa_do_codigo = $instance['casa_do_codigo'];
        ?>

        <p>
            <input type="checkbox" id="<?php echo $this->get_field_id('caelum'); ?>"
                   name="<?php echo $this->get_field_name('caelum'); ?>"
                   value="1" <?php checked("1", esc_attr($caelum)) ?>/>
            <label for="<?php echo $this->get_field_id('caelum'); ?>">Caelum</label>


        </p>
        <p>
            <input type="checkbox" id="<?php echo $this->get_field_id('casa_do_codigo'); ?>"
                   name="<?php echo $this->get_field_name('casa_do_codigo'); ?>"
                   value="1" <?php checked("1", esc_attr($casa_do_codigo)) ?>/>
            <label for="<?php echo $this->get_field_id('caelum'); ?>">Casa do Código</label>

        </p>
        <?php

    }

    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['caelum'] = !empty($new_instance['caelum']) ? strip_tags($new_instance['caelum']) : '';
        $instance['casa_do_codigo'] = !empty($new_instance['casa_do_codigo']) ? strip_tags($new_instance['casa_do_codigo']) : '';
        return $instance;
    }

    public function widget($args, $instance)
    {
        ?>
        <ul>
            <?php
            if (!empty($instance['caelum'])): ?>
                <li><img src="<?= plugin_dir_url(__FILE__) . '../images/caelum.svg'; ?>"</li>
            <?php endif; ?>
            <?php
            if (!empty($instance['casa_do_codigo'])): ?>
                <li><img src="<?= plugin_dir_url(__FILE__) . '../images/cdc.svg'; ?>"</li>
            <?php endif; ?>
            <?php
            if (!empty($instance['hipsters'])): ?>
                <li><img src="<?= plugin_dir_url(__FILE__) . '../images/hipsters.svg'; ?>"</li>
            <?php endif; ?>

        </ul>
        <?php
    }
}