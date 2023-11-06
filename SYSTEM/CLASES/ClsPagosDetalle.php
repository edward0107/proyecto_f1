<?php
error_reporting(0);
require_once( 'clsConex.php' );
session_start(); // Inicia la sesión

class pagoDetalle{

    private $db;

    public function __construct() {
		$this->db = Database::connect();
	}
    
    function get( $pag_id = '', $pag_estudiante = '', $pag_tipo = '', $pag_status = 2){

        $sql = '';
        $sql .= "SELECT *";
        $sql .= " FROM pago";
        $sql .= " INNER JOIN tipos_pago";
        $sql .= " ON pag_tipo = tp_id ";
        $sql .= " INNER JOIN estudiantes";
        $sql .= " ON pag_estudiante = est_id ";



        if( strlen( $pag_status ) > 0 ){
            $sql.= " WHERE pag_status IN( $pag_status )";
        }
        
        if( strlen( $pag_id  ) > 0 ){
            $sql.= " AND pag_id  = $pag_id ";
        }
        
        if( strlen( $pag_estudiante ) > 0 ){
            $sql.= " AND pag_estudiante = $pag_estudiante";
        }

        if( strlen( $pag_tipo ) > 0 ){
            $sql.= " AND pag_tipo = $pag_tipo";
        }

        //echo $sql;
        $result = $this->db->query( $sql );
        return $result;

    }

    function save( $pd_id, $pd_pago, $pd_boleta_numero, $pd_cantidad ){

        $sql = "";
        $sql.= "INSERT INTO pago_detalle";
        $sql.= " VALUES ( $pd_id, $pd_pago, '$pd_boleta_numero', $pd_cantidad );";
        // echo $sql;
        $save = $this->db->query( $sql );

		$result = false;
		if( $save ){
			$result = true;
		}
		return $result;
    
    }
    function generateId(){

        $sql = '';
        $sql = "SELECT max( pd_id ) as max ";
        $sql.= " FROM pago_detalle;";
        $max = $this->db->query( $sql );
        return $max;
   
    }
    


   
}
?>