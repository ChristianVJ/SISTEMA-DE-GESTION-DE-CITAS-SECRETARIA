<!-- include.php : realizamos la conexión con la base de datos -->

<?php

// Función que recibe como parámetros el nombre de la base de datos y la consulta SQL.
function consultarA($bd, $pregunta) {

    //Creamos una conexion remota
    $conexion = mysql_connect('localhost', 'root', 'pass_ejercicio_pw','75897720c');

    // Vuelvo a comprobar la conexion
    if ($conexion == FALSE) {
        echo 'Error de conexion remota';
        exit();
    }

    // Abrir Base de Datos.
    mysql_select_db($bd, $conexion);


    // Ejecutar la consulta.
    $resul = mysql_query($pregunta, $conexion);// or die(mysql_error());


    if ($resul == FALSE) {
        echo '<br>Se siente, no se pudo realizar la consulta: ' . $pregunta . '<br>' . mysql_error();
        mysql_close($conexion);
        exit();
    }

    mysql_close($conexion);

    // Devuelve el resultado.
    return $resul;
}
?>
