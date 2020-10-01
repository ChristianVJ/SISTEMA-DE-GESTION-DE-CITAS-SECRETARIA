<!-- comprobar_modificar_usuario_admin.php: código que permite comprobar el funcionamiento correcto de modificar un usuario por parte de un admin --> 

<?php

session_start(); // crea una sesión o reanuda la actual basada en un identificador de sesión pasado

//comprobamos si se ha iniciado sesión como administrador
if (!(isset($_SESSION['usuario']) && !empty($_SESSION['usuario']) && isset($_SESSION['tipo']) && !empty($_SESSION['tipo']) && $_SESSION['tipo'] == 'administrador')) {
    // Avisamos de la alerta si no es el caso al usuario 
    echo "<script>alert('ERROR: tienes que haber iniciado sesión como administrador.')window.location.href='index_administrador.php';</script>";
}

require 'include.php';

// Insertamos en la variable, la consulta que recorre la tabla de usuarios y muestra la información referida al nombre del usuario si el nombre del usuario coincide con lo introducido.
$consulta = "SELECT nombre FROM usuarios WHERE nombre='" . $_POST['antiguo_nombre'] . "'";

//Envio la consulta a MySQL
$resultado = consultarA('75897720c', $consulta);

// Si existe información de esa consulta
if (mysql_num_rows($resultado) == 1) {

    // Insertamos en la variable la actualización del DNI, nombre, apellidos, email, clave ..  de la tabla de usuarios si coincide con el nombre.
    $modificacion = "UPDATE usuarios SET nombre='" . $_POST['nombre'] . "', apellidos='" . $_POST['apellidos'] . "', email='" . $_POST['email'] . "',clave='" . $_POST['clave'] . "', clave='" . $_POST['repite_clave'] . "' WHERE nombre='" . $_POST['antiguo_nombre'] . "'";
    
    //Envio la consulta a MySQL
    $resultado = consultarA('75897720c', $modificacion);
    
    // Fue satisfactoria la función
    echo "<script>alert('Se ha modificado el usuario correctamente');window.location.href='modificar_usuario_admin.php';</script>";

    } else {

    // Ocurrió un error
    echo "<script>alert('ERROR: No existe el curso que se pretende modificar.');window.location.href='modificar_usuario_admin.php';</script>";

}

// Insertamos en la variable, la consulta que recorre la tabla de recurso_asignado y muestra la información referida al DNI del usuario si el DNI coincide con lo introducido.
$consulta2 = "SELECT DNI FROM recurso_asignado WHERE DNI='" . $_POST['DNI'] . "'";

//Envio la consulta a MySQL
$resultado = consultarA('75897720c', $consulta);


// Si existe información de esa consulta
if (mysql_num_rows($resultado) == 1) {

    // Insertamos en la variable la actualización del DNI de la tabla de recurso_asignado
    $modificacion = "UPDATE recurso_asignado SET DNI='" . $_POST['DNI'] . "' WHERE DNI='" . $_POST['DNI'] . "'";
    
    //Envio la consulta a MySQL
    $resultado = consultarA('75897720c', $modificacion);
    
    // Fue satisfactoria la función
    echo "<script>alert('Se ha modificado el usuario en recursos_asignados');window.location.href='modificar_recurso.php';</script>";

}

?>