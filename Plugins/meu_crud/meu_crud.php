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

register_deactivation_hook(__FILE__,'apagar_tabela');

function apagar_tabela(){

    global $wpdb;

    $wpdb -> query("DROP TABLE {$wpdb -> prefix}agenda");
}

add_action('admin_menu', 'coloca_menu');

function coloca_menu(){

    // Primeiro Menu
    add_menu_page('Configurações Plugin', 'Crudão', 'administrator', 'meu-plugin-config', 'abre_config','dashicons-format-chat');

    //Adicionando um submenu
    //add_submenu_page('tools.php','Configurações Plugin', 'Plugin Monstrão', 'administrator', 'meu-plugin-config','abre_config');
}

function abre_config(){

    global $wpdb;

    //exibe form de editar
    if(isset($_GET['editar']) && !isset($_POST['alterar'])){

        //recuperar os dados
        $id = preg_replace('/\D/','', $_GET['editar']);

        $reg = $wpdb -> get_results("SELECT id, nome, whatsapp FROM {$wpdb->prefix}agenda WHERE id = $id");
       
        require 'editar_tpl.php';
        exit();
    }

    if(isset($_POST['alterar'])){
        
        $return = $wpdb -> query($wpdb -> prepare("UPDATE {$wpdb->prefix}agenda SET nome = %s, whatsapp = %d WHERE  id = %d", $_POST['nome'], $_POST['whatsapp'], $_POST['id']));
        if($return )
        {
            $msg = 'Registro alterado com sucesso';
        }else{
            $erro = 'Erro ao tentar alterar';
        }
    }

    if(isset($_GET['apagar'])){
        
        $id = preg_replace('/\D/','',$_GET['apagar']);

        $wpdb -> query("DELETE FROM {$wpdb->prefix}agenda WHERE id = $id");
    }

    if(isset($_POST['submit'])){

        if($_POST['submit'] == 'Gravar'){
            $wpdb -> query(
                $wpdb -> prepare("INSERT INTO {$wpdb->prefix}agenda (nome, whatsapp)
                                            VALUES (%s, %d)", $_POST['nome'], $_POST['whatsapp']));
        }
    }

    $contatos = $wpdb ->get_results("SELECT * FROM {$wpdb->prefix}agenda");
    require 'lista_tpl.php';
}
