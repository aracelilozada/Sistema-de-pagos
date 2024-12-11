<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Principal</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>App/assets/css/style.css">
</head>

<body>
    <?php
    include "./views/menu.php";
    ?>

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
                    <div class="inputs">
                        <div class="form-group">
                            <label for="sltPersona">Personas</label>
                            <select name="sltPersona" required id="sltPersona">
                                <option value="" selected disabled>selecciona un elemento</option>
                                <?php
                                require_once "../Logic/conexion.php";
                                require_once "../Logic/mysql.php";
                                $sql = "SELECT*FROM persona ;";
                                $resultado = select_all($conexion, [], $sql);
                                foreach ($resultado as $key => $value) {
                                ?>
                                    <option value="<?= $value["idpersona"] ?>"><?= $value["nombres"] . " " . $value["apellidos"] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
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
                            <th>Nombres</th>
                            <th>apellidos</th>
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