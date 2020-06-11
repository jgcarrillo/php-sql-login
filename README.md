# Login con PHP y SQL

Ejemplo básico para la aplicación de tareas de registro/acceso mediante la recogida de datos por un formulario, su introducción en una base de datos en SQL y su procesamiento con PHP. Se trata de un ejemplo básico, de estudio, creado con la menor cantidad de líneas de código, para facilitar su inclusión en cualquier proyecto, siendo esta la base de su funcionamiento.

### Taba de Usuarios en SQL

Se ha creado para ello una tabla en SQL para gestionar el registro de usuarios, la tabla está compuesta por:

id | Nombre | Email | Password
1 | Prueba | prueba@prueba.es | ****

Siendo el campo "id" de tipo incremental. Las contraseñas se almacenan en la base de datos mediante un cifrado por cuatro pasos. El aspecto que presentan en el servidor es el siguiente:

<p>
    <img src="assets/database.PNG" title="base de datos" alt="Imagen de la base de datos">
</p>

#### Proceso de Registro

El proceso de registro es sencillo, pidiéndole al usuario únicamente **Nombre**, **Correo** y **Contraseña**. Se puede ver un ejemplo del mismo en el gif inferior

<p align="center">
![registro](https://media.giphy.com/media/WR3OTTcejS6zmT7iYM/giphy.gif)
</p>

#### Proceso de Acceso

Una vez realizado el registro, el proceso de acceso es el mismo.

<p align="center">
![login](https://media.giphy.com/media/jTH2eRXv3nUjeLZbeB/giphy.gif)
</p>

#### Errores de acceso y registro

También se han tenido en cuenta diversos errores a la hora de acceder y acceder.

**ACCESO**

<p align="center">
![login](https://media.giphy.com/media/VzlDTpKQap9t0sdZz5/giphy.gif)
</p>

#### Uso de sesiones

Gracias al uso de sesiones, el usuario puede navegar por la web y que su sesión permanezca abierta. El siguiente código muestra que se almacena en *id_usuario*.

```
$_SESSION['id_usuario'] = $usuario;
header('Location: index.php');
```

Posteriormente se puede cerrar la sesión por medio del botón *Cerrar sesión*, el cual redirige a un archivo *logout.php* donde se destruye la sesión y se redirige al usuario a la página principal

<p align="center">
![login](https://media.giphy.com/media/m9kFOJpj8pIxDqXogB/giphy.gif)
</p>