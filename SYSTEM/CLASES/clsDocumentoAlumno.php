<?php
error_reporting(0);
require_once( 'clsConex.php' );
session_start(); // Inicia la sesión

class documento_alumno{

    private $db;

    public function __construct() {
		$this->db = Database::connect();
	}
    
    function get( $usu_id = '', $usu_nombre = '', $usu_apellido = '', $usu_mail = '', $usu_password = '', $usu_rol = '', $usu_status = 1){

        $sql = '';
        $sql .= "SELECT *";
        $sql .= " FROM usuarios";

        if( strlen( $usu_status ) > 0 ){
            $sql.= " WHERE usu_status IN( $usu_status )";
        }
        
        if( strlen( $usu_id  ) > 0 ){
            $sql.= " AND usu_id  = $usu_id ";
        }
        
        if( strlen( $usu_nombre ) > 0 ){
            $sql.= " AND usu_name LIKE '%$usu_nombre%'";
        }
        
        if( strlen( $usu_apellido ) > 0 ){
            $sql.= " AND usu_apellido LIKE '%$usu_apellido%'";
        }
        
        if( strlen( $usu_mail ) > 0 ){
            $sql.= " AND usu_mail = '$usu_mail'";
        }

        if( strlen( $usu_password ) > 0 ){
            $sql.= " AND usu_password = $usu_password'";
        }

        if( strlen( $usu_rol ) > 0 ){
            $sql.= " AND usu_usu_rol = $usu_rol'";
        }

        //echo $sql;
        $result = $this->db->query( $sql );
        return $result;

    }

    function save( $docal_id, $docal_id_estudiante, $docal_tipo_documento, $docal_url_documento ){

        $sql = "";
        $sql.= "INSERT INTO documento_alumno";
        $sql.= " VALUES ( $docal_id, $docal_id_estudiante, $docal_tipo_documento, '$docal_url_documento', 'CURDATE()', 1 );";
        echo $sql;
        $save = $this->db->query( $sql );

		$result = false;
		if( $save ){
			$result = true;
		}
		return $result;
    
    }
    function generateId(){

        $sql = '';
        $sql = "SELECT max( docal_id ) as max ";
        $sql.= " FROM documento_alumno;";
        $max = $this->db->query( $sql );
        return $max;
   
    }
    


   
}
?>