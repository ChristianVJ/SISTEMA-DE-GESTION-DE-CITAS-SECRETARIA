<!--Baja_usuario.php : Permite dar de baja a un usuario, en este caso a un cliente, mostrando un aviso de confirmación de su baja --> 

<?php

session_start();

// Comprobamos que se ha iniciado sesión como cliente
if (isset($_SESSION['usuario']) && !empty($_SESSION['usuario']) && isset($_SESSION['tipo']) && !empty($_SESSION['tipo']) && $_SESSION['tipo'] == 'cliente') {      
// Avisamos de la alerta si no es el caso al usuario        
    echo "<script>alert('ERROR: tienes que haber iniciado sesión como cliente.')window.location.href='index.php';</script>";
}

?>

<html>
    <body>
        <script type='text/javascript'>
                // Si el usuario confirma su baja en el menú generado, se opera la acción con elimina_usuario.php
                if(confirm('¿Estás seguro que quieres darte de baja?')) {
                    window.location.href='elimina_usuario.php'     
                // Si no lo confirma, nos devuelve a la página de inicio
                }else
                    window.location.href='index.php'
        </script>
    </body>
</html> 

