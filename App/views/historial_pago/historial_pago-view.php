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
    <?php
    include "./views/menu.php";
    ?>

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
                <form id="formSend">
                    <div class="form-group">
                        <label for="sltEstudiante">Estudiante</label>
                        <select name="sltEstudiante" required id="sltEstudiante">
                            <option value="" selected disabled>selecciona un elemento</option>
                            <?php
                            require_once "../Logic/conexion.php";
                            require_once "../Logic/mysql.php";
                            $sql = "SELECT*FROM persona AS p 
                                    INNER JOIN estudiante AS e ON e.idpersona=p.idpersona;";
                            $resultado = select_all($conexion, [], $sql);
                            foreach ($resultado as $key => $value) {
                            ?>
                                <option value="<?= $value["idestudiante"] ?>"><?= $value["nombres"] . " " . $value["apellidos"] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="sltPension">Pension</label>
                        <select name="sltPension" required id="sltPension">
                            <option value="" selected disabled>selecciona un elemento</option>
                            <?php
                            require_once "../Logic/conexion.php";
                            require_once "../Logic/mysql.php";
                            $sql = "SELECT*FROM persona AS p 
                                    INNER JOIN estudiante AS e ON e.idpersona=p.idpersona;";
                            $resultado = select_all($conexion, [], $sql);
                            foreach ($resultado as $key => $value) {
                            ?>
                                <option value="<?= $value["idestudiante"] ?>"><?= $value["nombres"] . " " . $value["apellidos"] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="txtFecha_pago">Fecha de pago</label>
                        <input type="Date" name="txtFecha_pago" id="txtFecha_pago" placeholder="Ingrese la Fecha de pago" required>
                    </div>
                    <div class="form-group">
                        <label for="txtpago">S/.Pago</label>
                        <input type="number" name="txtpago" id="txtpago" placeholder="Ingrese el monto de pago" required>
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
    <script src="<?= BASE_URL ?>App/assets/js/main.js"></script>
    <script src="<?= BASE_URL ?>App/assets/js/historial_pago/functions_historial_pago.js"></script>
</body>

</html>s