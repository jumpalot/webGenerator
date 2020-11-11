<?php
    function validar($email, $pass){
        global $db,$error;
        $usuario = @$db->query(
            "SELECT `idUsuario` FROM `usuarios` WHERE `email`='$email' AND `password`='$pass'"
        )->fetch_array()[0];
        if ($usuario) $_SESSION['usuario'] = $usuario;
        else $error="usuario o contraseña incorrectos";
    }
    function registrar($email, $pass){
        global $db, $error;
        if(!$db->query("INSERT INTO `usuarios` (`email`,`password`) VALUES('$email', '$pass')"))
             $error="El email ya está registrado";
        else $error="Registro existoso";
    }
    function alert(){
        global $error;
        if($error!='') echo "<script>alert('$error')</script>";
    }
    function crearWeb($dominio){
        global $db, $error;
        $usuario=$_SESSION['usuario'];
        if(!$db->query("INSERT INTO `webs` (`idUsuario`,`dominio`) VALUES ('$usuario','$dominio')"))
            $error="dominio no disponible";
        else shell_exec("./wix.sh $dominio");
    }
    function misWebs($usu){
        global $db;
        return $db->query(
            "SELECT `dominio` FROM `webs` ".(($usu!=1)?"WHERE `idUsuario`='$usu'":'')
        )->fetch_all(MYSQLI_NUM);
    }
    function descargar($dom){
        shell_exec("zip -r ./users/$dom/$dom.zip ./users/$dom");
        header("Location: ./users/$dom/$dom.zip");
    }
    $error='';
    $db = new mysqli('mattprofe.com.ar','3635', '3635', '3635');

?>