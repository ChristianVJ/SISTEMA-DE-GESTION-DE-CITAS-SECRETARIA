<!-- Comprobar_crear_recurso.php: código que permite comprobar el funcionamiento correcto de la creación de un recurso.  --> 

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

// Si no existe información de esa consulta
if (mysql_num_rows($resultado) == 0) {

     // Insertamos en la variable los valores introducidos por el usuario para crear un nuevo recurso.
     $insercion = "INSERT INTO recursos (nombre_recurso, descripcion, lugar, horario)";
     $insercion .= "VALUES ('" . $_POST['nombre_recurso'] . "','" . $_POST['descripcion'] . "','" . $_POST['lugar'] . "','" . $_POST['horario'] . "')";
     //Envio la consulta a MySQL
     $resultado = consultarA('75897720c', $insercion);

     // Fue satisfactoria la función
     echo "<script>alert('Se ha creado el recurso correctamente');window.location.href='index_profesional.php';</script>";

    } else {

    // Ocurrió un error
    echo "<script>alert('ERROR: Ya existe ese recurso');window.location.href='index_profesional.php';</script>";

    }

?>






