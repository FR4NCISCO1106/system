<?php
class UsuariosModel extends Query{
  public function __construct()
  {
    parent::__construct();
  }
  
  public function getUsuario(string $usuario, string $clave)
  {
    // SEGURIDAD: Usamos '?' para los valores, en lugar de concatenar
    $sql = "SELECT * FROM usuarios WHERE usuario = ? AND clave = ?"; 
    
    // Pasamos los valores de forma segura al método select
    $data = $this->select($sql, [$usuario, $clave]); 
    return $data;
  }
}
?>