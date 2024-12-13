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
            <h2>Gestión de Módulos</h2>
            <p>Gestión y administración de módulos.</p>
        </section>
        <section class="content-body">
            <div class="form-container">
                <form id="formSend">
                <div class="form-group">
                        <label for="sltcarrera">carrera</label>
                        <select name="sltcarrera" required id="sltcarrera">
                            <option value="" selected disabled>selecciona un elemento</option>
                            <?php
                            require_once "../Logic/conexion.php";
                            require_once "../Logic/mysql.php";
                            $sql = "SELECT*FROM carrera ;";
                            $resultado = select_all($conexion, [], $sql);
                            foreach ($resultado as $key => $value) {
                            ?>
                                <option value="<?= $value["idcarrera"] ?>"><?= $value["nombres"] ?></option>
                            <?php
                            }
                            ?>
                        </select>
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
                        <label for="sltestado">Estado</label>
                        <select name="sltestado" id="sltestado"> 
                            <option value="" disabled selected>selecciona un elemento</option>
                            <option value="activo" >activo</option>
                            <option value="inactivo" >inactivo</option>

                        </select>
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
                            <th>Nombre del Módulo</th>
                            <th>Descripción</th>
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
    <script src="<?= BASE_URL ?>App/assets/js/modulo/functions_modulo.js"></script>
</body>

</html>
