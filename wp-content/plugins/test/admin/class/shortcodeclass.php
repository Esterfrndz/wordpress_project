<?php
/*
Plugin Name: Shortcode Nombre Usuario
Description: Un plugin para crear un shortcode que muestra el nombre del usuario actual.
*/

// Función para mostrar el nombre del usuario actual como un shortcode
function mostrar_nombre_usuario_shortcode() {
    // Verificar si hay un usuario conectado
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
add_shortcode('mostrar_nombre_usuario', 'mostrar_nombre_usuario_shortcode');
?>