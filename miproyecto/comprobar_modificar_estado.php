<!-- comprobar_modificar_recurso.php: código que permite comprobar el funcionamiento correcto de modificar un recurso por parte de un profesional. --> 

<?php

session_start(); // crea una sesión o reanuda la actual basada en un identificador de sesión pasado

//comprobamos si se ha iniciado sesión como profesional
if (!(isset($_SESSION['usuario']) && !empty($_SESSION['usuario']) && isset($_SESSION['tipo']) && !empty($_SESSION['tipo']) && $_SESSION['tipo'] == 'profesional')) {
    // Avisamos de la alerta si no es el caso al usuario 
    echo "<script>alert('ERROR: tienes que haber iniciado sesión como profesional.')window.location.href='index_profesional.php';</script>";
}

require 'include.php';

// Insertamos en la variable, la consulta que recorre la tabla de recurso y muestra la información referida al nombre del recurso si el nombre del recurso coincide con lo introducido.
$consulta = "SELECT DNI FROM recurso_asignado WHERE DNI='" . $_POST['DNI'] . "'";

//Envio la consulta a MySQL
$resultado = consultarA('75897720c', $consulta);

// Si existe información de esa consulta
if (mysql_num_rows($resultado) == 1) {

    // Insertamos en la variable la actualización de los valores a modificar del recurso
    $modificacion = "UPDATE recurso_asignado SET estado='" . $_POST['estado'] . "'";
    
    //Envio la consulta a MySQL
    $resultado = consultarA('75897720c', $modificacion);
    
    // Fue satisfactoria la función
    echo "<script>alert('Se ha modificado el estado correctamente');window.location.href='index_profesional.php';</script>";

    } else {
    
     // Ocurrió un error
    echo "<script>alert('ERROR: No existe el usuario que se pretende modificar.');window.location.href='index_profesional.php';</script>";

}

?>