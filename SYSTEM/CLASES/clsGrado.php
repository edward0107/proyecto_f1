<?php
require_once( 'clsConex.php' );

class grado{

    private $db;

    public function __construct() {
		$this->db = Database::connect();
	}
 
    function get( $grad_id = '', $grad_nivel = '', $grad_grado ){

        $sql = '';
        $sql.= "SELECT *";
        $sql.= " FROM grado";
        $sql.= " WHERE 1 = 1";
        
        if( strlen( $grad_id ) > 0 ){
            $sql.= " AND grad_id = $grad_id";
        }
        
        if( strlen( $grad_nivel ) > 0 ){
            $sql.= " AND grad_nivel = $grad_nivel";
        }
        
        if( strlen( $grad_grado ) > 0 ){
            $sql.= " AND grad_grado = $grad_grado"; 
        }
        //echo $sql;
        $result = $this->db->query( $sql );
        return $result;
        
    }

    function save( $grad_id, $grad_nivel, $grad_grado ){

        $sql = "";
        $sql.= "INSERT INTO grado";
        $sql.= " VALUES ( $grad_id, $grad_nivel, '$grad_grado' );";
        //echo $sql;
        $save = $this->db->query( $sql );

		$result = false;
		if( $save ){
			$result = true;
		}
		return $result;
    
    }

    function update( $grad_id, $grad_nivel, $grad_grado ){

        $sql = "";
        $sql.= "UPDATE grado";
        $sql.= " SET grad_grado = '$grad_grado',";
        $sql.= " grad_nivel = '$grad_nivel'";
        $sql.= " WHERE grad_id = $grad_id ";
     //   echo $sql;
        $save = $this->db->query( $sql );

		$result = false;
		if( $save ){
			$result = true;
		}
		return $result;
    
    }

    function delete( $grad_id ){

        $sql = "";
        $sql.= "DELETE FROM grado";
        $sql.= " WHERE grad_id = $grad_id ";
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
        $sql = "SELECT max( grad_id ) as max ";
		$sql.= " FROM grado;";
        $max = $this->db->query( $sql );
        return $max;
   
    }

   
}
?>