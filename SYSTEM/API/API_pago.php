<?php
require_once( 'module_apis.php' );
error_reporting(0);
$request = $_REQUEST[ 'request' ];

switch( $request ){
    case 'save':
        $pd_pago = $_REQUEST[ 'pd_pago' ];
        $pd_boleta_numero = $_REQUEST[ 'pd_boleta_numero' ];
        $pd_cantidad = $_REQUEST[ 'pd_cantidad' ];

        save( $pd_pago, $pd_boleta_numero, $pd_cantidad );
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


function save( $pd_pago, $pd_boleta_numero, $pd_cantidad ){

    $arrResponse = array();

    if( $pd_pago != '' ){

        $ClsPagosDet = new pagoDetalle();
        $ClsPago = new pago();
        $idPagoDetalle = $ClsPagosDet->generateId();
        $id = $idPagoDetalle->fetch_object()->max;
        $id++;
        //guardar detalle
        $save = $ClsPagosDet->save( $id, $pd_pago, $pd_boleta_numero, $pd_cantidad );
        //actualizar pago
        //por hacer:
        //validar que el pago sea igual al total establecido para ejecutar el update al status del pago
        $update = $ClsPago->update_pago( $pd_pago, 1 );
        if( $save && $update){
            $arrResponse = array(
                "status"	=> true,
                "data" 	=> [],
                "message" 	=> "Pago Ejecutado Correctamente"
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