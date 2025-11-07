<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Panel de Administración (Dashboard)</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Bienvenido, <?php echo $_SESSION['nombre']; ?></li>
        </ol>
        
        <!-- Contenedor para mostrar mensajes de error de AJAX -->
        <!-- NOTA: Si este archivo es el formulario de login, debes mover este div a donde esté el formulario. -->
        <div id="alertaLogin" class="alert alert-danger d-none" role="alert">
            <!-- Aquí se mostrarán los mensajes de error del login. -->
        </div>

        <!-- Tarjetas de resumen -->
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">Usuarios Activos</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="<?php echo base_url; ?>Usuarios/listado">Ver Detalles</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <!-- Puedes añadir más tarjetas aquí (Ventas, Productos, etc.) -->
        </div>
        
        <!-- Ejemplo de tabla o gráficos -->
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Últimos Registros
            </div>
            <div class="card-body">
                <!-- Aquí iría el contenido dinámico de tu dashboard, como tablas o gráficos -->
                <p>Carga de gráficos de área y barra de ventas.</p>
            </div>
        </div>
    </div>
</main>
<script>
    const base_url = "<?php echo base_url; ?>";
</script>
<script src="<?php echo base_url; ?>Assets/js/funciones.js"></script>