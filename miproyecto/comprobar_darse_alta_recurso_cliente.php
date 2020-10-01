<!-- comprobar_darse_alta_recurso.php: código que permite comprobar el funcionamiento correcto de darse de alta en un recurso por parte de un cliente. --> 

<?php

    session_start(); // crea una sesión o reanuda la actual basada en un identificador de sesión pasado

    // Comprobamos si se ha iniciado sesión como cliente del sistema
    if (!(isset($_SESSION['usuario']) && !empty($_SESSION['usuario']) && isset($_SESSION['tipo']) && !empty($_SESSION['tipo']) && $_SESSION['tipo'] == 'cliente')) {
        // Avisamos de la alerta si no es el caso al usuario 
        echo "<script>alert('ERROR: tienes que haber iniciado sesión como cliente.')window.location.href='index.php';</script>";
    }

    require 'include.php';//referencia el fichero include en el que se realiza la conexión con la base de datos

    // Insertamos en la variable, la consulta que recorre la tabla de recursos y muestra la información referida al codigo del recurso si el codigo del recurso coincide con el introducido.
    $consulta = "SELECT codigo_recurso FROM recursos WHERE codigo_recurso ='" . $_POST['codigo_recurso'] . "'";

    //Envio la consulta a MySQL
    $resultado = consultarA('75897720c', $consulta);

    // Si existe información de esa consulta
    if (mysql_num_rows($resultado) == 1) {
        // Insertamos en la variable los valores introducidos por el usuario para darse de alta en el recurso.
        $insercion = "INSERT INTO recurso_asignado (codigo_recurso, nombre, DNI, usuario, lugar)";
        $insercion .= "VALUES ('" . $_POST['codigo_recurso'] . "','" . $_POST['nombre'] . "','" . $_POST['DNI'] . "','" . $_SESSION['usuario'] . "','" . $_POST['lugar'] . "')";

        //Envio la consulta a MySQL
        $resultado = consultarA('75897720c', $insercion);

        // Fue satisfactoria la función
        echo "<script>alert('Se ha dado de alta en el recurso correctamente');window.location.href='index_cliente.php';</script>";
    } else {

        // Ocurrió un error
        echo "<script>alert('ERROR: No existe ese recurso');window.location.href='gestionar_recursos_clientes.php';</script>";
    }

?>

