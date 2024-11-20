<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Principal - Módulos</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>App/assets/css/style.css">
</head>

<body>
    <!-- Menú lateral -->
    <div class="sidebar" id="sidebar">
        <h2 class="logo">Mi Sistema</h2>
        <ul class="menu">
            <li><a href="#dashboard" class="menu-link">Dashboard</a></li>
            <li><a href="#usuarios" class="menu-link">Usuarios</a></li>
            <li><a href="#reportes" class="menu-link">Reportes</a></li>
            <li><a href="#configuracion" class="menu-link">Configuración</a></li>
            <li><a href="#soporte" class="menu-link">Soporte</a></li>
        </ul>
    </div>

    <!-- Contenedor principal -->
    <div class="main-content">
        <!-- Menú superior -->
        <header class="header">
            <h1 class="system-name">Mi Sistema de Pagos</h1>
            <button class="logout-btn" onclick="logout()">Cerrar Sesión</button>
        </header>

        <!-- Área de contenido -->
        <section class="content">
            <h2>Gestión de Módulos</h2>
            <p>Gestión y administración de módulos.</p>
        </section>
        <section class="content-body">
            <div class="form-container">
                <form id="formSend">
                    <div class="form-group">
                        <label for="txtidmodulo">ID Módulo</label>
                        <input type="text" name="txtidmodulo" id="txtidmodulo" placeholder="Ingrese el código del módulo" required>
                    </div>
                    <div class="form-group">
                        <label for="txtnombre">Nombre del Módulo</label>
                        <input type="text" name="txtnombre" id="txtnombre" placeholder="Ingrese el nombre del módulo" required>
                    </div>
                    <div class="form-group">
                        <label for="txtdescripcion">Descripción</label>
                        <input type="text" name="txtdescripcion" id="txtdescripcion" placeholder="Ingrese una breve descripción del módulo">
                    </div>
                    <div class="form-group">
                        <label for="txtestado">Estado</label>
                        <input type="text" name="txtestado" id="txtestado" placeholder="Ingrese el estado del módulo">
                    </div>
                    <div class="form-group">
                        <label for="txtidcarrera">ID Carrera</label>
                        <input type="text" name="txtidcarrera" id="txtidcarrera" placeholder="Ingrese el código de la carrera" required>
                    </div>
                    <div class="form-actions">
                        <button type="reset" class="btn btn-secondary">Limpiar</button>
                        <button type="submit" class="btn btn-primary">Registrar</button>
                    </div>
                </form>
            </div>
            <div class="table-container">
            <div class="form-actions">
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre del Módulo</th>
                            <th>Descripción</th>
                            <th>Estado</th>
                            <th>ID Carrera</th>
                        </tr>
                    </thead>
                    <tbody id="table-body">

                    </tbody>
                </table>
            </div>
        </section>
    </div>
    <script>
        let base_url = "<?= BASE_URL ?>";
    </script>
     <script src="<?= BASE_URL ?>App/assets/js/main.js"></script>
    <script src="<?= BASE_URL ?>App/assets/js/Modulo/functions_Modulo.js"></script>
</body>

</html>
