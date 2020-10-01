<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <!-- Cabecera HTML -->
    <head>

        <title>Gestión de citas de la secretaria</title>
        <meta charset='utf-8'>
        <meta http-equiv="content-language" name="language" content="es" /> 
        <link rel="stylesheet" href="estilo03.css"> <!-- Archivo css -->
        <script type="text/javascript" src="ejercicio03.js"></script>  <!--para importar el archivo javaScript-->
        <iframe src="http://www.horlogeparlante.com/tiempo-exacto.html?i=b75932c1dafa6376a01f528c1431c75e" frameborder="0" style="width:9%; height:70px; position:absolute; left:670px; top:30px;"></iframe> <!-- frame que incluye la fecha/hora a la página -->

    </head>

<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->       

    <!-- Cuerpo HTML -->
    <body>
        <div id="contenedor"> <!-- el contenedor que encloba todo el body -->
            <div id="cabecera"> <!--parte superior de la página que contiene los enlaces para navegar-->
                <img src="imagenes/cabecera.png"/> <!--pongo una imagen dentro de la cabecera-->
            </div>
            <div id="navegador"> <!-- Navegador del sistema general -->
                <ul>
                    <li><a href="index.php"> Portada </a></li> <!-- Nos lleva a la portada de la página web -->
                    <li><a href="recursos.php"> Recursos </a></li> <!-- Nos lleva a los recursos existentes en la base de datos -->
                    <li><a href="profesionales.php"> Profesionales </a></li> <!-- Nos lleva a los profesionales existentes en el sistema -->
                    <!-- extra: página de contacto -->
                    <li><a href="contacto.php" target="popup" onClick="window.open(this.href, this.target, 'width=550,height=550'); return false;" >Contacto</a></li>                        
                </ul>                
            </div>
  
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->       

           
        <!-- Div para englobar al menú lateral que mostrará las funciones de cada rol -->
        <div id="lateral">

                <?php
                session_start(); // crea una sesión o reanuda la actual basada en un identificador de sesión pasado

                // Comprobamos que tipo de usuario se ha logeado en el sistema para mostrar las funciones específicas de ese rol. En caso de no ser ningún rol (visitante), accederá al else.
                if (isset($_SESSION['usuario']) && !empty($_SESSION['usuario']) && isset($_SESSION['tipo']) && !empty($_SESSION['tipo'])) {         
                    switch ($_SESSION['tipo']) { // switch para elegir el rol iniciado
                        case 'administrador': // Si eres un administrador, podrás hacer ...
                            echo $_SESSION['usuario'] . ' (' . $_SESSION['tipo'] . ')';
                            echo '<br/><a id="cerrar_sesion_administrador" href="cerrar_sesion.php"> <b>Cerrar sesión</b></a><br/><br/>';
                            echo '<h3 id="titulo_recursos_administrador" >RECURSOS</h3>';
                            echo '<br/><a id="crear_recurso_admin" href="crear_recurso_admin.php"> <b>Crear recurso</b></a><br/><br/>';
                            echo '<br/><a id="baja_recurso_admin" href="dar_baja_recurso_admin.php"> <b>Dar de baja recurso</b></a><br/><br/>';
                            echo '<br/><a id="modificar_recurso_admin" href="modificar_recurso_admin.php"> <b>Modificar recurso</b></a><br/><br/>';
                            echo '<h3 id="titulo_clientes_administrador" >USUARIOS</h3>';
                            echo '<br/><a id="crear_usuario_admin" href="crear_usuario_admin.php"> <b>Crear usuario</b></a><br/><br/>';
                            echo '<br/><a id="baja_usuario_admin" href="dar_baja_usuario_admin.php"> <b>Dar de baja usuario</b></a><br/><br/>';
                            echo '<br/><a id="modificar_usuario_admin" href="modificar_usuario_admin.php"> <b>Modificar usuario</b></a><br/><br/>';
                            echo '<br/><a href="editar_datos_administrador.php"> <b>Editar datos personales</b></a><br/><br/>';
                            echo '<h3 id="titulo_sistema_administrador" >SISTEMA</h3>';
                            echo '<br/><br/><a id="editar_administrador" href="editar_datos_profesional.php"> <b>Editar datos personales</b></a><br/><br/>';
                            break;

                            ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                            ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

                        case 'profesional': // Si eres un profesional, podrás hacer ...
                            echo $_SESSION['usuario'] . ' (' . $_SESSION['tipo'] . ')';
                            echo '<br/><a id="cerrar_sesion_profesional" href="cerrar_sesion.php"> <b>Cerrar sesión</b></a><br/>';
                            echo '<h3 id="titulo_recursos_profesional">RECURSOS</h3>';
                            echo '<a id="crear_recurso_profesional" href="crear_recurso.php"> <b>Crear recurso</b></a><br/>';
                            echo '<a id="modificar_recurso_profesional" href="modificar_recurso.php"> <b>Modificar recurso</b></a><br/>';
                            echo '<a id="baja_recurso_profesional" href="dar_baja_recurso.php"> <b>Dar de baja recurso</b></a><br/>';
                            echo '<a id="atender_clientes_profesional" href="atender_clientes_profesional.php"> <b>Atender clientes</b></a><br/>';
                            echo '<h3 id="titulo_sistema_profesional" >SISTEMA</h3>';
                            echo '<br/><br/><a id="editar_profesional" href="editar_datos_profesional.php"> <b>Editar datos personales</b></a><br/><br/>';
                            break;
                        
                            ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                            ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

                        case 'cliente':  // Si eres un cliente, podrás hacer ...
                            echo $_SESSION['usuario'] . ' (' . $_SESSION['tipo'] . ')';
                            echo '<br/><a id="cerrar_sesion_cliente" href="cerrar_sesion.php"> <b>Cerrar sesión</b></a><br/>';
                            echo '<h3 id="titulo_recursos_cliente">RECURSOS</h3>';
                            echo '<a id="gestionar_recursos_cliente" href="gestionar_recursos_clientes.php"> <b>Gestionar recursos</b></a><br/><br/>';
                            echo '<a id="recursos_en_cola_cliente" href="gestionar_recursos_en_cola_clientes.php"> <b>Recursos en cola</b></a><br/><br/>';
                            echo '<h3 id="titulo_sistema_cliente" >SISTEMA</h3>';
                            echo '<br/><br/><a id="editar_cliente" href="editar_datos_cliente.php"> <b>Editar datos personales</b></a><br/><br/>';
                            echo '<a id="baja_cliente" href="baja_usuario.php"> <b>Darse de baja</b></a><br/><br/>';
                    }

                            ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                            ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                    
                } else {  // Si eres un invitado, podrás hacer ...
                            echo ' <FORM METHOD="LINK" ACTION="iniciar_sesion.php"> <INPUT TYPE="submit" id="boton_iniciar_sesion" VALUE="INICIAR SESIÓN"> </FORM>';
                            echo ' <FORM METHOD="LINK" ACTION="registrarse.php"> <INPUT TYPE="submit" id="boton_registro" VALUE="REGISTRARSE"> </FORM>';

                }

                ?>             

        </div>


<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// --> 


            <div id="cuerpo">
                <h1 id="tituloTexto"> Dar de baja un recurso</h1>
                <?php
  include ('include.php');

                //comprobamos si se ha iniciado sesión como profesional

                if (!(isset($_SESSION['usuario']) && !empty($_SESSION['usuario']) && isset($_SESSION['tipo']) && !empty($_SESSION['tipo']) && $_SESSION['tipo'] == 'profesional')) {
                    echo "<script>alert('ERROR: tienes que haber iniciado sesión como profesional.');window.location.href='index.php';</script>";
                }


                ?>	
                
                <form id="formulario" name="formulario" method="POST" action="comprobar_borrar_recurso.php" onsubmit="return comprueba_baja_recurso(this)" enctype="multipart/form-data">
                    <br/>
                    <fieldset class="iniciarSesion">
                        <table class="tabla_registrarse">
                            <tr>
                                <td>
                                    <label>
                                        Nombre del recurso<br/>
                                        <input name="nombre_recurso" class="caja_texto" type="text" value=""/><br/>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>
                                        Código del recurso<br/>
                                        <input name="codigo_recurso" class="caja_texto" type="text" value=""/><br/>
                                    </label>
                                </td>
                            </tr>
                        </table>
                    </fieldset>
                        <fieldset id="botones">
                            <br/>
                            <table class="tabla_registrarse">
                                <tr>
                                    <td>
                                        <input type="submit" value="Enviar" />
                                        <input type="reset" value="Restablecer" />
                                    </td>
                                </tr>
                            </table>
                        </fieldset>
                        <br/>
                </form>
            </div>

         <div id="pie-pagina">
                <p>PRÁCTICA 3 - Celia & Christian </p>
         </div>

        </div>
    </body>
</html>




