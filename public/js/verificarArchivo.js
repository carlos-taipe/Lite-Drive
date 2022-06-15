//Verificar el archivo para que pueda ser guardado.
function verificarArchivo(){

    let archivo = document.getElementById('archivo');
    
    if(archivo.files && archivo.files.length == 1){

        //Constantes para tamaño máximo y extension permitida.
        const tamañoMaximo = 2000000;
        const extensionesPermitidas = ['pdf','jpg','jpeg','png','svg','webp'];
        
        //Se obtiene el nombre del archivo para poder obtener su extension
        let nombreArchivo = document.querySelector('#archivo').value;

        let tamañoArchivo = archivo.files[0].size;
        let extensionArchivo = nombreArchivo.split('.').pop();

        //Verificamos tamaño
        if( tamañoArchivo > tamañoMaximo){
            alert('El archivo es muy grande, como máximo 2MB.');
            return false;
        }

        //Verficamos extension disponible
        if(!extensionesPermitidas.includes(extensionArchivo)){
            alert('Formato de archivo inválido, solo se permite pdf, jpg, jpeg, png, svg y webp.');
            return false;
        }

        return true;
    }

    

}