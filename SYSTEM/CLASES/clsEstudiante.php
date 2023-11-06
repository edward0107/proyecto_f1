<?php
require_once( 'clsConex.php' );

class estudiantes{

    private $db;

    public function __construct() {
		$this->db = Database::connect();
	}
 
    function get( $est_id = '', $est_carne = '', $est_usuario = '', $est_nombre = '', $est_apellido = '', $est_fecha_nacimiento = '', $est_grado = '', $est_seccion = '', $est_mail = '', $est_status = 2){

        $sql = '';
        $sql.= "SELECT *";
        $sql.= " FROM estudiantes";
        if( strlen( $est_status ) > 0 ){
            $sql.= " WHERE est_status IN( $est_status )";
        }
        
        if( strlen( $est_id ) > 0 ){
            $sql.= " AND est_id = $est_id";
        }
        
        if( strlen( $est_carne ) > 0 ){
            $sql.= " AND est_carne = $est_carne";
        }

        if( strlen( $est_usuario ) > 0 ){
            $sql.= " AND est_usuario = $est_usuario";
        }
        
        if( strlen( $est_nombre ) > 0 ){
            $sql.= " AND est_nombre = $est_nombre";
        }

        if( strlen( $est_apellido ) > 0 ){
            $sql.= " AND est_apellido = $est_apellido";
        }
        
        if( strlen( $est_fecha_nacimiento ) > 0 ){
            $sql.= " AND est_fecha_nacimiento = $est_fecha_nacimiento";
        }

        if( strlen( $est_grado ) > 0 ){
            $sql.= " AND est_grado = $est_grado";
        }

        
        if( strlen( $est_seccion ) > 0 ){
            $sql.= " AND est_seccion = $est_seccion";
        }
        if( strlen( $est_mail ) > 0 ){
            $sql.= " AND est_mail = $est_mail";
        }
        //echo $sql;
        $result = $this->db->query( $sql );
        return $result;
        
    }

    function save( $est_id, $est_carne , $est_usuario , $est_nombre , $est_apellido , $est_fecha_nacimiento , $est_grado ,  $est_seccion , $est_mail, $est_status){

        $sql = "";
        $sql.= "INSERT INTO estudiantes";
        $sql.= " VALUES ( $est_id, '$est_carne' , $est_usuario , '$est_nombre' , '$est_apellido' , 'CURDATE()' , $est_grado , $est_seccion, '$est_mail', $est_status );";
        //echo $sql;
        $save = $this->db->query( $sql );

		$result = false;
		if( $save ){
			$result = true;
		}
		return $result;
    
    }

    function update(  $est_id, $est_carne , $est_usuario , $est_nombre , $est_apellido , $est_fecha_nacimiento , $est_grado , $est_seccion , $est_status ){

        $sql = "";
        $sql.= "UPDATE estudiantes";
        $sql.= " SET est_carne = '$est_carne'";
        $sql.= " est_usuario = $est_usuario";
        $sql.= " est_nombre = '$est_nombre'";
        $sql.= " est_apellido = '$est_apellido'";
        $sql.= " est_fecha_nacimiento = '$est_fecha_nacimiento'";
        $sql.= " est_grado = $est_grado";
        $sql.= " est_seccion = $est_seccion";
        $sql.= " est_status = $est_status";
        $sql.= " WHERE est_id = $est_id ";
     //   echo $sql;
        $save = $this->db->query( $sql );

		$result = false;
		if( $save ){
			$result = true;
		}
		return $result;
    
    }

    function updateStatus( $est_id, $est_status ){

        $sql = "";
        $sql.= "UPDATE estudiantes";
        $sql.= " SET est_status = $est_status";
        $sql.= " WHERE est_id = $est_id ";
     //   echo $sql;
        $save = $this->db->query( $sql );

		$result = false;
		if( $save ){
			$result = true;
		}
		return $result;
    
    }

    function generateId(){

        $sql = '';
        $sql = "SELECT max( est_id ) as max ";
		$sql.= " FROM estudiantes;";
        $max = $this->db->query( $sql );
        return $max;
   
    }
    

    function get_estudiante_pago( $est_id = '', $est_carne = '', $est_usuario = '', $est_nombre = '', $est_apellido = '', $est_fecha_nacimiento = '', $est_grado = '', $est_seccion = '', $est_mail = '', $est_status = 1){

        $sql = '';
        $sql.= "SELECT *";
        $sql.= " FROM estudiantes";
        $sql.= " INNER JOIN pago";
        $sql.= " ON pag_estudiante = est_id";
        if( strlen( $est_status ) > 0 ){
            $sql.= " WHERE est_status IN( $est_status )";
        }
        
        if( strlen( $est_id ) > 0 ){
            $sql.= " AND est_id = $est_id";
        }
        
        if( strlen( $est_carne ) > 0 ){
            $sql.= " AND est_carne = $est_carne";
        }

        if( strlen( $est_usuario ) > 0 ){
            $sql.= " AND est_usuario = $est_usuario";
        }
        
        if( strlen( $est_nombre ) > 0 ){
            $sql.= " AND est_nombre = $est_nombre";
        }

        if( strlen( $est_apellido ) > 0 ){
            $sql.= " AND est_apellido = $est_apellido";
        }
        
        if( strlen( $est_fecha_nacimiento ) > 0 ){
            $sql.= " AND est_fecha_nacimiento = $est_fecha_nacimiento";
        }

        if( strlen( $est_grado ) > 0 ){
            $sql.= " AND est_grado = $est_grado";
        }

        
        if( strlen( $est_seccion ) > 0 ){
            $sql.= " AND est_seccion = $est_seccion";
        }
        if( strlen( $est_mail ) > 0 ){
            $sql.= " AND est_mail = $est_mail";
        }
        //echo $sql;
        $result = $this->db->query( $sql );
        return $result;
        
    }


   
}
?>