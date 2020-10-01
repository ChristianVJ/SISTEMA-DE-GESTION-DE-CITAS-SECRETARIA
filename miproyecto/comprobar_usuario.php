<!-- comprobar_usuario.php: código que permite comprobar el funcionamiento correcto de iniciar sesión --> 

<?php

session_start(); // crea una sesión o reanuda la actual basada en un identificador de sesión pasado

require 'include.php';

// Insertamos en la variable, la consulta que recorre la tabla de usuarios y muestra la información referida al usuario si el nombre del usuario y contraseña coincide con lo introducido.
$consulta = 'SELECT * FROM usuarios WHERE usuario="' . $_POST['usuario'] . '" AND clave="' . $_POST['clave'] . '"';

//Envio la consulta a MySQL.
$resultado = consultarA('75897720c', $consulta);

// Si existe información de esa consulta
if (mysql_num_rows($resultado) == 1) {

    $registroActual = mysql_fetch_array($resultado);

    // Añado las variables de sesión del usuario actual
    $_SESSION['usuario'] = $registroActual['usuario'];
    $_SESSION['tipo'] = $registroActual['tipo'];
    $_SESSION['clave'] = $registroActual['clave'];

    if ($_SESSION['tipo'] == 'administrador') { // Si es admin
        header('Location: index_administrador.php'); // redirecciona a index de admin
    } else if ($_SESSION['tipo'] == 'profesional') { // Si es profesional
        header('Location: index_profesional.php'); // redirecciona a index de profesional
    } else { // Si es cliente
        header('Location: index_cliente.php'); // redirecciona a index de cliente
    }

}

?>
<script>
    alert('Nombre de usuario y/o password incorrectos');
    window.location.href='iniciar_sesion.php';
</script>
