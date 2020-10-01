<!-- comprobar_registro.php: código que permite comprobar el funcionamiento correcto de registrar un nuevo usuario --> 

<?php

session_start(); // crea una sesión o reanuda la actual basada en un identificador de sesión pasado

require 'include.php';

// Insertamos en la variable, la consulta que recorre la tabla de usuarios y muestra la información referida al usuario si el nombre del usuario coincide con lo introducido.
$consulta = 'SELECT usuario FROM usuarios WHERE usuario="' . $_POST['nombre_usuario_registro'] . '"';

//Envio la consulta a MySQL.
$resultado = consultarA('75897720c', $consulta);

// Si no existe información de esa consulta
if (mysql_num_rows($resultado) == 0) {

    // Si se va a dar de alta un cliente
    if ($_POST['registrarse_como'] == 'cliente') {

        // Insertamos en la variable los valores introducidos por el usuario para registrarse siendo cliente
       $insercion = "INSERT INTO usuarios (DNI, usuario, clave, email, tipo, nombre, apellidos, sexo)";
       $insercion.= "VALUES ('" . $_POST['DNI'] . "','" . $_POST['nombre_usuario_registro'] . "','" . $_POST['password_registro'] . "','" . $_POST['correo_registro'] . "','" . $_POST['registrarse_como'] . "','" . $_POST['nombre_registro'] . "','" . $_POST['apellidos_registro'] . "','" . $_POST['sexo'] . "')";

        //Envio la consulta a MySQL
        $resultado = consultarA('75897720c', $insercion);

         //¿fue correcto el resultado? Vamos a la página de inicio de sesión
        if ($resultado) { 
            echo "<script>alert('Cliente creado correctamente.\\nYa puedes iniciar sesion.');window.location.href='iniciar_sesion.php';</script>";
        }

        // Si se va a dar de alta un profesional
    } else if ($_POST['registrarse_como'] == 'profesional') {

        // Insertamos en la variable los valores introducidos por el usuario para registrarse siendo profesional
        $insercion = "INSERT INTO usuarios (DNI, usuario, clave, email, tipo, nombre, apellidos, sexo)";
        $insercion.= "VALUES ('" . $_POST['DNI'] . "','" . $_POST['nombre_usuario_registro'] . "','" . $_POST['password_registro'] . "','" . $_POST['correo_registro'] . "','" . $_POST['registrarse_como'] . "','" . $_POST['nombre_registro'] . "','" . $_POST['apellidos_registro'] . "','" . $_POST['sexo'] . "')";

        //Envio la consulta a MySQL
        $resultado = consultarA('75897720c', $insercion);

        //¿fue correcto el resultado? Vamos a la página de inicio de sesión
        if ($resultado) { 
            echo "<script>alert('Profesional creado correctamente..\\nYa puedes iniciar sesion.');window.location.href='iniciar_sesion.php';</script>";
        }
    }
}
?>

<script>
    alert('El nombre de usuario ya existe');
    window.location.href='registrarse.php';
</script>












 
     












