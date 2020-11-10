<?php
/*
* Plugin Name: Plugin Hardcore Meu irmão
* Plugin URI: weirdorconfusing.com
* Description: UM PLUGIN HARDCORE MEU IRMÃO, PARA DE RIR ALEK!
* Version: 0.0.1
* Author: Zoio e Alek
* Author URI: https://www.instagram.com/eversonzoio/?hl=pt-br
* Lincense: CC BY
*/

add_filter('login_errors', 'alterar_erro');

function alterar_erro(){
    return 'Credenciais Inválidas';
}

add_action('wp_head', 'coloca_tag_og');

function coloca_tag_og(){
    if(is_single()){
        $dados = get_post(get_the_ID());
        $site = get_bloginfo();
        $titulo = $dados -> post_title;
        $resumo = $dados -> post_excerpt;
        echo "
            <meta property='og:title' content ='" . $titulo . "'>
            <meta property='og:site_name' content ='" .  $site. "'>
            <meta property='og:url' content ='" . get_permalink(). "'>
            <meta property='og:description' content ='" . $resumo . "'>";
    }
}

