<?php
class Usuarios extends Controller{
  public function index()
  {
    print_r($this->model->getUsuario());
  }
  public function validar()
  {
    print_r($_POST);
    die();
  }
}

?>