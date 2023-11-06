<?php

    require_once( '../module_clases.php' );

    //error_reporting(0);

    $size = $_FILES[ "file" ][ "size" ];
    $file = $_FILES[ "file" ][ "name" ];
    $type = $_FILES[ "file" ][ "type" ];

	$codigoAlumno = $_REQUEST[ 'codigoAlumno' ];
	$tipoDocumento = $_REQUEST[ 'tipoDocumento' ];

    $arrResponse = array();

    if ( $file != "" && $codigoAlumno != '' ) {

        $ClsDocAl = new documento_alumno();
        $ext = pathinfo( $file, PATHINFO_EXTENSION ); 
        $stringFile = str_shuffle( $codigoAlumno.uniqid() ) . '.' . $ext;
        
        $idFile = $ClsDocAl->generateId();
        $id = $idFile->fetch_object()->max;
        $id++;
        $result = $ClsDocAl->save( $id, $codigoAlumno, $tipoDocumento, $stringFile );

        if( $result ){
            
            $path =  "../FILES/STUDENT/" . $stringFile;

            if ( move_uploaded_file( $_FILES[ 'file' ][ 'tmp_name' ], $path ) ) {
                
                $arrResponse = array(
                    "status" => true,
                    "data" 	=> [],
                    "codeImage" => $id,
                    "message" => "Archivo subido Exitosamente"
                );

                header('Location: documentosAlumnos.php?estudiante=' . $codigoAlumno);


            } else {
                
                $arrResponse = array(
                    "status" => false,
                    "data" => [],
                    "message" => "Error al subir el archivo"
                );
            
            }
        } else {
			
            $arrResponse = array(
                "status" => false,
                "data" 	=> [],
                "message" => "Verificar Valores"
            );
            
		
        }
	} else {
        
        $arrResponse = array(
            "status" => false,
            "data" 	=> [],
            "message" => "Archivo vacio"
        );
        
    }

    echo json_encode( $arrResponse );


?>
    