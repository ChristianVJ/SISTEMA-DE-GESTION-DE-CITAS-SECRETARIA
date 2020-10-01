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
$consulta = "SELECT nombre_recurso FROM recursos WHERE nombre_recurso='" . $_POST['antiguo_nombre_recurso'] . "'";

//Envio la consulta a MySQL
$resultado = consultarA('75897720c', $consulta);

// Si existe información de esa consulta
if (mysql_num_rows($resultado) == 1) {

    // Insertamos en la variable la actualización de los valores a modificar del recurso
    $modificacion = "UPDATE recursos SET nombre_recurso='" . $_POST['nombre_recurso'] . "', horario='" . $_POST['horario'] . "', lugar='" . $_POST['lugar'] . "',descripcion='" . $_POST['descripcion'] . "' WHERE nombre_recurso='" . $_POST['antiguo_nombre_recurso'] . "'";
    
    //Envio la consulta a MySQL
    $resultado = consultarA('75897720c', $modificacion);
    
    // Fue satisfactoria la función
    echo "<script>alert('Se ha modificado el recurso correctamente');window.location.href='modificar_recurso.php';</script>";

    } else {
    
     // Ocurrió un error
    echo "<script>alert('ERROR: No existe el recurso que se pretende modificar.');window.location.href='modificar_recurso.php';</script>";

}

// Insertamos en la variable, la consulta que recorre la tabla de recurso_asignado y muestra la información referida al nombre del recurso si el nombre del recurso coincide con lo introducido.
$consulta2 = "SELECT nombre_recurso FROM recurso_asignado WHERE nombre_recurso='" . $_POST['nombre_recurso'] . "'";

//Envio la consulta a MySQL
$resultado = consultarA('75897720c', $consulta);

// Si existe información de esa consulta
if (mysql_num_rows($resultado) == 1) {

    // Insertamos en la variable la actualización del nombre del recurso de la tabla de recurso_asignado
    $modificacion = "UPDATE recurso_asignado SET nombre_recurso='" . $_POST['nombre_recurso'] . "' WHERE nombre_recurso='" . $_POST['nombre_recurso'] . "'";
    
    //Envio la consulta a MySQL
    $resultado = consultarA('75897720c', $modificacion);
    
    // Fue satisfactoria la función
    echo "<script>alert('Se ha modificado el recurso en recursos_asignados');window.location.href='modificar_recurso.php';</script>";

}

?>