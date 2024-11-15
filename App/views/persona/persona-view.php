<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Principal</title>
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
            <h1 class="system-name">Sistema de Gestión de Pagos</h1>
            <button class="logout-btn" onclick="logout()">Cerrar Sesión</button>
        </header>

        <!-- Área de contenido -->
        <section class="content">
            <h2>Gestion de Persona</h2>
            <p>Gestion y administracion de Persona</p>
        </section>
        <section class="content-body">
            <div class="form-container">
                <form action="">
                <div class="form-group">
                        <label for="txtidPersona">idPersona</label>
                        <input type="text" name="txtidPersona" id="txtidPersona" placeholder="Ingrese el idPersona" required>
                    </div>
                    <div class="form-group">
                        <label for="txtNombre">Nombre</label>
                        <input type="text" name="txtNombre" id="txtNombre" placeholder="Ingrese el nombre de la Persona" required>
                    </div>
                    <div class="form-group">
                        <label for="txtApellidos">Apellidos</label>
                        <input type="text" name="txtApellidos" id="txtApellidos" placeholder="Ingrese los Apellidos de la Persona" required>
                    </div>
                    <div class="form-group">
                        <label for="txtDNI">DNI</label>
                        <input type="text" name="txtDNI" id="txtDNI" placeholder="Ingrese DNI de la Persona" required>
                    </div>
                    <div class="form-group">
                        <label for="txtTelefono">Telefono</label>
                        <input type="text" name="txtTelefono" id="txtTelefono" placeholder="Ingrese el Telefono de la Persona" required>
                    </div>
                    <div class="form-group">
                        <label for="txtCorreo">Correo</label>
                        <input type="text" name="txtCorreo" id="txtCorreo" placeholder="Ingrese el Correo de la Persona" required>
                    </div>
                    <div class="form-group">
                        <label for="txtDireccion">Direccion</label>
                        <input type="text" name="txtDireccion" id="txtDireccion" placeholder="Ingrese la Direccion de la Persona" required>
                    </div>
                    <div class="form-group">
                        <label for="txtFNacimiento">FNacimiento</label>
                        <input type="text" name="txtFNacimiento" id="txtFNacimiento" placeholder="Ingrese FNacimiento de la Persona" required>
                    </div>
                    <div class="form-actions">
                        <button type="reset" class="btn btn-secondary">Limpiar</button>
                        <button type="submit" class="btn btn-primary">Registrar</button>
                    </div>
                </form>
            </div>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>idpersona</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>DNI</th>
                            <th>Telefono</th>
                            <th>Correo</th>
                            <th>Direccion</th>
                            <th>FNacimiento</th>
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
    <script src="<?= BASE_URL ?>App/assets/js/persona/functions_persona.js"></script>
</body>

</html>