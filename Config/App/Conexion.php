<?php
class Conexion{
  private $conect;
  public function __construct()
  {
    // CORRECCIÓN: Se añade el punto ( . ) antes de la constante 'charset'
    $pdo = "mysql:host=".host.";dbname=".db.";".charset;
    try {
      $this->conect = new PDO($pdo, user, pass);
      $this->conect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      echo "Error en la conexion".$e->getMessage();
    }
  }
  public function conect()
  {
    return $this->conect;
  }
}
?>