<!-- Cerrar_sesión.php: Permitirá al usuario cerrar su sesión actual  --> 

<?php

    // Destruimos las variables y la sesión mediante estos pasos:
    session_start(); // crea una sesión o reanuda la actual basada en un identificador de sesión pasado
    session_unset(); // Libera todas las variables de sesión
    session_destroy(); // Destruye toda la información registrada de una sesión
    header("Location: index.php"); // Volvemos a la página principal

    exit;
?>