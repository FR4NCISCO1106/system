<?php

// Asegúrate de incluir los archivos necesarios (ej. require_once 'Controller.php';)
// Asumimos que esta clase extiende la clase base Controller
class Usuarios extends Controller { 

    // Aquí iría el método constructor si fuera necesario
    // public function __construct() {
    //     parent::__construct();
    // }

    public function validar()
    {
        // *** CORRECCIÓN CRÍTICA: 1. Iniciar la Sesión ***
        // Esto debe ir al principio antes de cualquier salida de texto o uso de $_SESSION.
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        
        // *** Máxima limpieza de output buffer ***
        // 2. Limpia cualquier output buffer (salida accidental)
        if (ob_get_level()) {
            ob_clean();
        }
        // 3. Especifica que la respuesta es JSON
        header('Content-Type: application/json');
        // ***************************************

        // Desactivar reportes de error para evitar que se impriman en la respuesta (opcional en producción)
        error_reporting(0);
        ini_set('display_errors', 0);
        
        $msg = [];
        
        if (empty($_POST['usuario']) || empty($_POST['clave'])) {
            $msg = array('msg' => "Los campos estan vacios", 'estado' => 'warning');
        } else {
            $usuario = $_POST['usuario'];
            $clave = $_POST['clave'];
            
            // Asumiendo que $this->model->getUsuario() devuelve los datos o false/null
            $data = $this->model->getUsuario($usuario, $clave); 
            
            if ($data) {
                // Establecer Sesiones
                session_regenerate_id(true); // Recomendado por seguridad
                $_SESSION['id_usuario'] = $data['id'];
                $_SESSION['usuario'] = $data['usuario'];
                $_SESSION['nombre'] = $data['nombre'];
                $_SESSION['id_rol'] = $data['id_rol']; 
                
                $info_usuario = ['id' => $data['id'], 'usuario' => $data['usuario'], 'nombre' => $data['nombre'], 'id_rol' => $data['id_rol']];
                $msg = array('msg' => "ok", 'estado' => 'success', 'datos' => $info_usuario); 
            } else {
                $msg = array('msg' => "Usuario o contraseña incorrecta", 'estado' => 'error');
            }
        }
        
        // Punto único de salida para la respuesta JSON
        echo json_encode($msg);
        die(); // Detiene completamente la ejecución
    }
}
?>