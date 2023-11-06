// //validations
window.addEventListener( 'load', () => {
    table();
} );

const urlBase = 'http://localhost/colegio/SYSTEM/API/API_seccion.php';

function table(){
 
    var container = document.getElementById( 'container-table' );
    var codigo = document.getElementById( 'codigo' );
    var formData = new FormData();

    formData.append( 'request', 'table' );
    formData.append( 'sec_id', codigo.value );
    formData.append( 'sec_seccion', '' );

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

function save(){

    var grado = document.getElementById( 'codigoGrado' );
    var seccion = document.getElementById( 'seccion' );

    if( grado.value !== '' && seccion.value !== '' ){

        var formData = new FormData();
        formData.append( 'request', 'save' );
        formData.append( 'sec_grado', grado.value );
        formData.append( 'sec_seccion', seccion.value );

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
                        grado.value = '';
                        seccion.value = '';
                        table();
                    })
                }
            }
        )
        .catch( error => swal( "Error!", "Ha ocurrido un error en el servidor", "warning" ) )

    }else{

        
        swal( "Error!", "Debe llenar los campos Obligatorios", "info" ); 
    
    }
    
}


function select( gradoX ){
    var data = '';
    var codigo = document.getElementById( 'codigo' );
    var grado = document.getElementById( 'codigoGrado' );
    var seccion = document.getElementById( 'seccion' );
    var formData = new FormData();

    formData.append( 'request', 'select' );
    formData.append( 'gra_id', gradoX );

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
                grado.value = data.sec_grado,
                seccion.value = data.sec_seccion,
                codigo.value = data.sec_id,
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
    var grado = document.getElementById( 'codigoGrado' );
    var seccion = document.getElementById( 'seccion' );

    if( codigo!== '' && grado.value !== '' && seccion.value !== '' ){
        
        var formData = new FormData();
        formData.append( 'request', 'update' );
        formData.append( 'sec_id', codigo.value );
        formData.append( 'sec_grado', grado.value );
        formData.append( 'sec_seccion', seccion.value );

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
                        seccion.value = '';
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



function delete_( seccion ){


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
                formData.append( 'sec_id', seccion );

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
