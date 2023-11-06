<?php
require_once( 'module_apis.php' );
// error_reporting(0);
$request = $_REQUEST[ 'request' ];

switch( $request ){
    case 'save':
        $est_carne        = $_REQUEST[ 'est_carne' ];
        $est_nombre        = $_REQUEST[ 'est_nombre' ];
        $est_apellido        = $_REQUEST[ 'est_apellido' ];
        $est_fecha_nacimiento        = $_REQUEST[ 'est_fecha_nacimiento' ];
        $est_grado        = $_REQUEST[ 'est_grado' ];
        $est_seccion        = $_REQUEST[ 'est_seccion' ];
        $est_mail        = $_REQUEST[ 'est_mail' ];
        save( $est_carne, $est_nombre, $est_apellido, $est_fecha_nacimiento, $est_grado, $est_seccion, $est_mail );
    break;

    case 'update_incripcion':
        $est_id         = $_REQUEST[ 'est_id' ];
        update_incripcion( $est_id );
    break;
    
    default:
        $arrResponse = array();
        $arrResponse = array(
            "status"	=> false,
            "data" 	=> [],
            "message" 	=> "Verifique la peticion"
        );
        echo json_encode( $arrResponse );

    break;
}


function save( $est_carne, $est_nombre, $est_apellido, $est_fecha_nacimiento, $est_grado, $est_seccion, $est_mail ){

    $arrResponse = array();

    if( $est_carne != '' && $est_nombre != '' && $est_apellido != '' && $est_fecha_nacimiento != '' && $est_grado != '' && $est_seccion != '' && $est_mail != '' ){
        //crear un nuevo usuario estudiante
        $ClsUsu = new usuario();
        $validateMail = $ClsUsu->validateMail( $est_mail )->num_rows;
        if( $validateMail === 0 ){

            $idObject = $ClsUsu->generateId();
            $idNewUser = $idObject->fetch_object()->max;
            $idNewUser++;
            $passwordEncrypt = password_hash('123', PASSWORD_BCRYPT );
            
            $saveUser = $ClsUsu->save( $idNewUser, $est_nombre, $est_apellido, $est_mail, $passwordEncrypt, 4 );
            if( $saveUser ){
                $ClsEst = new estudiantes();
                $idObject2 = $ClsEst->generateId();
                $idNewStudent = $idObject2->fetch_object()->max;
                $idNewStudent++;
                $saveStudent = $ClsEst->save( $idNewStudent, $est_carne, $idNewUser, $est_nombre, $est_apellido, $est_fecha_nacimiento, $est_grado, $est_seccion, $est_mail, 2 );

              
                if( $saveStudent ){
                    $ClsPag = new pago();
                    $idObject3 = $ClsPag->generateId();
                    $idNewpago = $idObject3->fetch_object()->max;
                    $idNewpago++;
    
                    $savePago = $ClsPag->save( $idNewpago, $idNewStudent, 1, 2 );
                    if($savePago){
                        $arrResponse = array(
                            "status"	=> true,
                            "data" 	=> $idNewStudent,
                            "message" 	=> "Ficha de Inscripcion, Pagos y Usuario generados satisfactoriamente"
                        );
                    }else{
                        $arrResponse = array(
                            "status"	=> false,
                            "data" 	=> [],
                            "message" 	=> "Error al generar el pago"
                        );
                    }
                }else{
                    $arrResponse = array(
                        "status"	=> false,
                        "data" 	=> [],
                        "message" 	=> "Error al crear la inscripcion"
                    );
                }
            }
        }else{
            $arrResponse = array(
                "status"	=> false,
                "data" 	=> [],
                "message" 	=> "Este Correo se encuentra registrado en el sistema, intente con otro"
            );
        }

    }else{
        $arrResponse = array(
			"status"	=> false,
			"data" 	=> [],
			"message" 	=> "Verifique los valores" .  $est_carne . ',' . $est_nombre . ',' . $est_apellido . ',' . $est_fecha_nacimiento . ',' . $est_grado . ',' . $est_seccion . ',' . $est_mail
		);
    }
    
    echo json_encode( $arrResponse );

}

function update_incripcion( $est_id ){
    if($est_id){
        $ClsEst = new estudiantes();
        $result = $ClsEst->updateStatus( $est_id, 1 );
        if( $result ){
            $arrResponse = array(
                "status"	=> true,
                "data" 	=> [],
                "message" 	=> "Actualizado Correctamente"
            );
        }else{
            $arrResponse = array(
                "status"	=> false,
                "data" 	=> [],
                "message" 	=> "Error en el servidor"
            );
        }


    }else{
        $arrResponse = array(
			"status"	=> false,
			"data" 	=> [],
			"message" 	=> "Verifique los valores"
		);
    }
    echo json_encode( $arrResponse );


}





?>