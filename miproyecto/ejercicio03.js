/*función que comprueba el formulario del iniciar sesión*/
function comprueba_iniciar_sesion(f) 
{

    var msn = '';
    //comprobar que la nombre de usuario no sea vacía, en este caso que no contenga más de 20 caracteres
    if (f.usuario.value === '') 
        msn += 'Nombre usuario incorrecto\n';
    else if (f.usuario.value.length > 20)  
        msn += 'Nombre de usuario solo permite 20 caracteres\n';
    
    //comprobar que la contraseña no sea vacía, en este caso que no contenga más de 20 caracteres
    if (f.clave.value === '') 
        msn += 'Contraseña en blanco\n'; 
    else if (f.clave.value.length > 20)     
        msn += 'Contraseña solo permite 20 caracteres\n';

    //si se da alguno de las opciones de error, se devuelve dicho error 
    if (msn !== '') 
    {
        alert(msn);
        return false;
    }//en caso contrario finalizamos la ejecución de la función correctamente
    return true;
}

/*función que comprueba el formulario del registro*/
function comprueba_registrarse(f) 
{
    var msn = '';
    //comprobar que se introduce un DNI
    if(f.DNI.value === '')
        msn += 'Introduce DNI\n';
    else if(f.DNI.value.length > 9)
        msn +='DNI solo permite 9 caracteres';
    
    //comprobar que se introduce el nombre ajustándose al tamaño establecido en la base de datos
    if (f.nombre_registro.value === '') 
        msn += 'Introduce nombre\n'; 
    else if (f.nombre_registro.value.length > 20) 
        msn += 'Nombre solo permite 20 caracteres\n';
    
    //comprobar que se introduce los apellidos ajustándose al tamaño establecido en la base de datos
    if (f.apellidos_registro.value === '') 
        msn += 'Introduce los apellidos\n';
     else if (f.apellidos_registro.value.length > 40) 
        msn += 'Apellidos solo permite 40 caracteres\n';
      
    
    //comprobar que se introduce el nombre de usuario ajustándose al tamaño establecido en la base de datos
    if (f.nombre_usuario_registro.value === '') 
        msn += 'Introduce nombre de usuario\n';
     else if (f.nombre_usuario_registro.value.length > 20)
        msn += 'Nombre de usuario solo permite 20 caracteres\n';
     
    //comprobar que se introduce el correo ajustándose al tamaño establecido en la base de datos
    if (f.correo_registro.value === '') 
        msn += 'Debe indicar un Email obligatoriamente\n';
     else if (!validarEmail(f.correo_registro.value))//llamamos a la función en la que se comprueba que el correo tiene el formato correcto
        msn += 'Email incorrecto: ' + f.correo_registro.value + '\n';
     else if (f.correo_registro.value.length > 40) 
        msn += 'Email solo permite 40 caracteres\n';
       
    //comprobar que se introduce la contraseña ajustándose al tamaño establecido en la base de datos
    if (f.password_registro.value === '')
        msn += 'Introduce contraseña\n';
    else if (f.password_registro.value.length > 20) 
        msn += 'Contraseña solo permite 20 caracteres\n';
    //comprobar que la contraseña introducida en el campo contraseña y repita contraseña sean iguales
    else if (f.repite_password_registro.value === '' || f.repite_password_registro.value !== f.password_registro.value) 
        msn += 'La contraseña no coincide, introduzcala de nuevo\n';
    
    //comprobar que se introduce el sexo ajustándose al tamaño establecido en la base de datos
    if (f.sexo.value === '') 
        msn += 'Sexo sin especificar\n';
    
    //mostramos los errores obtenidos
    if (msn !== '') {
        alert(msn);
        return false;
    }    
    //comprobación correcta finalizamos la función con exito
    return true;
}

/*función que comprueba el formulario para editar datos personales*/
function comprueba_editar_datos(f) 
{
    var msn = '';
    //comprobar que se introduce un DNI
    if(f.DNI.value === '')
        msn += 'Introduce DNI\n';
    else if(f.DNI.value.length > 9)
        msn +='DNI solo permite 9 caracteres';
    
    //comprobar que se introduce el nombre ajustándose al tamaño establecido en la base de datos
    if (f.nombre_registro.value === '') 
        msn += 'Introduce nombre\n'; 
    else if (f.nombre_registro.value.length > 20) 
        msn += 'Nombre solo permite 20 caracteres\n';
    
    //comprobar que se introduce los apellidos ajustándose al tamaño establecido en la base de datos
    if (f.apellidos_registro.value === '') 
        msn += 'Introduce los apellidos\n';
     else if (f.apellidos_registro.value.length > 40) 
        msn += 'Apellidos solo permite 40 caracteres\n';
      
    
    //comprobar que se introduce el nombre de usuario ajustándose al tamaño establecido en la base de datos
    if (f.nombre_usuario_registro.value === '') 
        msn += 'Introduce nombre de usuario\n';
     else if (f.nombre_usuario_registro.value.length > 20)
        msn += 'Nombre de usuario solo permite 20 caracteres\n';
     
    //comprobar que se introduce el correo ajustándose al tamaño establecido en la base de datos
    if (f.correo_registro.value === '') 
        msn += 'Debe indicar un Email obligatoriamente\n';
     else if (!validarEmail(f.correo_registro.value))//llamamos a la función en la que se comprueba que el correo tiene el formato correcto
        msn += 'Email incorrecto: ' + f.correo_registro.value + '\n';
     else if (f.correo_registro.value.length > 40) 
        msn += 'Email solo permite 40 caracteres\n';
       
    //comprobar que se introduce la contraseña ajustándose al tamaño establecido en la base de datos
    if (f.password_registro.value === '')
        msn += 'Introduce contraseña\n';
    else if (f.password_registro.value.length > 20) 
        msn += 'Contraseña solo permite 20 caracteres\n';
    //comprobar que la contraseña introducida en el campo contraseña y repita contraseña sean iguales
    else if (f.repite_password_registro.value === '' || f.repite_password_registro.value !== f.password_registro.value) 
        msn += 'La contraseña no coincide, introduzcala de nuevo\n';
   
    //comprobar que se introduce el sexo ajustándose al tamaño establecido en la base de datos
    if (f.sexo.value === '') 
        msn += 'Sexo sin especificar\n';
        
    //mostramos los errores obtenidos
    if (msn !== '') {
        alert(msn);
        return false;
    }    
    //comprobación correcta finalizamos la función con exito
    return true;
}

/*función que comprueba el formulario de alta de recursos*/
function comprueba_alta_recurso(f)
{
    var msn = '';
    
    //comprobar que se introduce el nombre de registro ajustándose al tamaño establecido en la base de datos
    if (f.nombre_recurso.value === '')
        msn += 'Introduce Nombre de recurso.\n';
    else if (f.nombre_recurso.value.length > 20)
        msn += 'Nombre de recurso solo permite 20 caracteres\n';
   
    //comprobar que se introduce la descripción del recurso ajustándose al tamaño establecido en la base de datos
    if (f.descripcion.value === '')
        msn += 'Introduce la denominación del recurso.\n';
     else if (f.descripcion.value.length > 80)
        msn += 'Denominacion solo permite 80 caracteres\n';
 
    //mostramos los errores obtenidos
    if (msn !== '') 
    {
        alert(msn);
        return false;
    }
    //comprobación correcta finalizamos la función con exito
    return true;
}
/*función que comprueba el formulario de baja de recursos*/
function comprueba_baja_recurso(f)
{
    var msn = '';
    
    //comprobar que se introduce el nombre de registro ajustándose al tamaño establecido en la base de datos
    if (f.nombre_recurso.value === '')
        msn += 'Introduce Nombre de recurso.\n';
    else if (f.nombre_recurso.value.length > 20)
        msn += 'Nombre de recurso solo permite 20 caracteres\n';
   
    //comprobar que se introduce la descripción del recurso ajustándose al tamaño establecido en la base de datos
    if (f.codigo_recurso.value === '')
        msn += 'Introduce el codigo del recurso.\n';
     else if (f.codigo_recurso.value.length > 10)
        msn += 'Codigo de recurso solo permite 0 caracteres\n';
 
    //mostramos los errores obtenidos
    if (msn !== '') 
    {
        alert(msn);
        return false;
    }
    //comprobación correcta finalizamos la función con exito
    return true;
}
/*función que comprueba el formulario de baja de usuario*/
function comprueba_baja_usuario(f)
{
     var msn = '';
    
    //comprobar que se introduce el usuario a elimintar ajustándose al tamaño establecido en la base de datos
    if (f.usuario.value === '')
        msn += 'Introduce el Usuario que desea eliminar.\n';
    else if (f.usuario.value.length > 20)
        msn += 'Usuario solo permite 20 caracteres\n';
    
     //mostramos los errores obtenidos
    if (msn !== '') 
    {
        alert(msn);
        return false;
    }
    //comprobación correcta finalizamos la función con exito
    return true;
   
}
/*función que comprueba el formulario de alta de usuario en un recursos*/
function comprueba_alta_recurso_cliente(f)
{
    var msn = '';
    
    //comprobar que se introduce el nombre de registro ajustándose al tamaño establecido en la base de datos
    if (f.nombre_recurso.value === '')
        msn += 'Introduce Nombre de recurso.\n';
    else if (f.nombre_recurso.value.length > 20)
        msn += 'Nombre de recurso solo permite 20 caracteres\n';
    
    //comprobar que se introduce el DNI ajustandose al tamaño establecido en la base de datos
    if(f.DNI.value === '')
        msn +='Introduce DNI del cliente.\n';
    else if(f.DNI.value.length > 9)
        msn += 'DNI del cliente solo permite 9 caracteres\n';
    
    //comprobar que se introduce el cogido de recurso ajustándose al tamaño establecido en la base de datos
    if (f.codigo_recurso.value === '')
        msn += 'Introduce el codigo de recurso.\n';
     else if (f.codigo_recurso.value.length > 10)
        msn += 'Codigo de recurso solo permite 10 caracteres\n';
 
    //comprobar que se introduce el lugar de recurso ajustándose al tamaño establecido en la base de datos
    if (f.lugar.value === '')
        msn += 'Introduce el lugar de recurso.\n';
     else if (f.lugar.value.length > 20)
        msn += 'Codigo de recurso solo permite 10 caracteres\n';
   
    //mostramos los errores obtenidos
    if (msn !== '') 
    {
        alert(msn);
        return false;
    }
    //comprobación correcta finalizamos la función con exito
    return true;
}

/*función que valida el email*/
function validarEmail(email) 
{ 
    //formato que debe tener el email
    var aux  = /^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$/; 
    //comprobar que el formato es el correcto
    if (!aux.test(email)) { 
        return false; 
    } 
    return true; 
}



