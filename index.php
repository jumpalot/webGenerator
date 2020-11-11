<?php
#lógica
    include('model/session.php');                                 #abrir sesion
    include('model/dbfun.php');                                   #abrir conexión
    if(isset($_POST['email'])){                             #si se envió un formulario
        if(isset($_POST['reg']))                                #si se esta intentando registrar
           registrar($_POST['email'], $_POST['password']);          #registrar
        validar($_POST['email'], $_POST['password']);           #iniciar sesión
    }
    if (isset($_POST['web']))                               #si se da nombre de web
        crearWeb($_SESSION['usuario'].$_POST['web']);           #registrar el nuevo dominio
    if (isset($_GET['descargar']))                          #si se solicita descarga
        descargar($_GET['descargar']);                          #ir a descarga
    alert();                                                #mostrar mensajes guardados
#vista
    require('view/header.html');
    if      (isset($_SESSION['usuario']))  {$usu=$_SESSION['usuario']; include('view/panel.php');}
    else if (isset($_GET['register']))      include('view/register.html');
    else                                    include('view/login.html');
    require('view/footer.html');
?>