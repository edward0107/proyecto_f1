<?php
    session_start();

    $_SESSION[ 'codeUser' ] = '';
    $_SESSION[ 'user' ] = '';
    $_SESSION[ 'nameUser' ] = '';
    $_SESSION[ 'surnameUser' ] = '';


	unset($_SESSION['usu_id']);
	unset($_SESSION['usu_nombre']);
	unset($_SESSION['usu_apellido']);
	unset($_SESSION['usu_mail']);
    unset($_SESSION['usu_password']);
	unset($_SESSION['usu_rol']);
    unset($_SESSION['usu_status']);
	
    session_destroy();


    header('Location: index.php');
?>
