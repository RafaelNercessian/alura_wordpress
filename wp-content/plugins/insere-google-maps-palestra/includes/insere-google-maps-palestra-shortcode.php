<?php

function insere_google_maps_com_local($atts, $content = null)
{

    $endereco = urlencode((get_option('insere-local-palestra-endereco')));
    $cidade = urlencode((get_option('insere-local-palestra-cidade')));
    return '<div class="mapouter">
                 <div class="gmap_canvas">
                    <iframe width="100%" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=' . $endereco . $cidade . '&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                 </div>
             </div>
             <h2 class="proximo-evento">Próximo evento</h2>
             <div id="evento">
                <div id="dias"></div>
                <div id="horas"></div>
                <div id="minutos"></div>
                <div id="segundos"></div>
             </div>';

}

add_shortcode('insere_google_maps_com_local', 'insere_google_maps_com_local');