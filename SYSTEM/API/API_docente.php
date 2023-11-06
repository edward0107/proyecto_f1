<?php
require_once( 'module_apis.php' );
// error_reporting(0);
$request = $_REQUEST[ 'request' ];

switch( $request ){

    case 'table':
        $per_id         = $_REQUEST[ 'per_id' ];
        table( $per_id );
    break;
    
    case 'save':
        $per_carne        = $_REQUEST[ 'per_carne' ];
        $per_nombre        = $_REQUEST[ 'per_nombre' ];
        $per_apellido        = $_REQUEST[ 'per_apellido' ];
        $per_fecha_nacimiento        = $_REQUEST[ 'per_fecha_nacimiento' ];
        $per_mail        = $_REQUEST[ 'per_mail' ];
        save( $per_carne, $per_nombre, $per_apellido, $per_fecha_nacimiento, $per_mail );
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
function table($per_id){
    $arrResponse = array();
    
    $arrResponse = array(
        "status"	=> true,
        "data" 	=> tabla_personal( $per_id ),
        "message" 	=> "Datos Obtenidos Satisfactoriamente"
    );

    echo json_encode( $arrResponse );

}

function save( $per_carne, $per_nombre, $per_apellido, $per_fecha_nacimiento, $per_mail ){

    $arrResponse = array();

    if( $per_carne != '' && $per_nombre != '' && $per_apellido != '' && $per_fecha_nacimiento != '' && $per_mail != '' ){
        //crear un nuevo usuario estudiante
        $ClsUsu = new usuario();
        $validateMail = $ClsUsu->validateMail( $per_mail )->num_rows;
        if( $validateMail === 0 ){

            $idObject = $ClsUsu->generateId();
            $idNewUser = $idObject->fetch_object()->max;
            $idNewUser++;
            $passwordEncrypt = password_hash('123', PASSWORD_BCRYPT );
            
            $saveUser = $ClsUsu->save( $idNewUser, $per_nombre, $per_apellido, $per_mail, $passwordEncrypt, 2 );
            if( $saveUser ){
                $ClsDoc = new docente();
                $idObject2 = $ClsDoc->generateId();
                $idNewDocente = $idObject2->fetch_object()->max;
                $idNewDocente++;
                $saveDocente = $ClsDoc->save( $idNewDocente, $per_carne, $idNewUser, $per_nombre, $per_apellido, $per_mail, 2 );

              
                if( $saveDocente ){
                   
                        $arrResponse = array(
                            "status"	=> true,
                            "data" 	=> $idNewDocente,
                            "message" 	=> "Docente y usuario generados satisfactoriamente"
                        );
                    
                }else{
                    $arrResponse = array(
                        "status"	=> false,
                        "data" 	=> [],
                        "message" 	=> "Error al crear el docente" 
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
			"message" 	=> "Verifique los valores" 
		);
    }
    
    echo json_encode( $arrResponse );

}






?>