<?php

// Necesario iniciar la sesion antes de crearla (linea 23)
session_start();

require_once 'includes/conexion.php';

if(!empty($_POST['email']) && !empty($_POST['password'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $login = mysqli_query($db, $sql);

    $usuario = mysqli_fetch_assoc($login);

    // Comprobacion de la contraseña introducida por el usuario y la almacenada en la base de datos
    $verify = password_verify($password, $usuario['password']);

    $mensaje = "";

    // Si los resultados (count) son mayores a cero y la contraseña se verifica ...
    if(count($usuario) > 0 && $verify){
        // Almacenamos a ese nuevo usuario en una sesion activa para que navegue
        $_SESSION['id_usuario'] = $usuario;
        header('Location: index.php');
    }else{
        $mensaje = "Lo sentimos, sus datos son incorrectos";
    }
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accede con tu cuenta</title>

    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

    <?php require_once 'includes/cabecera.php' ?>

    <!-- Mensaje a imprimir en caso de que de error el login -->
    <?php if(!empty($mensaje)) : ?>
        <p id="error"> <?= $mensaje ?> </p>
    <?php endif; ?>

    <h1>Login</h1>
    <span>or <a href="singup.php">SingUp</a></span>

    <form id="login" action="login.php" method="POST">
        <label for="email" id="id_email">Email</label>
        <input type="email" name="email" placeholder="Introduce tu email">
        <label for="password" id="id_pass">Contraseña</label>
        <input type="password" name="password" placeholder="Introduce tu contraseña">

        <input type="submit" id="enviar" value="Entrar!">    
    </form>
    
    <?php require_once 'includes/footer.php' ?>