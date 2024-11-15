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
            <h1 class="system-name">Sistema de Gestión de usuario</h1>
            <button class="logout-btn" onclick="logout()">Cerrar Sesión</button>
        </header>

        <!-- Área de contenido -->
        <section class="content">
            <h2>Gestion de usuario</h2>
            <p>Gestion y administracion de usuario </p>
        </section>
        <section class="content-body">
            <div class="form-container">
                <form action="">
                    <div class="form-group">
                        <label for="txtNombre">idusuario</label>
                        <input type="text" name="txtidusuario" id="txtidusuario" placeholder="Ingrese el codigo de usuario" required>
                    </div>
                    <div class="form-group">
                        <label for="txtNombre">usuario</label>
                        <input type="text" name="txtusuario" id="txtusuario" placeholder="Ingrese el nombre del usuario" required>
                    </div>
                    <div class="form-group">
                        <label for="txtcontrasenia">contrasenia</label>
                        <input type="text" name="txtcontrasenia" id="txtcontrasenia" placeholder="Ingrese la contrasenia" required>
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
                            <th>idusuario</th>
                            <th>usuario</th>
                            <th>contrasenia</th>
                           
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
    <script src="<?= BASE_URL ?>App/assets/js/usuario/functions_usuario.js"></script>
</body>

</html>