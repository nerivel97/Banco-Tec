<?php
//Check if there is an GET message
$error = '';
if (isset($_GET['msg'])) {
    $error = $_GET['msg'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse Banco del TEC</title>
    <link rel="icon" href="../assets/img/logo.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/logres.css">
    <link rel="stylesheet" href="../assets/css/logres2.css">
</head>

<body class="body-color body-whole">
    <div class="container">

        <div class="image">
            <img src="../assets/img/register-d.png" class="register-d reg-d">
            <img src="../assets/img/register-bank.png" class="register-bank">
        </div>

        <div class="reg-section">
            <h1 class="login-header reg-header">Porfarvor rellanar el formulario de registro</h1>
            <form action="../scripts/register_auth.php" method="POST">
                <label class="login-label">Nombre Completo</label>
                <input class="textfield" type="text" id="fullName" name="fullName">
                <small id="error-fullName" class="form-text text-danger error-font"></small>
                <label class="login-label">Dirrecion</label>
                <input class="textfield" type="text" id="address" name="address">
                <small id="error-address" class="form-text text-danger error-font"></small>
                <label class="login-label">Email</label>
                <input class="textfield" type="email" id="email" name="email">
                <small id="error-email" class="form-text text-danger error-font"></small>
                <div class="password-field">
                    <label class="login-label">Contraseña</label>
                    <input class="textfield" type="password" id="password" name="password">
                    <img src="../assets/img/eye-open.png" class="password-icon" id="eye-register">
                    <small id="error-password" class="text-danger error-font"></small>
                </div>
                <div class="password-field">
                    <label class="login-label">Confirma el contraseña</label>
                    <input class="textfield" type="password" id="confirm-password">
                    <img src="../assets/img/eye-open.png" class="password-icon" id="eye-confirm">
                    <small id="error-confirmPassword" class="form-text error-font">
                        <?php echo $error ?>
                    </small>
                </div>
                <button name="submit" class="elevatedButton login-label">Registrarse</button>
            </form>
            <p class="register-link">Ya tienes una cuenta? <a class="no-underline reg-log" href="login.php">Iniciar Sesion</a>
            </p>

            <div class="social-icons">
                <a href="#"><img src="../assets/img/fb-icon.png"></a>
                <a href="#"><img src="../assets/img/whats-icon.png"></a>
                <a href="#"><img src="../assets/img/tel-icon.png"></a>
            </div>

        </div>

    </div>
    <script src="../assets/js/register.js"></script>
</body>

</html>