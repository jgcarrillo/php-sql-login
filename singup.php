<?php

require_once 'includes/conexion.php';

$mensaje = "";

if(!empty($_POST['email']) && !empty($_POST['password'])){
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Cifrado de contraseña por cuatro pasos
    $password_segura = password_hash($password, PASSWORD_BCRYPT, ['cost'=>4]);

    // Creamos la consulta del nuevo usuario
    $sql = "INSERT INTO usuarios VALUES(null, '$nombre', '$email', '$password_segura')";

    // Guardamos a ese nuevo usuario en la base de datos
    $guardar = mysqli_query($db, $sql);

    // Si la consulta ha tenido éxito mostramos el mensaje, en caso contrario se muestra el error
    if($guardar){
        $mensaje = "Registrado con éxito";
    }else{
        $mensaje = "Ha ocurrido un error al registrarse";
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de registro</title>

    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <?php require_once 'includes/cabecera.php' ?>

    <!-- Mostramos el mensaje creado anteriormente en caso de éxito o error -->
    <?php if(!empty($mensaje)) : ?>
        <p id="s-exito"> <?= $mensaje ?> </p> <!-- Necesario usar la forma de <.?.= para mostrar el contenido de una variable -->
    <?php endif; ?>

    <h1>SingUp</h1>
    <span>or <a href="login.php">Login</a></span>

    <form id="registro" action="singup.php" method="POST">
        <label for="nombre" id="login-nombre">Nombre</label>
        <input type="text" name="nombre" id=i-nombre placeholder="Introduce un nombre">
        <label for="email" id="login-email">Email</label>
        <input type="email" name="email" id="i-email" placeholder="Introduce tu email">
        <label for="password" id="login-pass">Contraseña</label>
        <input type="password" name="password" id="i-pass" placeholder="Introduce tu contraseña">

        <input type="submit"id="singup" value="Entrar!"> 
    </form>

    <?php require_once 'includes/footer.php' ?>