<?php
require_once( 'clsConex.php' );

class seccion{

    private $db;

    public function __construct() {
		$this->db = Database::connect();
	}
 
    function get( $sec_id = '', $sec_grado = '', $sec_seccion ){

        $sql = '';
        $sql.= "SELECT *";
        $sql.= " FROM seccion";
        $sql.= " INNER JOIN grado";
        $sql.= " ON grad_id = sec_grado";
        $sql.= " WHERE 1 = 1";
        
        if( strlen( $sec_id ) > 0 ){
            $sql.= " AND sec_id = $sec_id";
        }
        
        if( strlen( $sec_grado ) > 0 ){
            $sql.= " AND sec_grado = $sec_grado";
        }
        
        if( strlen( $sec_seccion ) > 0 ){
            $sql.= " AND sec_seccion = $sec_seccion"; 
        }
        //echo $sql;
        $result = $this->db->query( $sql );
        return $result;
        
    }

    function save( $sec_id, $sec_grado, $sec_seccion ){

        $sql = "";
        $sql.= "INSERT INTO seccion";
        $sql.= " VALUES ( $sec_id, $sec_grado, '$sec_seccion' );";
        //echo $sql;
        $save = $this->db->query( $sql );

		$result = false;
		if( $save ){
			$result = true;
		}
		return $result;
    
    }

    function update( $sec_id, $sec_grado, $sec_seccion ){

        $sql = "";
        $sql.= "UPDATE seccion";
        $sql.= " SET sec_seccion = '$sec_seccion',";
        $sql.= " sec_grado = $sec_grado";
        $sql.= " WHERE sec_id = $sec_id ";
     //   echo $sql;
        $save = $this->db->query( $sql );

		$result = false;
		if( $save ){
			$result = true;
		}
		return $result;
    
    }

    function delete( $sec_id ){

        $sql = "";
        $sql.= "DELETE FROM seccion";
        $sql.= " WHERE sec_id = $sec_id ";
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
        $sql = "SELECT max( sec_id ) as max ";
		$sql.= " FROM seccion;";
        $max = $this->db->query( $sql );
        return $max;
   
    }

   
}
?>