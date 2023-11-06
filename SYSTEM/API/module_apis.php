<?php 
require_once( '../CLASES/ClsUser.php' );
require_once( '../CLASES/clsGrado.php' );
require_once( '../CLASES/clsSeccion.php' );
require_once( '../CLASES/clsEstudiante.php' );
require_once( '../CLASES/clsDocumentoAlumno.php' );
require_once( '../CLASES/clsPago.php' );
require_once( '../CLASES/ClsPagosDetalle.php' );
require_once( '../CLASES/clsDocente.php' );








function tabla_grados( $grad_id, $grad_nivel, $grad_grado  ){
    $ClsGrado = new grado();
    $grados = $ClsGrado->get( $grad_id, $grad_nivel, $grad_grado );
    $output = '';
    if ( $grados->num_rows == 0 ){
        //no data
        $output.= '<div class="alert alert-info">';
        $output.= ' Sin datos Existentes';
        $output.= '</div>';
    }else{
        $output.= '<table class="table table-striped table-bordered table-hover" id="dataTables-example">';
        $output.= '    <thead>';
        $output.= '        <tr>';
        $output.= '            <th>Codigo</th>';
        $output.= '            <th>Nivel</th>';
        $output.= '            <th>Grado</th>';
        $output.= '        </tr>';
        $output.= '    </thead>';
        $output.= '    <tbody>';
        $category = '';
        $i = 1;
        while ( $grado = $grados->fetch_object() ){
            $grad_id = $grado->grad_id;  
            $grad_nivel = $grado->grad_nivel;  
            $grad_grado = $grado->grad_grado;  
            switch( $grad_nivel ){
                case 1:
                    $nivel = 'PRIMARIA';
                break;
                case 2:
                    $nivel = 'BASICOS';
                break;
                case 3:
                    $nivel = 'DIVERISFICADO';
                break;
            }
            $output.= '        <tr class="odd gradeX">';
            $output.= '            <td> '. $i . ' </td>';
            $output.= '            <td> '. $nivel . ' </td>';
            $output.= '            <td> '. utf8_decode( $grad_grado ) . ' </td>';
            $output.= '            <td>';
            $output.= '                 <button title="Seleccionar" class="btn btn-primary" onclick="select( ' . $grad_id . ' );"><i class="fa fa fa-pencil-square-o" aria-hidden="true"></i></button>';
            $output.= '                 <button title="Eliminar" class="btn btn-danger"  onclick="delete_( ' . $grad_id . ' );"><i class="fa fa fa-trash-o" aria-hidden="true"></i></button>';
            $output.= '                 <a title="Agregar Secciones" class="btn btn-info" href="secciones.php?grado=' . $grad_id . '"><i class="fa fa-list" aria-hidden="true"></i></a>';
            $output.= '            </td>';
            $output.= '        </tr>';
            $i++;
        }
        
        $output.= '    </tbody>';
        $output.= '</table>';
    }
    
    return $output;
}

function tabla_secciones( $sec_id, $sec_grado, $sec_seccion  ){
    $ClsSeccion = new seccion();
    $grados = $ClsSeccion->get( $sec_id, $sec_grado, $sec_seccion );
    $output = '';
    if ( $grados->num_rows == 0 ){
        //no data
        $output.= '<div class="alert alert-info">';
        $output.= ' Sin datos Existentes';
        $output.= '</div>';
    }else{
        $output.= '<table class="table table-striped table-bordered table-hover" id="dataTables-example">';
        $output.= '    <thead>';
        $output.= '        <tr>';
        $output.= '            <th>Codigo</th>';
        $output.= '            <th>Grado</th>';
        $output.= '            <th>Seccion</th>';
        $output.= '        </tr>';
        $output.= '    </thead>';
        $output.= '    <tbody>';
        $category = '';
        $i = 1;
        while ( $grado = $grados->fetch_object() ){
            $sec_id = $grado->sec_id;  
            $sec_grado = $grado->grad_grado;  
            $sec_seccion = $grado->sec_seccion;  
            
            $output.= '        <tr class="odd gradeX">';
            $output.= '            <td> '. $i . ' </td>';
            $output.= '            <td> '. $sec_grado . ' </td>';
            $output.= '            <td> '. utf8_decode( $sec_seccion ) . ' </td>';
            $output.= '            <td>';
            $output.= '                 <button title="Seleccionar" class="btn btn-primary" onclick="select( ' . $sec_id . ' );"><i class="fa fa fa-pencil-square-o" aria-hidden="true"></i></button>';
            $output.= '                 <button title="Eliminar" class="btn btn-danger"  onclick="delete_( ' . $sec_id . ' );"><i class="fa fas fa-solid fa-user"></i></button>';
            $output.= '                 <button title="Asignar Maestro" class="btn btn-success"  onclick="delete_( ' . $sec_id . ' );"><i class="fa-solid fa-bars"></i></button>';
            $output.= '            </td>';
            $output.= '        </tr>';
            $i++;
        }
        
        $output.= '    </tbody>';
        $output.= '</table>';
    }
    
    return $output;
}


function tabla_personal( $per_id  ){
    $ClsDoc = new docente();
    $docentes = $ClsDoc->get( $per_id );
    $output = '';
    if ( $docentes->num_rows == 0 ){
        //no data
        $output.= '<div class="alert alert-info">';
        $output.= ' Sin datos Existentes';
        $output.= '</div>';
    }else{
        $output.= '<table class="table table-striped table-bordered table-hover" id="dataTables-example">';
        $output.= '    <thead>';
        $output.= '        <tr>';
        $output.= '            <th>Codigo</th>';
        $output.= '            <th>Carne</th>';
        $output.= '            <th>Nombre</th>';
        $output.= '            <th>Apellido</th>';
        $output.= '            <th>Email</th>';
        $output.= '        </tr>';
        $output.= '    </thead>';
        $output.= '    <tbody>';
        $category = '';
        $i = 1;
        while ( $docente = $docentes->fetch_object() ){
            $per_id  = $docente->per_id ;  
            $per_carne = $docente->per_carne;  
            $per_usuario  = $docente->per_usuario ;
            $per_nombre = $docente->per_nombre;  
            $per_apellido = $docente->per_apellido;  
            $per_fecha_nacimiento = $docente->per_fecha_nacimiento;
            $per_mail = $docente->per_mail;  
           
            
            $output.= '        <tr class="odd gradeX">';
            $output.= '            <td> '. $i . ' </td>';
            $output.= '            <td> '. $per_carne . ' </td>';
            $output.= '            <td> '. $per_nombre . ' </td>';
            $output.= '            <td> '. $per_apellido . ' </td>';
            $output.= '            <td> '. $per_mail . ' </td>';
            $output.= '            <td>';
            $output.= '                 <button title="Seleccionar" class="btn btn-primary" onclick="select( ' . $per_id . ' );"><i class="fa fa fa-pencil-square-o" aria-hidden="true"></i></button>';
            $output.= '                 <button title="Eliminar" class="btn btn-danger"  onclick="delete_( ' . $per_id . ' );"><i class="fa fa fa-trash-o" aria-hidden="true"></i></button>';
            $output.= '            </td>';
            $output.= '        </tr>';
            $i++;
        }
        
        $output.= '    </tbody>';
        $output.= '</table>';
    }
    
    return $output;
}



?>
