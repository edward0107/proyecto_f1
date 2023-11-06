
// //validations
window.addEventListener( 'load', () => {
    // table();
} );

const urlBase = 'http://localhost/colegio/SYSTEM/API/API_estudiante.php';

function table(){
 
    var container = document.getElementById( 'container-table' );
    var codigo = document.getElementById( 'codigo' );
    var formData = new FormData();

    formData.append( 'request', 'table' );
    formData.append( 'gra_id', codigo.value );
    formData.append( 'grad_nivel', '' );
    formData.append( 'grad_grado', '' );

    fetch( urlBase, {
        method: 'POST', 
        body: formData,
    } )
    .then( response => response.json() )
    .then(
        response => {
        
            if( response.status !== true ){
                swal("Error!", response.message, "info")   
            }else{
                container.innerHTML = response.data
                // $( '#dataTables-example' ).DataTable({
                //     responsive: true
                // });
            }

        }
    )
    .catch( error =>  swal( "Error!", "Ha ocurrido un error en el servidor", "warning" ) )


}
function redirect(){
    codigoAlumno = document.getElementById('codigoAlumno');
    window.location.href = 'encargadosAlumnos.php?estudiante=' + codigoAlumno.value;

}
function save(){

    var carne = document.getElementById( 'carne' );
    var nombre = document.getElementById( 'nombre' );
    var apellido = document.getElementById( 'apellido' );
    var fechaNacimiento = document.getElementById( 'fechaNacimiento' );
    var grado = document.getElementById( 'grado' );
    var seccion = document.getElementById( 'seccion' );
    var mail = document.getElementById( 'mail' );


    if( nombre.value !== '' && mail.value !== '' ){

        var formData = new FormData();
        formData.append( 'request', 'save' );
        formData.append( 'est_carne', carne.value );
        formData.append( 'est_nombre', nombre.value );
        formData.append( 'est_apellido', apellido.value );
        formData.append( 'est_fecha_nacimiento', fechaNacimiento.value );
        formData.append( 'est_grado', grado.value );
        formData.append( 'est_seccion', seccion.value );
        formData.append( 'est_mail', mail.value );
        

        fetch( urlBase, {
            method: 'POST', 
            body: formData,
        } )
        .then( 
            response => response.json()
        )
        .then( 
            response => {
                if( response.status !== true ){
                    swal("Error!", response.message, "info")   
                }else{
                    swal("Excelente!", response.message, "success").then((value) => {
                        carne.value = '';
                        nombre.value = '';
                        apellido.value = '';
                        fechaNacimiento.value = '';
                        grado.value = '';
                        seccion.value = '';
                        mail.value = '';
                        window.location.href = 'documentosAlumnos.php?estudiante=' + response.data;
                    })
                }
            }
        )
        .catch( error => swal( "Error!", "Ha ocurrido un error en el servidor", "warning" ) )

    }else{

        
        swal( "Error!", "Debe llenar los campos Obligatorios", "info" ); 
    
    }
    
}


function aprobacionIncripcion( estudiante ){
    if( estudiante.value !== '' ){

        var formData = new FormData();
        formData.append( 'request', 'update_incripcion' );
        formData.append( 'est_id', estudiante );

        fetch( urlBase, {
            method: 'POST', 
            body: formData,
        } )
        .then( 
            response => response.json()
        )
        .then( 
            response => {
                if( response.status !== true ){
                    swal("Error!", response.message, "info")   
                }else{
                    swal("Excelente!", response.message, "success").then((value) => {
                        window.location.reload();
                    })
                }
            }
        )
        .catch( error => swal( "Error!", "Ha ocurrido un error en el servidor", "warning" ) )

    }else{

        
        swal( "Error!", "Debe llenar los campos Obligatorios", "info" ); 
    
    }
    
}

function select( grado ){
    var data = '';
    var codigo = document.getElementById( 'codigo' );
    var gradox = document.getElementById( 'grado' );
    var nivel = document.getElementById( 'nivel' );
    var formData = new FormData();

    formData.append( 'request', 'select' );
    formData.append( 'gra_id', grado );

    fetch( urlBase, {
        method: 'POST', 
        body: formData,
    } )
    .then( response => response.json() )
    .then( 
        response => {
            if( response.status !== true ){
                swal("Error!", response.message, "info")   
            }else{
                data = response.data,
                gradox.value = data.grad_grado,
                nivel.value = data.grad_nivel,
                codigo.value = data.grad_id,
                table(),
                changeButtons(2)
                //console.log( data )
            }
        }    
    )
    .catch( error =>  swal( "Error!", "Ha ocurrido un error en el servidor", "warning" ) )

}

function changeButtons(situation) {
    var dbtnUpdate = document.getElementById('update');
    var btnSave = document.getElementById('save');
    
    switch (situation) {
        case 1:
            btnSave.classList.remove('disabled');
            dbtnUpdate.classList.add('disabled');
            break;
        case 2:
            btnSave.classList.add('disabled');
            dbtnUpdate.classList.remove('disabled');
            break;
    }
}

function update(){

    var codigo = document.getElementById( 'codigo' );
    var grado = document.getElementById( 'grado' );
    var nivel = document.getElementById( 'nivel' );

    if( codigo!== '' && grado.value !== '' && nivel.value !== '' ){
        
        var formData = new FormData();
        formData.append( 'request', 'update' );
        formData.append( 'grad_id', codigo.value );
        formData.append( 'grad_nivel', nivel.value );
        formData.append( 'grad_grado', grado.value );

        fetch( urlBase, {
            method: 'POST', 
            body: formData,
        } )
        .then( response => response.json() )
        .then( 

            response => {
                if( response.status !== true ){
                    swal("Error!", response.message, "info")   
                }else{
                    swal("Excelente!", response.message, "success").then((value) => {
                        codigo.value = '';
                        grado.value = '';
                        nivel.value = '';
                        table();
                        changeButtons( 1 )
                    })
                }
            }
            
        )
        .catch( error =>  swal( "Error!", "Ha ocurrido un error en el servidor", "warning" ) )

    }else{
        swal( "Error!", "Debe llenar los campos Obligatorios", "info" ); 
    
    }

}



function delete_( grado ){


    swal({
        title: "Esta Seguro?",
        text: "Desea eliminar?",
        icon: "warning",
        buttons: {
            cancel: "Cancelar",
            ok: {
                text: "Aceptar",
                value: true,
            },
        },
    }).then((value) => {
        switch (value) {
            case true:
                var formData = new FormData();

                formData.append( 'request', 'delete' );
                formData.append( 'grad_id', grado );

                fetch( urlBase, {
                    method: 'POST', 
                    body: formData,
                } )
                .then( response => response.json() )
                .then( 

                    response => {
                        if( response.status !== true ){
                            swal("Error!", response.message, "info")   
                        }else{
                            swal("Excelente!", response.message, "success").then((value) => {
                                table();
                                changeButtons( 1 )
                            })
                        }
                    }
                    
                )
                .catch( error =>  swal( "Error!", "Ha ocurrido un error en el servidor", "warning" ) )
                break;

            default:
                swal("", "Accion Cancelada...", "info");
        }
    });
    
}
