<?php
require_once( 'module_apis.php' );
error_reporting(0);
$request = $_REQUEST[ 'request' ];

switch( $request ){
    case 'save':
        $grad_nivel        = $_REQUEST[ 'grad_nivel' ];
        $grad_grado = $_REQUEST[ 'grad_grado' ];
        save( $grad_nivel, $grad_grado );
    break;

    case 'table':
        $grad_id           = $_REQUEST[ 'gra_id' ];
        $grad_nivel        = $_REQUEST[ 'grad_nivel' ];
        $grad_grado = $_REQUEST[ 'grad_grado' ];
        table( $grad_id, $grad_nivel, $grad_grado );
    break;
    
    case 'select':
        $id          = $_REQUEST[ 'gra_id' ];
        select( $id );
    break;
    
    case 'update':
        $grad_id          = $_REQUEST[ 'grad_id' ];
        $grad_nivel        = $_REQUEST[ 'grad_nivel' ];
        $grad_grado = $_REQUEST[ 'grad_grado' ];
        update( $grad_id, $grad_nivel, $grad_grado );
    break;

    case 'delete':
        $id          = $_REQUEST[ 'grad_id' ];
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


function save( $grad_nivel, $grad_grado ){

    $arrResponse = array();

    if( $grad_nivel != '' && $grad_grado != '' ){

        $ClsGra = new grado();
        $idGrado = $ClsGra->generateId();
        $id = $idGrado->fetch_object()->max;
        $id++;
        $result = $ClsGra->save( $id, $grad_nivel, $grad_grado );
        
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

function table( $grad_id, $grad_nivel, $grad_grado ){
    
    $arrResponse = array();
    
    $arrResponse = array(
        "status"	=> true,
        "data" 	=> tabla_grados( $grad_id, $grad_nivel, $grad_grado ),
        "message" 	=> "Datos Obtenidos Satisfactoriamente"
    );

    echo json_encode( $arrResponse );

}

function select( $grad_id ){
    
    $arrResponse = array();

    if( $grad_id != '' ){
        $ClsGra = new grado();
        $grados = $ClsGra->get( $grad_id, '', '' );
        $arrData = array();

        while( $grado = $grados->fetch_object() ){

           $arrData[ 'grad_id' ] = $grado->grad_id;
           $arrData[ 'grad_nivel' ] = $grado->grad_nivel;
           $arrData[ 'grad_grado' ] = $grado->grad_grado;

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
function update( $grad_id, $grad_nivel, $grad_grado ){
    
    $arrResponse = array();

    if( $grad_id != '' && $grad_nivel != '' && $grad_grado != '' ){

        $ClsGra = new grado();
        $result = $ClsGra->update( $grad_id, $grad_nivel, $grad_grado );
        
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

function delete_( $grad_id ){

    $arrResponse = array();

    if( $grad_id != ''  ){

        $ClsGra = new grado();
        $result = $ClsGra->delete( $grad_id );
        
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