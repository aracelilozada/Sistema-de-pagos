<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>App/assets/css/login.css">
</head>

<body>
    <div class="container">
        <h1 class="title">Inicio de Sesión</h1>
        <form id="form_login" class="form">
            <div class="form-group">
                <label for="txtUser" class="label">Usuario</label>
                <input type="text" name="txtUser" id="txtUser" class="input">
            </div>
            <div class="form-group">
                <label for="txtPassword" class="label">Contraseña</label>
                <input type="password" name="txtPassword" id="txtPassword" class="input">
            </div>
            <div class="form-group">
                <button type="submit" class="button">Iniciar Sesión</button>
            </div>
        </form>
    </div>
    <script>
        let base_url = "<?= BASE_URL ?>";
    </script>
    <script src="<?= BASE_URL ?>App/assets/js/Login/functions_login.js"></script>
</body>


</html>