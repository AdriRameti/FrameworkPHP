function validate_login(){
    var valida_email = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
    if(document.formulario_login.email.value.length==0){
        document.getElementById('error_email').innerHTML="*Correo electrónico incorrecto";
        document.formulario_login.email.focus();
        return 0;
        
    }else if(document.formulario_login.email.value.length!=0){
        document.getElementById('error_email').innerHTML="";
    }
    if(!valida_email.test(document.formulario_login.email.value)){
        document.getElementById('error_email').innerHTML="*El formato del correo electrónico es incorrecto";
        document.formulario_login.email.focus();
        return 0;
    }
    if(document.formulario_login.contrase.value.length==0){
        document.getElementById('error_contra').innerHTML="*Contraseña incorrecta";
        document.formulario_login.contrase.focus();
        return 0;
        
    }else if(document.formulario_login.contrase.value.length!=0){
        document.getElementById('error_contra').innerHTML="";
    }
}
function validate_register(){
    var valida_email = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
if(document.formulario_register.nombre.value.length==0){
    document.getElementById('error_nombre').innerHTML="*Introduzca su nombre";
    document.formulario_register.nombre.focus();
    return 0;
    
}else if(document.formulario_register.nombre.value.length!=0){
    document.getElementById('error_nombre').innerHTML="";
}
if(document.formulario_register.email.value.length==0){
    document.getElementById('error_email').innerHTML="*Introduzca su correo electrónico";
    document.formulario_register.email.focus();
    return 0;
    
}else if(document.formulario_register.email.value.length!=0){
    document.getElementById('error_email').innerHTML="";
}
if(!valida_email.test(document.formulario_register.email.value)){
    document.getElementById('error_email').innerHTML="*El formato del correo electrónico es incorrecto";
    document.formulario_register.email.focus();
    return 0;
}
if(document.formulario_register.contrase.value.length==0){
    document.getElementById('error_contra').innerHTML="*Introduzca una contraseña segura";
    document.formulario_register.contrase.focus();
    return 0;
    
}else if(document.formulario_register.contrase.value.length!=0){
    document.getElementById('error_contra').innerHTML="";
}

}

function login_view(){
    
    $.ajax({
        url:"/Ejercicios_PHP/modulo/login/controlador/controller_login.php?op=showLogin",
        type:'GET',
        dataType:'JSON',
        success: function (data){
                    $('<form></form>').attr('class','formulario_register log1').attr('name','formulario_register').attr('id','formulario_register').appendTo('#login_views1');
                    $('<h1>Registrate</h1>').appendTo('.log1');
                    $('<div></div>').attr('class','contenedor_register log2').appendTo('.log1');
                    $('<div></div>').attr('class','input_contenedor log5').appendTo('.log2');
                    $('<i></i>').attr('class','fas fa-user icono').appendTo('.log5');
                    $('<input></input>').attr('type','text').attr('id','nombre').attr('name','nombre').attr('placeholder','Nombre Completo').attr('class','caja_texto nombre').appendTo('.log5');
                    $('<span></span>').attr('id','error_nombre').attr('class','error_nombre validar').appendTo('.log5');
                    $('<div></div>').attr('class','input_contenedor log3').appendTo('.log2');
                    $('<i></i>').attr('class','fas fa-envelope icono').appendTo('.log3');
                    $('<input></input>').attr('type','text').attr('id','email').attr('name','email').attr('placeholder','Correo Electrónico').attr('class','caja_texto').appendTo('.log3');
                    $('<br></br>').appendTo('.log3');
                    $('<a></a>').attr('id','error_email').attr('class','error_email validar').appendTo('.log3');
                    $('<div></div>').attr('class','input_contenedor log4').appendTo('.log2');
                    $('<i></i>').attr('class','fas fa-key icono').appendTo('.log4');
                    $('<input></input>').attr('type','password').attr('id','contrase').attr('name','contrase').attr('placeholder','Contraseña').attr('class','caja_texto').appendTo('.log4');
                    $('<span></span>').attr('id','error_contra').attr('class','error_contra validar').appendTo('.log4');
                    $('<input></input>').attr('type','button').attr('value','Registar').attr('class','boton_register').attr('id','btn_register').attr('onclick','validate_register()').appendTo('.log2');
                    $('<p>Al registrarte, aceptas nuestas Condiciones de uso y Políticas de privacidad</p>').appendTo('.log2');
                    $('<p>¿Ya tienes una cuenta? </p>').attr('class','redi').appendTo('.log2');
                    $('<a>Iniciar Sesion</a>').attr('class','link_regist logeo').appendTo('.redi');
                    show_logins();
                    show_registers(); 
        }
        
    })
    
}
function show_logins(){
    $(document).on('click','.logeo',function(){;
        $('#login_views1').empty(); 
        $('<form></form>').attr('class','formulario_register log1').attr('name','formulario_login').attr('id','formulario_login').appendTo('#login_views1');
        $('<h1>Login</h1>').appendTo('.log1');
        $('<div></div>').attr('class','contenedor_register log2').appendTo('.log1');
        $('<div></div>').attr('class','input_contenedor log3').appendTo('.log2');
        $('<i></i>').attr('class','fas fa-envelope icono').appendTo('.log3');
        $('<input></input>').attr('type','text').attr('id','email').attr('name','email').attr('placeholder','Correo Electrónico').attr('class','caja_texto').appendTo('.log3');
        $('<br></br>').appendTo('.log3');
        $('<a></a>').attr('id','error_email').attr('class','error_email validar').appendTo('.log3');
        $('<div></div>').attr('class','input_contenedor log4').appendTo('.log2');
        $('<i></i>').attr('class','fas fa-key icono').appendTo('.log4');
        $('<input></input>').attr('type','password').attr('id','contrase').attr('name','contrase').attr('placeholder','Contraseña').attr('class','caja_texto').appendTo('.log4');
        $('<span></span>').attr('id','error_contra').attr('class','error_contra validar').appendTo('.log4');
        $('<input></input>').attr('type','button').attr('value','Login').attr('class','boton_register').attr('id','btn_login').attr('onclick','validate_login()').appendTo('.log2');
        $('<p>Al registrarte, aceptas nuestas Condiciones de uso y Políticas de privacidad</p>').appendTo('.log2');
        $('<p>¿No tienes una cuenta? </p>').attr('class','redi').appendTo('.log2');
        $('<a>Registrate</a>').attr('class','link_regist registro').appendTo('.redi');

    });
}
function show_registers(){
    $(document).on('click','.registro',function(){
        $('#login_views1').empty();
        $('<form></form>').attr('class','formulario_register log1').attr('name','formulario_register').attr('id','formulario_register').appendTo('#login_views1');
        $('<h1>Registrate</h1>').appendTo('.log1');
        $('<div></div>').attr('class','contenedor_register log2').appendTo('.log1');
        $('<div></div>').attr('class','input_contenedor log5').appendTo('.log2');
        $('<i></i>').attr('class','fas fa-user icono').appendTo('.log5');
        $('<input></input>').attr('type','text').attr('id','nombre').attr('name','nombre').attr('placeholder','Nombre Completo').attr('class','caja_texto nombre').appendTo('.log5');
        $('<span></span>').attr('id','error_nombre').attr('class','error_nombre validar').appendTo('.log5');
        $('<div></div>').attr('class','input_contenedor log3').appendTo('.log2');
        $('<i></i>').attr('class','fas fa-envelope icono').appendTo('.log3');
        $('<input></input>').attr('type','text').attr('id','email').attr('name','email').attr('placeholder','Correo Electrónico').attr('class','caja_texto').appendTo('.log3');
        $('<br></br>').appendTo('.log3');
        $('<a></a>').attr('id','error_email').attr('class','error_email validar').appendTo('.log3');
        $('<div></div>').attr('class','input_contenedor log4').appendTo('.log2');
        $('<i></i>').attr('class','fas fa-key icono').appendTo('.log4');
        $('<input></input>').attr('type','password').attr('id','contrase').attr('name','contrase').attr('placeholder','Contraseña').attr('class','caja_texto').appendTo('.log4');
        $('<span></span>').attr('id','error_contra').attr('class','error_contra validar').appendTo('.log4');
        $('<input></input>').attr('type','button').attr('value','Registar').attr('class','boton_register').attr('id','btn_register').attr('onclick','validate_register()').appendTo('.log2');
        $('<p>Al registrarte, aceptas nuestas Condiciones de uso y Políticas de privacidad</p>').appendTo('.log2');
        $('<p>¿Ya tienes una cuenta? </p>').attr('class','redi').appendTo('.log2');
        $('<a>Iniciar Sesion</a>').attr('class','link_regist logeo').appendTo('.redi');

    });
}
function register(){
    $(document).on('click','#btn_register',function(e){
        e.preventDefault();
        if (validate_register() !=0){
            var data = $('#formulario_register').serialize(); 
            $.ajax({
                type:'POST',
                data: data,
                url: 'modulo/login/controlador/controller_login.php?op=register',
                success:(function(respuesta){
                    if(respuesta==1){
                        // console.log(window.location.href); Como saber en que url estamos en js
                        $('<br></br>').appendTo('.log5');
                        $('<span></span>').attr('class','log12').appendTo('.log5');
                        $('<a>* Ya existe este usuario</a>').attr('id','error_usuario').attr('class','error_usuario validar').appendTo('.log12');
                       
                        
                    }else{
                        window.location.href="index.php?page=login";

                    }
                    

                })
            });
        }
    });
}
function login(){
    $(document).on('click','#btn_login',function(e){
        e.preventDefault();
        if (validate_login() !=0){
            var datos = $('#formulario_login').serialize(); 
            $.ajax({
                type:'POST',
                data: datos,
                url:'modulo/login/controlador/controller_login.php?op=login',
                
                success:(function(respuesta){
                    if (respuesta==1){
                        $('<span></span>').attr('class','log15').appendTo('.log3');
                        $('<a>* No existe este usuario</a>').attr('id','error_usuario').attr('class','error_usuario validar').appendTo('.log15');
                    }else if (respuesta=='"Los datos no coinciden"'){
                        window.location.href='index.php?page=login';
                    }else{
                        var token= respuesta;
                    
                    localStorage.setItem('token',token);
                    window.location.href='index.php?page=homepage';
                    
                    }
                })
            });
        }
        
    });
}
function load_content(){
    $('<div></div>').attr('id','login_views1').appendTo('#login_views');
    login_view();
}

$(document).ready(function(){
load_content();
login();
register();
});