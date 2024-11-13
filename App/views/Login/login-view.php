<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login web</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>App/assets/css/login.css">
</head>
<body>
    <div class="wrapper">
        <form action="" class="form">
            <h1 class="title">Inicio</h1>
            <div class="inp">
                <input type="text" name="" id="" class="input" placeholder="usuario">
                <i class="usuario"></i>
            </div>
            <div class="inp">
                <input type="password" name="" id="" class="input" placeholder="contraseña">
                <i class="fa-solid fa-lock"></i>
            </div>
            <button class="submit">Iniciar sesión</button>
            <p class="footer"><a href="#" class="link">Por favor, Registrate</a></p>   
        </form>
        <div></div>
        <div class="banner">
            <h1 class="wel_text">Bienvenid@</h1><br>
            <p class="para"></p>
        </div>
        <script>
        let base_url = "<?= BASE_URL ?>";
    </script>
    <script src="<?= BASE_URL ?>App/assets/js/Login/functions_login.js"></script>

</body>
</html>