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
            <h2>GESTION DEL HISTORIAL PAGOS</h2>
            <p>Gestion y administracion de Historial de pagos</p>
        </section>
        <section class="content-body">
            <div class="form-container">
                <form action="">
                <div class="form-group">
                        <label for="txtidhistorial_pago">histoial de pago</label>
                        <input type="text" name="txtidhistorial_pago" id="txtidhistorial_pago" placeholder="Ingrese su pago" required>
                    </div>
                    <div class="form-group">
                        <label for="txtidestudiante">N° Del Estuante</label>
                        <input type="text" name="txtidestudiante" id="txtidestudiante" placeholder="Ingrese su codigo de estuadiante" required>
                    </div>
                    <div class="form-group">
                        <label for="txtidpension">Pension</label>
                        <input type="number"name="txtidpension" id="txtidpension" placeholder="Ingrese la Pension" required>
                    </div>
                    <div class="form-group">
                        <label for="txtFecha_pago">Fecha de pago</label>
                        <input type="Date" name="txtFecha_pago" id="txtFecha_pago" placeholder="Ingrese la Fecha de pago" required>
                    </div>
                    <div class="form-group">
                        <label for="txtpago">S/.Pago</label>
                        <input type="number" name="txtpago" id="txtpago" placeholder="Ingrese el monto de pago" required>
                    </div>
                    <div class="form-group">
                        <label for="txtestado_pago">Estado de Pago</label>
                        <input type="text" name="txtestado_pago" id="txtestado_pago" placeholder="Ingrese Tipo de pago" required>
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
                            <th>histoial de pago</th>
                            <th>N° Del Estuante</th>
                            <th>Pension</th>
                            <th>Fecha de pago</th>
                            <th>S/.Pago</th>
                            <th>Estado de Pago</th>
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