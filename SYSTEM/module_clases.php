<?php
    session_start();
    require_once( 'CLASES/ClsUser.php' );
    require_once( 'CLASES/clsGrado.php' );
    require_once( 'CLASES/clsSeccion.php' );
    require_once( 'CLASES/clsEstudiante.php' );
    require_once( 'CLASES/clsDocumentoAlumno.php' );
    require_once( 'CLASES/clsPago.php' );
    require_once( 'CLASES/ClsPagosDetalle.php' );
    require_once( 'CLASES/ClsDocente.php' );






    function validate_login(){
        if( !isset( $_SESSION[ 'usu_id' ] ) ){
            echo "<form id='f1' name='f1' action='../logout.php' method='post'>";
            echo "<script>document.f1.submit();</script>";
            echo "</form>";
        }


    }



         



?>