<?php
/**
 * Plugin Name: Test
 * Description: Plugin test
 * Plugin URI: 
 * Author: ester
 * Version: 0.0.1
 */


//ruta absoluta de al directorio de instalación de wordpress
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

function Activar()
{
    // Activar db
    global $wpdb;

    // Sentencia SQL usuarios
    $sql = "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}usuarios (
        `UsuarioId` INT NOT NULL AUTO_INCREMENT,
        `Nombre` VARCHAR(45) NULL,
        `ShortCode` VARCHAR(45) NULL,
        PRIMARY KEY (`UsuarioId`)
    )";

    // Sentencia SQL ranks
    $sql = "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}ranks (
        `RanksId` INT NOT NULL AUTO_INCREMENT,
        `TipoRango` VARCHAR(30) NULL,
        `Logo` BLOB ,
        `Requisito` INT ,
        PRIMARY KEY (`RanksId`)
    )";





    //Ejecutar
    $wpdb->query($sql);
    
}


function Desactivar()
{
flush_rewrite_rules();

}



//registros

register_activation_hook(__FILE__, 'Activar');
register_deactivation_hook(__FILE__, 'Desactivar');
// No hay función 'Borrar'

add_action('admin_menu', 'CrearMenu');
//función Wordpress
function CrearMenu()
{
    add_menu_page(
        'TEST',
        'TEST',
        'manage_options',
        plugin_dir_path(__FILE__) . 'admin/usuarios.php',
        null,
        plugin_dir_url(__FILE__) . 'admin/img/moneda-dolar.png',
        1
    );

    // Agregar submenú
    add_submenu_page(
        plugin_dir_path(__FILE__) . 'admin/usuarios.php', // Slug del menú padre
        'Ranks', // Título de la página
        'Ranks', // Título del submenú
        'manage_options', // Capacidad requerida para acceder al submenú
        'test-configuracion', // Slug del submenú
        'admin/ranks.php' // Función que mostrará el contenido del submenú
    );
}

function MostrarContenido()
{
    echo "<h1> Contenido de la página principal </h1>";
}

function MostrarConfiguracion()
{
    echo "<h1> Configuración del plugin </h1>";
}

function EncolarBootstrapJS($hook)
{
    if ($hook != "test/admin/usuarios.php" && $hook != "test/admin/test-configuracion") {
        return;
    }
    wp_enqueue_script('bootstrapJs', plugins_url('admin/bootstrap/js/bootstrap.min.js', __FILE__), array('jquery'));
}
add_action('admin_enqueue_scripts', 'EncolarBootstrapJS');

function EncolarBootstrapCSS($hook)
{
    if ($hook != "test/admin/usuarios.php" && $hook != "test/admin/test-configuracion") {
        return;
    }
    wp_enqueue_style('bootstrapCSS', plugins_url('admin/bootstrap/css/bootstrap.min.css', __FILE__));
}
add_action('admin_enqueue_scripts', 'EncolarBootstrapCSS');

function EncolarJS($hook)
{
    if ($hook != "test/admin/usuarios.php" && $hook != "test/admin/test-configuracion") {
        return;
    }
    wp_enqueue_script('JsExterno', plugins_url('admin/js/usuarios.js', __FILE__), array('jquery'));
    wp_localize_script('JsExterno', 'SolicitudesAjax', [
        'url' => admin_url('admin-ajax.php'),
        'seguridad' => wp_create_nonce('seg')
    ]);
}
add_action('admin_enqueue_scripts', 'EncolarJS');


function mostrar_nombre_usuario_shortcode() {
    // Verificar
    if (is_user_logged_in()) {
        // Obtener el objeto de usuario actual
        $usuario_actual = wp_get_current_user();
        
        // Retorna el nombre de usuario del usuario actual
        return $usuario_actual->display_name;
    } else {
        // Si no hay un usuario conectado, mostrar un mensaje de invitado
        return "Invitado";
    }
}

// Registrar el shortcode para mostrar el nombre del usuario
add_shortcode('user', 'mostrar_nombre_usuario_shortcode');



