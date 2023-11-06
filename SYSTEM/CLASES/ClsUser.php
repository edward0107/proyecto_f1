<?php
error_reporting(0);
require_once( 'clsConex.php' );
session_start(); // Inicia la sesión

class usuario{

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

    function validateMail( $mail = '' ){

        $sql = '';
        $sql = "SELECT  usu_id ";
		$sql.= " FROM usuarios";

        if( strlen( $mail ) > 0 ){
            $sql.= " WHERE usu_mail = '$mail'";
        }
        
        $usu = $this->db->query( $sql );
        return $usu;
   
    }

    function save( $usu_id, $usu_nombre, $usu_apellido, $usu_mail, $usu_password, $usu_rol ){

        $sql = "";
        $sql.= "INSERT INTO usuarios";
        $sql.= " VALUES ( $usu_id, '$usu_nombre', '$usu_apellido', '$usu_mail', '$usu_password', $usu_rol, 1 );";
        //echo $sql;
        $save = $this->db->query( $sql );

		$result = false;
		if( $save ){
			$result = true;
		}
		return $result;
    
    }
    function generateId(){

        $sql = '';
        $sql = "SELECT max( usu_id ) as max ";
        $sql.= " FROM usuarios;";
        $max = $this->db->query( $sql );
        return $max;
   
    }

    function update( $id, $name , $surname = '', $user = '', $mail = '', $password = '', $rol = '' ){

        $sql = "";
        $sql.= "UPDATE users";
        $sql.= " SET usu_name = '$name',";
        $sql.= " usu_surname = '$surname',";
        $sql.= " usu_mail = '$mail',";
        $sql.= " usu_password = '$password'";

        $sql.= " WHERE usu_id = $id ";
     //   echo $sql;
        $save = $this->db->query( $sql );

		$result = false;
		if( $save ){
			$result = true;
		}
		return $result;
    
    }

    function delete( $id, $situacion ){

        $sql = "";
        $sql.= "UPDATE users";
        $sql.= " SET usu_situation = $situacion ";
        $sql.= " WHERE usu_id = $id ";
     //   echo $sql;
        $save = $this->db->query( $sql );

		$result = false;
		if( $save ){
			$result = true;
		}
		return $result;
    
    }



    function validateUser( $user = '' ){

        $sql = '';
        $sql = "SELECT  usu_id ";
		$sql.= " FROM users";

        if( strlen( $user ) > 0 ){
            $sql.= " WHERE usu_user = '$user'";
        }
        
        $usu = $this->db->query( $sql );
        return $usu;
   
    }


    


   
}
?>