<?php
require_once( 'module_apis.php' );
error_reporting(0);
$request = $_REQUEST[ 'request' ];

switch( $request ){
    case 'save':
        $sec_grado        = $_REQUEST[ 'sec_grado' ];
        $sec_seccion = $_REQUEST[ 'sec_seccion' ];
        save( $sec_grado, $sec_seccion );
    break;

    case 'table':
        $sec_id           = $_REQUEST[ 'sec_id' ];
        $sec_grado        = $_REQUEST[ 'sec_grado' ];
        $sec_seccion = $_REQUEST[ 'sec_seccion' ];
        table( $sec_id, $sec_grado, $sec_seccion );
    break;
    
    case 'select':
        $id          = $_REQUEST[ 'gra_id' ];
        select( $id );
    break;
    
    case 'update':
        $sec_id          = $_REQUEST[ 'sec_id' ];
        $sec_grado        = $_REQUEST[ 'sec_grado' ];
        $sec_seccion = $_REQUEST[ 'sec_seccion' ];
        update( $sec_id, $sec_grado, $sec_seccion );
    break;

    case 'delete':
        $id          = $_REQUEST[ 'sec_id' ];
        delete_( $id );
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


function save( $sec_grado, $sec_seccion ){

    $arrResponse = array();

    if( $sec_grado != '' && $sec_seccion != '' ){

        $ClsSec = new seccion();
        $idGrado = $ClsSec->generateId();
        $id = $idGrado->fetch_object()->max;
        $id++;
        $result = $ClsSec->save( $id, $sec_grado, $sec_seccion );
        
        if( $result ){
            $arrResponse = array(
                "status"	=> true,
                "data" 	=> [],
                "message" 	=> "Insertado Correctamente"
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

function table( $sec_id, $sec_grado, $sec_seccion ){
    
    $arrResponse = array();
    
    $arrResponse = array(
        "status"	=> true,
        "data" 	=> tabla_secciones( $sec_id, $sec_grado, $sec_seccion ),
        "message" 	=> "Datos Obtenidos Satisfactoriamente"
    );

    echo json_encode( $arrResponse );

}

function select( $sec_id ){
    
    $arrResponse = array();

    if( $sec_id != '' ){
        $ClsSec = new seccion();
        $secciones = $ClsSec->get( $sec_id, '', '' );
        $arrData = array();

        while( $seccion = $secciones->fetch_object() ){

           $arrData[ 'sec_id' ] = $seccion->sec_id;
           $arrData[ 'sec_grado' ] = $seccion->sec_grado;
           $arrData[ 'sec_seccion' ] = $seccion->sec_seccion;

        }

        $arrResponse = array(
			"status"	=> true,
			"data" 	=> $arrData,
			"message" 	=> "Data obtenida satisfactoriamente"
		);

    }else{
        $arrResponse = array(
			"status"	=> false,
			"data" 	=> [],
			"message" 	=> "Verifique los valores"
		);
    }
    
    echo json_encode( $arrResponse );

}
function update( $sec_id, $sec_grado, $sec_seccion ){
    
    $arrResponse = array();

    if( $sec_id != '' && $sec_grado != '' && $sec_seccion != '' ){

        $ClsSec = new seccion();
        $result = $ClsSec->update( $sec_id, $sec_grado, $sec_seccion );
        
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
			"status"	=> true,
			"data" 	=> [],
			"message" 	=> "Verifique los valores"
		);
    }
    
    echo json_encode( $arrResponse );

}

function delete_( $sec_id ){

    $arrResponse = array();

    if( $sec_id != ''  ){

        $ClsSec = new seccion();
        $result = $ClsSec->delete( $sec_id );
        
        if( $result ){
            $arrResponse = array(
                "status"	=> true,
                "data" 	=> [],
                "message" 	=> "Eliminado Correctamente"
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
			"status"	=> true,
			"data" 	=> [],
			"message" 	=> "Verifique los valores"
		);
    }
    
    echo json_encode( $arrResponse );

}




?>