<?php
/*
* Plugin Name: Plugin com Menu
* Plugin URI: weirdorconfusing.com
* Description: Simplesmente um olugin que vai adicionar uma opção no menu
* Version: 0.0.1
* Author: Eu mesmo
* Author URI: https://www.instagram.com/eversonzoio/?hl=pt-br
* Lincense: CC BY
*/


add_action('admin_menu', 'coloca_menu');

function coloca_menu(){

    // Primeiro Menu
    //add_menu_page('Configurações Plugin', 'Menu', 'administrator', 'meu-plugin-config', 'abre_config','dashicons-format-chat');

    //Adicionando um submenu
    add_submenu_page('tools.php','Configurações Plugin', 'Plugin Monstrão', 'administrator', 'meu-plugin-config','abre_config');
}

function abre_config(){
    require 'plugin_menu_tpl.php';
}