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
            <h1 class="system-name">Mi Sistema de Pagos</h1>
            <button class="logout-btn" onclick="logout()">Cerrar Sesión</button>
        </header>

        <!-- Área de contenido -->
        <section class="content">
            <h2>Gestion de Estudiante</h2>
            <p>Gestion y administracion de Estudiante </p>
        </section>
        <section class="content-body">
            <div class="form-container">
                <form id="formSend">
                    <div class="form-group">
                        <label for="txtidestudiante">Estudiante</label>
                        <input type="text" name="txtidestudiante" id="txtidestudiante" placeholder="Ingrese el codigo del Estudiante" required>
                    </div>
                    <div class="form-group">
                        <label for="txtidpersona">Persona</label>
                        <input type="text" name="txtidpersona" id="txtidpersona" placeholder="Ingrese el codigo Persona" required>
                    </div>
                    <div class="form-group">
                        <label for="txtidusuario">usuario</label>
                        <input type="text" name="txtidusuario" id="txtidusuario" placeholder="Ingrese el codigo de usuario">
                    </div>
                    <div class="form-group">
                        <label for="txtestado">estado</label>
                        <input type="text" name="txtestado" id="txtestado" placeholder="Ingrese el estado del estudiante">
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
                            <th>idestudiante</th>
                            <th>idpersona</th>
                            <th>idusuario</th>
                            <th>Estado</th>
                            <th>Acciones</th>
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
    <script src="<?= BASE_URL ?>App/assets/js/Estudiante/functions_Estudiante.js"></script>
</body>

</html>