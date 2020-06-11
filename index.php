<?php
    session_start();

    require_once 'includes/conexion.php';

    // Si existe la sesion el email dentro de la sesión id_usuario se realiza la consulta a la base de datos
    if(isset($_SESSION['id_usuario']['email'])){
        $email = $_SESSION['id_usuario']['email'];

        $sql = "SELECT * FROM usuarios WHERE email = '$email'";
        $login = mysqli_query($db, $sql);

        $usuario = mysqli_fetch_assoc($login);
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de registro y acceso</title>

    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <?php require_once 'includes/cabecera.php' ?>

    <!-- Mensaje que se muestra en caso de que exista la sesión -->
    <?php if(isset($_SESSION['id_usuario'])) : ?>
        <div class="lg-exito">Bienvenido 
        <span id="lg-correo"> <?= $_SESSION['id_usuario']['email'] ?> </span>
        Logeado con éxito!
        <a href="logout.php" id="logout">Cerrar sesión</a>
        </div>
    <?php endif; ?>

    <h1>Por favor, regístrate o accede con tu cuenta</h1>

    <div id="enlaces">
        <a href="login.php">Login</a>
        <a href="singup.php">Registrarse</a>
    </div>
    
    <?php require_once 'includes/footer.php' ?>