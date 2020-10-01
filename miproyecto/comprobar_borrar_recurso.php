<!-- Comprobar_borrar_recurso.php: código que permite comprobar el funcionamiento correcto del borrado de un recurso.  --> 

<?php

session_start(); // crea una sesión o reanuda la actual basada en un identificador de sesión pasado

// Comprobamos si se ha iniciado sesión como profesional del sistema
if (!(isset($_SESSION['usuario']) && !empty($_SESSION['usuario']) && isset($_SESSION['tipo']) && !empty($_SESSION['tipo']) && $_SESSION['tipo'] == 'profesional')) {
    // Avisamos de la alerta si no es el caso al usuario 
    echo "<script>alert('ERROR: tienes que haber iniciado sesión como profesional.')window.location.href='index.php';</script>";
}

require 'include.php';

// Insertamos en la variable, la consulta que recorre la tabla de recursos y muestra la información referida al nombre de recurso si el nombre_recurso coincide con el introducido.
$consulta = "SELECT nombre_recurso FROM recursos WHERE nombre_recurso ='" . $_POST['nombre_recurso'] . "'";

//Envio la consulta a MySQL
$resultado = consultarA('75897720c', $consulta);

// Si existe información de esa consulta
if (mysql_num_rows($resultado) == 1) {

    // Insertamos en la variable, la consulta de borrado de ese recurso en la tabla recursos
    $borrado = 'DELETE FROM recursos WHERE codigo_r ecurso="' . $_POST['codigo_recurso'] . '"';
    // Insertamos en la variable, la consulta de borrado de ese recurso en la tabla de recurso_asignado
    $borrado2 = 'DELETE FROM recurso_asignado WHERE codigo_recurso="' . $_POST['codigo_recurso'] . '"';

    //Envio las dos consulta a MySQL
    $resultado = consultarA('75897720c', $borrado);
    $resultado = consultarA('75897720c', $borrado2);

    // Fue satisfactoria la función
    echo "<script>alert('Se ha dado de baja el recurso correctamente');window.location.href='index_profesional.php';</script>";

    } else {
    
    // Ocurrió un error
    echo "<script>alert('ERROR: No existe ese recurso');window.location.href='dar_baja_recurso.php';</script>";

    }

?>










