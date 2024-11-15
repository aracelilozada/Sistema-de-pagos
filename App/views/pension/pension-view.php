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
            <h2>GESTION DE PENSION</h2>
            <p>Gestion y administracion de PENSION</p>
        </section>
        <section class="content-body">
            <div class="form-container">
                <form action="">
                <div class="form-group">
                        <label for="txtidpension">Pension</label>
                        <input type="text" name="txtidpension" id="txtidpension" placeholder="Ingrese pension" required>
                    </div>
                    <div class="form-group">
                        <label for="txtNombre">Nombre</label>
                        <input type="text" name="txtNombre" id="txtNombre" placeholder="Ingrese el nombre de la Persona" required>
                    </div>
                    <div class="form-group">
                        <label for="txtprecio">Precio</label>
                        <input type="text" name="txtprecio" id="txtprecio" placeholder="Ingrese el precio" required>
                    </div>
                    <div class="form-group">
                        <label for="txtporcentaje_descuento">Porcentahe de Descuento</label>
                        <input type="text" name="txtporcentaje_descuento" id="txtporcentaje_descuento" placeholder="Ingrese el porcentaje de Descuento" required>
                    </div>
                    <div class="form-group">
                        <label for="txtporcentaje_incremento">Porcentahe de Incremento</label>
                        <input type="text" name="txtporcentaje_incremento" id="txtporcentaje_incremento" placeholder="Ingrese el porcentaje de incremento" required>
                    </div>
                    <div class="form-group">
                        <label for="txtidmodulo">Modulo</label>
                        <input type="text" name="txtidmodulo" id="txtidmodulo" placeholder="Ingrese el modulo de la Persona" required>
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
                            <th>Pension</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>PSJ.Descuento</th>
                            <th>PSJ.Incremento</th>
                            <th>Modulo</th>
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