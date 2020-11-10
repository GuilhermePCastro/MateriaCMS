<?php
/*
* Plugin Name: CRUDÃO
* Plugin URI: weirdorconfusing.com
* Description: Simplesmente um plugin para crudar
* Version: 0.0.1
* Author: MAaster dois
* Author URI: https://www.instagram.com/eversonzoio/?hl=pt-br
* Lincense: CC BY
*/

if(!defined('WPINC')) exit; //Protege o código de ser chamado diretamente

register_activation_hook(__FILE__,'criar_tabela');

function criar_tabela(){
    
    global $wpdb;

    $wpdb -> query("CREATE TABLE {$wpdb->prefix}agenda
                    (id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
                    nome VARCHAR(100) NOT NULL,
                    whatsapp BIGINT UNSIGNED NOT NULL)");
}
