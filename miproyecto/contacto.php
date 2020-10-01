<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <title>Envio de e-mail</title>
        <!-- Code dw-Formgenerator CSS-Stylesheet -->
        <style type="text/css">
            body {
                background-color: white;
            }
            .font-big {
                font-family:Verdana, sans-serif;
                font-size:16px; font-weight:bold;
                color:#FFFFFF;
            }
            .font-small {
                font-family:Verdana, sans-serif;
                font-size:10px; font-weight:normal;
                color:#000000;
            }
            .table {
                background-color:#FFFFFF;
                width:90%;
            }
            .table2 {
                background-color:#FFFFFF;
                width:100%;
            }
            .head {
                background-color:red;
            }
            .main {
                background-color:#ECECEC;
                font-family:Verdana, sans-serif;
                font-size:12px; font-weight:normal;
                color:#000000;
            }
            .foot {
                background-color:red;
            }
            .align {
                text-align:left;
            }
            .textarea {
                background-color:#ECECEC;
                color:#000000;
                font-family : Verdana, Helvetica, sans-serif;
                font-size:12px;
                border : 1px solid #808080;
            }
            .input {
                background-color:#ECECEC;
                color:#000000;
                font-family : Verdana, Helvetica, sans-serif;
                border : 1px solid #808080;
                font-size:12px;
            }
            .select {
                background-color:#ECECEC;
                color:#000000;
                font-family : Verdana, Helvetica, sans-serif;
                border : 1px solid #808080;
                font-size:12px;
            }
            .textarea:hover, .textarea:focus, .input:hover, .input:focus, .select:hover, .select:focus {
                border : 1px solid #000000;
            }
            .button {
                width: 130px;
            }
        </style>
        <!-- end Code dw-Formgenerator CSS-Stylesheet -->
        <!-- Code dw-Formgenerator Javascript -->
        <link type="text/css" rel="stylesheet" href="http://www.dw-formmailer.de/compress/scripts_forms_css.php"></link>
        <script type="text/javascript" src="http://www.dw-formmailer.de/compress/scripts_forms_js_jquery.php"></script>
        <script type="text/javascript">
            var tv=-1;
            window.onLoad=page_tv();
            function VerifyEmailAddress(EmailAddress) {
                if (window.RegExp) {
                    var reg1str = "(@.*@)|(\\.\\.)|(@\\.)|(\\.@)|(^\\.)";
                    var reg2str = "^.+\\@(\\[?)[a-zA-Z0-9\\-\\.]+\\.([a-zA-Z]{2,4}|[0-9]{1,4})(\\]?)$";
                    var reg1 = new RegExp(reg1str);
                    var reg2 = new RegExp(reg2str);
                    if (!reg1.test(EmailAddress) && reg2.test(EmailAddress)) {
                        return true
                    }else {
                        return false
                    }
                }else {
                    if (EmailAddress.indexOf("@") >= 0) {
                        return true
                    }else {
                        return false
                    }
                }
            }
            function rest(a,b,c,d) {
                r = (b - a.value.length);
                if (r < 0)
                    r = 0;
                if ( (e = document.getElementById(c)) != null)
                    e.innerHTML = r;
                if (a.value.length > b)
                    a.value = a.value.substr(0,b);
            }
            function page_tv() {
                tv++;
                window.setTimeout('page_tv()', 1000);
            }
            var chk;

            function valida_envia(){
                if (document.dwmailer.sender_mail.value == '') {
                    Sexy.alert("<b>Por favor inserte una dirección e-mail válida!</b> <br />(Dirección e-mail incorrecta)",{onComplete:function(r){if(r){document.dwmailer.sender_mail.focus()}}});
                    return false;
                } else {
                    if (!VerifyEmailAddress(document.dwmailer.sender_mail.value)) {
                        Sexy.alert("<b>Por favor inserte una dirección e-mail válida!</b> <br />(Dirección e-mail incorrecta)",{onComplete:function(r){if(r){document.dwmailer.sender_mail.focus()}}});
                        return false;
                    }
                }
                if (document.dwmailer.sender_nombre.value=='') {
                    Sexy.alert("<b>Por favor inserte un nombre!</b> <br />(No introdujo ninguno)",{onComplete:function(r){if(r){document.dwmailer.sender_nombre.focus()}}});
                    return false;
                }
                if (document.dwmailer.subject.value=='') {
                    Sexy.alert("<b>Por favor inserte un asunto!</b> <br />(No introdujo ninguno)",{onComplete:function(r){if(r){document.dwmailer.subject.focus()}}});
                    return false;
                }
                if (document.dwmailer.sender_comentario.value=='') {
                    Sexy.alert("<b>Por favor introduzca algun comentario o sugerencia!</b> <br />(Comentario está vacío)",{onComplete:function(r){if(r){document.dwmailer.sender_comentario.focus()}}});
                    return false;
                }
 
                if (confirm('¿Enviar este e-mail?')){
                    document.dwmailer.submit();
                }
            }

        </script>
        <!-- end Code dw-Formgenerator Javascript -->
    </head>

    <body>
        <!-- Code dw-Formgenerator -->
        <form name="dwmailer" action="http://www.dw-formmailer.de/cgi-bin/dwmailer/dwmailer.pl" enctype="multipart/form-data" method="post" >
                <input type="hidden" name="recipient" value="jonnny0@correo.ugr.es" />
                <input type="hidden" name="language" value="es" />
                <input type="hidden" name="page_background_color" value="#FFFFFF" />
                <input type="hidden" name="page_font_color" value="#000000" />
                <table align="center" class="table" border="0" cellspacing="1" cellpadding="3">
                    <tr>
                        <td colspan="2" class="head" height="17" width="100%" align="left"><span class="font-big">Envío de e-mail</span></td>
                    </tr>
                    <tr>
                        <td class="main" width="30%"><div class="align">Nombre</div></td>
                        <td class="main"><input class="input" type="text" name="sender_nombre" size="20" /></td>
                    </tr>
                    <tr>
                        <td class="main" width="30%"><div class="align">Dirección e-mail</div></td>
                        <td class="main"><input class="input" type="text" name="sender_mail" size="20" /></td>
                    </tr>
                    <tr>
                        <td class="main" width="30%"><div class="align">Asunto</div></td>
                        <td class="main"><input class="input" type="text" name="subject" size="20" /></td>
                    </tr>
                    <tr>
                        <td class="main" width="30%"><div class="align">Por favor deje su comentario</div></td>
                        <td class="main">(Caracteres restantes: <span id="count_1">2500</span>)<br />
                            <textarea class="textarea" name="sender_comentario" id="sender_comentario" cols="35" rows="5" onkeydown="rest(this,2500,'count_1',event)" onkeyup="rest(this,2500,'count_1',event)" onchange="rest(this,2500,'count_1',event)"></textarea></td>
                    </tr>
                    <tr><td class="foot" colspan="2" align="center" height="25" width="100%"><input class="button" type="button" value="Enviar" onClick="valida_envia();" />&nbsp;&nbsp;&nbsp;&nbsp;<input class="button" type="reset" value="Borrar" /></td></tr>
                </table>
        </form>
        <!-- end Code dw-Formgenerator -->
    </body>

</html> 

