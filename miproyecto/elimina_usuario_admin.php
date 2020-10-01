<!-- elimina_usuario_admin.php: código que permite eliminar un usuario siendo admin  --> 

<?php

session_start(); // crea una sesión o reanuda la actual basada en un identificador de sesión pasado
require 'include.php';

// Comprobamos si se ha iniciado sesión como administrador del sistema
if (!(isset($_SESSION['usuario']) && !empty($_SESSION['usuario']) && isset($_SESSION['tipo']) && !empty($_SESSION['tipo']) && $_SESSION['tipo'] == 'administrador')) {

    // Avisamos de la alerta si no es el caso al usuario
    echo "<script>alert('ERROR: tienes que haber iniciado sesión como administrador.')window.location.href='index.php';</script>";
}


// Insertamos en la variable, la consulta de borrado de los usuarios en la tabla usuarios que coincida con el usuario introducido
$consulta = 'DELETE FROM usuarios WHERE usuario="' . $_POST['usuario'] . '"';

//Envio la consulta a MySQL
$resultado = consultarA('75897720c', $consulta);


if ($resultado) {
    echo "<script>alert('El usuario se ha dado de baja correctamente.');window.location.href='index_administrador.php';</script>";
} else {
    echo "<script>alert('El usuario no se ha dado de baja.');window.location.href='dar_baja_usuario_admin.php';</script>";
}

?>

<?php



