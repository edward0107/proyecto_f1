// //validations
window.addEventListener( 'load', () => {
} );

const urlBase = 'http://localhost/colegio/SYSTEM/API/API_pago.php';


function save(){

    var codigoPago = document.getElementById( 'codigoPago' );
    var boleta = document.getElementById( 'boleta' );
    var cantidad = document.getElementById( 'cantidad' );


    if( codigoPago.value !== '' && boleta.value !== '' ){

        var formData = new FormData();
        formData.append( 'request', 'save' );
        formData.append( 'pd_pago', codigoPago.value );
        formData.append( 'pd_boleta_numero', boleta.value );
        formData.append( 'pd_cantidad', cantidad.value );


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
                        codigoPago.value = '';
                        boleta.value = '';
                        cantidad.value = '';
                        window.location.href = 'pagos.php';

                    })
                }
            }
        )
        .catch( error => swal( "Error!", "Ha ocurrido un error en el servidor", "warning" ) )

    }else{

        
        swal( "Error!", "Debe llenar los campos Obligatorios", "info" ); 
    
    }
    
}


