<?php
require_once('../API/module_apis.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ClsUser = new usuario();
    $mail = $_POST["correo"];
    $password = $_POST["password"];
    $mail = trim( $mail );
    $password = trim( $password );
    if( $mail != '' && $password != '' ){
        $user = $ClsUser->get( '', '', '', $mail);
        if( $user->num_rows == 1 ){

            while( $usu = $user->fetch_object() ){

                $usu_id = $usu->usu_id ;
                $usu_nombre = $usu->usu_nombre;
                $usu_apellido = $usu->usu_apellido;
                $usu_mail = $usu->usu_mail;
                $usu_password = $usu->usu_password;
                $usu_rol = $usu->usu_rol;
                $usu_status = $usu->usu_status;
     
             }
             
            if( password_verify( $password, $usu_password ) ){
                
                ///make a session
                $_SESSION[ 'usu_id' ] = $usu_id;
                $_SESSION[ 'usu_nombre' ] = $usu_nombre;
                $_SESSION[ 'usu_apellido' ] = $usu_apellido;
                $_SESSION[ 'usu_mail' ] = $usu_mail;
                $_SESSION[ 'usu_password' ] = $usu_password;
                $_SESSION[ 'usu_rol' ] = $usu_rol;
                $_SESSION[ 'usu_status' ] = $usu_status;
                //echo 'acceso correcto';
                switch( $usu_rol ){
                    case 1:
                        header('Location: ../PERSONAL/dashboard.php');
                    break;
                    case 4:
                        header('Location: ../ESTUDIANTES/dashboard.php');
                    break;
                    case 2:
                        header('Location: ../DOCENTES/dashboard.php');

                    break;
                }

            }else{

                header("Location: login.php");
            }
            
        }else{
            header("Location: login.php");
            
        }
    }


} else {
    header("Location: login.php");
}

?>