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