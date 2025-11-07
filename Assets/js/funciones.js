function frmLogin(e) {
  e.preventDefault();
  const usuario = document.getElementById("usuario");
  const clave = document.getElementById("clave");
  // Obtener el elemento para mostrar mensajes de error
  const mensajeError = document.getElementById("alertaLogin"); 
  let isValid = true; 

  // Limpiar mensajes y clases de error previos
  usuario.classList.remove("is-invalid");
  clave.classList.remove("is-invalid");
  mensajeError.innerHTML = '';
  mensajeError.classList.add('d-none');

  if (usuario.value.trim() === "") {
    usuario.classList.add("is-invalid");
    usuario.focus(); 
    isValid = false;
  }

  if (clave.value === "") {
    clave.classList.add("is-invalid");
    if (isValid) {
        clave.focus(); 
    }
    isValid = false;
  }

  // Ejecutar AJAX solo si es válido
  if (isValid) {
      const url = base_url + "Usuarios/validar";
      const frm = document.getElementById("frmLogin");
      const http = new XMLHttpRequest();
      http.open("POST", url, true);
      http.send(new FormData(frm));
      
      http.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          try {
            // CRÍTICO: Parsear la respuesta JSON
            const res = JSON.parse(this.responseText);
            
            if (res.msg === 'ok') {
                // Redirección exitosa 
              window.location.href = base_url + "Dashboard/index";
            } else {
                // Error de credenciales o campo vacío (mensaje del servidor)
                mensajeError.innerHTML = res.msg;
                mensajeError.classList.remove('d-none');
            }
          } catch (e) {
              // *** Mensaje de error mejorado para el usuario ***
              console.error("Error al parsear la respuesta JSON. El servidor no envió un JSON válido:", e);
              console.error("Respuesta cruda del servidor (BUSCAR ESPACIOS, SALTO DE LÍNEA O CARACTERES ANTES DE '{'):", this.responseText);
              mensajeError.innerHTML = "Error interno del servidor. Revisa la Consola (F12) en la pestaña 'Console' para ver la respuesta cruda y encontrar el error.";
              mensajeError.classList.remove('d-none');
          }
        }
      }
  }
}