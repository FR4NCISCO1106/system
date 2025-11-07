<?php
class Home extends Controller {
    public function index() {
        // Asumiendo que Views/index.php es tu login
        $this->views->getView($this, "index"); 
    }
}
?>