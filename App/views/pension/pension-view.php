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
            <h2>GESTION DE PENSION</h2>
            <p>Gestion y administracion de PENSION</p>
        </section>
        <section class="content-body">
            <div class="form-container">
                <form id="formSend">
                    <div class="form-group">
                        <label for="sltmodulo">modulo</label>
                        <select name="sltmodulo" required id="sltmodulo">
                            <option value="" selected disabled>selecciona un elemento</option>
                            <?php
                            require_once "../Logic/conexion.php";
                            require_once "../Logic/mysql.php";
                            $sql = "SELECT*FROM carrera;";
                            $resultado = select_all($conexion, [], $sql);
                            foreach ($resultado as $key => $value) {
                            ?>
                                <optgroup label="<?= $value["nombres"] ?>">
                                    <?php
                                    $sql = "SELECT*FROM modulo WHERE idcarrera=" . $value["idcarrera"] . ";";
                                    $resultado = select_all($conexion, [], $sql);
                                    foreach ($resultado as $key => $value) {
                                    ?>
                                        <option value="<?= $value["idmodulo"] ?>"><?= $value["nombre"] ?></option>
                                    <?php
                                    }
                                    ?>
                                </optgroup>
                            <?php
                            }
                            ?>
                        </select>
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
                    <div class="form-actions">
                        <button type="reset" class="btn btn-secondary">Limpiar</button>
                        <button type="submit" class="btn btn-primary" id="btnsendData">Registrar</button>
                    </div>
                </form>
            </div>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>PSJ.Descuento</th>
                            <th>PSJ.Incremento</th>
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
    <script src="<?= BASE_URL ?>App/assets/js/pension/functions_pension.js"></script>
</body>

</html>