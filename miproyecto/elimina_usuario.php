<!-- elimina_usuario.php: código que permite eliminar un usuario.  --> 

<?php

session_start(); // crea una sesión o reanuda la actual basada en un identificador de sesión pasado
require 'include.php';

// Comprobamos si se ha iniciado sesión como profesional del sistema
if (!(isset($_SESSION['usuario']) && !empty($_SESSION['usuario']) && isset($_SESSION['tipo']) && !empty($_SESSION['tipo']) && $_SESSION['tipo'] == 'usuario')) {
     // Avisamos de la alerta si no es el caso al usuario 
    echo "<script>alert('ERROR: tienes que haber iniciado sesión como cliente.')window.location.href='index.php';</script>";
}

// Insertamos en la variable, la consulta de borrado de los usuarios en la tabla usuarios que coincida con el usuario introducido
$consulta = 'DELETE FROM usuarios WHERE usuario="' . $_SESSION['usuario'] . '"';

//Envio la consulta a MySQL
$resultado = consultarA('75897720c', $consulta);

// Fue satisfactoria la función
echo "<script>alert('Usuario dado de baja correctamente.');window.location.href='cerrar_sesion.php';</script>";

?>