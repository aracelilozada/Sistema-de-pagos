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
            <h2>Gestion de Persona</h2>
            <p>Gestion y administracion de Persona</p>
        </section>
        <section class="content-body">
            <div class="form-container">
                <form id="formSend">

                    <div class="form-group">
                        <label for="txtnombres">Nombre</label>
                        <input type="text" name="txtnombres" id="txtnombres" placeholder="Ingrese el nombre de la Persona" required>
                    </div>
                    <div class="form-group">
                        <label for="txtapellidos">Apellidos</label>
                        <input type="text" name=txtapellidos" id="txtapellidos" placeholder="Ingrese los Apellidos de la Persona" required>
                    </div>
                    <div class="form-group">
                        <label for="txtDNI">DNI</label>
                        <input type="text" name="txtDNI" id="txtDNI" placeholder="Ingrese DNI de la Persona" required>
                    </div>
                    <div class="form-group">
                        <label for="txttelefono">Telefono</label>
                        <input type="text" name="txttelefono" id="txttelefono" placeholder="Ingrese el Telefono de la Persona" required>
                    </div>
                    <div class="form-group">
                        <label for="txtcorreo">Correo</label>
                        <input type="text" name="txtcorreo" id="txtcorreo" placeholder="Ingrese el Correo de la Persona" required>
                    </div>
                    <div class="form-group">
                        <label for="txtdireccion">Direccion</label>
                        <input type="text" name="txtdireccion" id="txtdireccion" placeholder="Ingrese la Direccion de la Persona" required>
                    </div>
                    <div class="form-group">
                        <label for="txtfechadenacimiento">Fecha de nacimiento</label>
                        <input type="date" name="txtfechadenacimiento" id="txtfechadenacimiento" placeholder="Ingrese FNacimiento de la Persona" required>
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
    <script src="<?= BASE_URL ?>App/assets/js/main.js"></script>
    <script src="<?= BASE_URL ?>App/assets/js/persona/functios_persona.js"></script>
</body>

</html>