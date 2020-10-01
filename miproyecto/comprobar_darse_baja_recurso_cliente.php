<!-- comprobar_darse_baja_recurso.php: código que permite comprobar el funcionamiento correcto de darse de baja en un recurso por parte de un cliente. --> 

<?php

    session_start(); // crea una sesión o reanuda la actual basada en un identificador de sesión pasado

    //comprobamos si se ha iniciado sesión como cliente
    if (!(isset($_SESSION['usuario']) && !empty($_SESSION['usuario']) && isset($_SESSION['tipo']) && !empty($_SESSION['tipo']) && $_SESSION['tipo'] == 'cliente')) {
        // Avisamos de la alerta si no es el caso al usuario 
        echo "<script>alert('ERROR: tienes que haber iniciado sesión como cliente.')window.location.href='index.php';</script>";
    }

    require 'include.php';//referencia el fichero include en el que se realiza la conexión con la base de datos

    // Insertamos en la variable, la consulta que recorre la tabla de recurso_asignado y muestra la información referida al codigo de usuario, recurso y nombre-DNI si el codigo del recurso, nombre y DNI coincide con lo introducido.
    $consulta = "SELECT codigo_usuario, codigo_recurso, nombre, DNI FROM recurso_asignado WHERE codigo_recurso ='" . $_POST['codigo_recurso'] . "' AND nombre ='" . $_POST['nombre'] . "' AND DNI ='" . $_POST['DNI'] . "' ";

    //Envio la consulta a MySQL
    $resultado = consultarA('75897720c', $consulta);

    // Si existe información de esa consulta
    if (mysql_num_rows($resultado) == 1) 
    {

        // Insertamos en la variable los valores introducidos por el usuario para darse de baja en el recurso.
        $borrado = 'DELETE FROM recurso_asignado WHERE codigo_recurso="' . $_POST['codigo_recurso'] . '"';

        //Envio la consulta a MySQL.
        $resultado = consultarA('75897720c', $borrado);

        // Fue satisfactoria la función
        echo "<script>alert('Se ha dado de baja en el recurso correctamente');window.location.href='index_cliente.php';</script>";

    } 
    else 
    {
        // Ocurrió un error
        echo "<script>alert('ERROR: No existe ese recurso');window.location.href='gestionar_recursos_clientes.php';</script>";

    }

?>





