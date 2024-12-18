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
            <h1 class="system-name">Mi Sistema de Pagos</h1>
            <button class="logout-btn" onclick="logout()">Cerrar Sesión</button>
        </header>

        <!-- Área de contenido -->
        <section class="content">
            <h2>Gestion de carrera</h2>
            <p>Gestion y administracion de carrera </p>
        </section>
        <section class="content-body">
            <div class="form-container">
                <form id="formSend">
                    <div class="inputs">

                        <div class="form-group">
                            <label for="txtnombre">Nombre</label>
                            <input type="text" name="txtnombre" id="txtnombre" placeholder="Ingrese el nombre de la carrera" required>
                        </div>
                        <div class="form-group">
                            <label for="txtdescripcion">Descripcion</label>
                            <input type="text" name="txtdescripcion" id="txtdescripcion" placeholder="Ingrese una Descripcion" required>
                        </div>
                        <div class="form-group">
                            <label for="sltestado">Estado</label>
                            <select name="sltestado" id="sltestado" required>
                                <option value="" disabled selected>selecciona un elemento</option>
                                <option value="activo">activo</option>
                                <option value="inactivo">inactivo</option>

                            </select>
                        </div>
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
                            <th>Nombres</th>
                            <th>Descripcion</th>
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
    <script src="<?= BASE_URL ?>App/assets/js/carrera/functions_carrera.js"></script>
</body>

</html