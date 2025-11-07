<?php
class Query extends Conexion{
  private $pdo, $con, $sql;
  public function __construct(){
    $this->pdo = new Conexion();
    $this->con = $this->pdo->conect();
  }
  
  // CORRECCIÓN SEGURIDAD: Modificado para aceptar y vincular $parametros
  public function select(string $sql, array $parametros = []) 
  {
    $this->sql = $sql;
    $resul = $this->con->prepare($this->sql);
    
    // Vincular parámetros de forma segura
    if (!empty($parametros)) {
        for ($i = 0; $i < count($parametros); $i++) {
            $resul->bindValue($i + 1, $parametros[$i]);
        }
    }
    
    $resul->execute();
    $data = $resul->fetch(PDO::FETCH_ASSOC);
    return $data;
  }
}
?>