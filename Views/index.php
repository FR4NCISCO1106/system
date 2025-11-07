<!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url;?>Assets/css/stylee.css">
    <title>Iniciar sesión</title>
  </head>
  <body>
  <div class="container">
        <h1>Iniciar sesión</h1>
        <div id="alertaLogin">
        <form id="frmLogin">
            <div class="input-field">
                <label for="usuario">Usuario</label>
                <input type="text" id="usuario" name = "usuario" required>
            </div>
            <div class="input-field">
                <label for="clave">Contraseña</label>
                <input type="password" id="clave" name = "clave" required>
            </div>
            <button class="btn" type="submit" onclick="frmLogin(event);">Login</button>
        </form>
    </div>
            <script src="<?php echo base_url; ?>Assets/js/scripts.js"></script>
            <script>
              const base_url = "<?php echo base_url; ?>";
            </script>
            <script src="<?php echo base_url; ?>Assets/js/funciones.js"></script>
    <script>
    const container = document.querySelector('.container');

window.onload = () => {
    container.style.opacity = '1';
}
</script>
</div>
  </body>
</html>