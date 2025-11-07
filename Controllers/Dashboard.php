<?php
class Dashboard extends Controller{
    public function __construct() {
        session_start();
        parent::__construct();
        
        // Verifica si la sesión está iniciada. Si no lo está, redirige al login.
        // La constante 'base_url' es vital para la redirección.
        if (empty($_SESSION['id_usuario'])) {
            // Asumiendo que el login está en la URL base (index.php)
            header("Location: ".base_url);
            exit;
        }
    }

    /**
     * Carga la vista principal (Dashboard)
     */
    public function index()
    {
        // 1. Cargar la cabecera (header.php)
        // Usamos $this para referirnos al controlador actual (Dashboard)
        // La vista 'header' se buscará probablemente en Views/Templates/header.php
    $this->views->getView($this, "header"); 
// ...
$this->views->getView($this, "footer");
        
        // 3. Cargar el pie de página (footer.php)
        // La vista 'footer' se buscará probablemente en Views/Templates/footer.php
        $this->views->getView($this, "footer"); 
    }

}
?>