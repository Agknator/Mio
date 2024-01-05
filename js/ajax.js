const formularios_Ajax = document.querySelectorAll('.FormularioAjax') // Primero creo una constante del formulario

// Creacición de una funcion para un evento submit de un formulario
function enviar_formulario_ajax(e){
    e.preventDefault(); // Prevengo que se ejecute por default el formulario

    let enviar = confirm("Quieres enviar el formulario"); // Pongo una alerta para que se asegure de la subida

    // Crep ima condicional para hacer una petición ajax y promesas 
    if (enviar == true){
        // Recojo los datos acerca de donde se va a enviar en el formulario
        let dato = new FormData(this); // Clono los datos del formulario
        let metodo = this.getAttribute('method');
        let accion = this.getAttribute('action');
        let encabezados = new Headers(); // Clono los datos del encabezado
        // Creo un objeto que guarde lo que se envia sirve tanto por el metodo post y tal
        let config={
            method: metodo,
            headers: encabezados,
            mode: 'cors',
            cache: 'no-cache',
            body: dato
        };
        // Ejecuto la peticion ajax y hago sus respectivas promesas
        fetch(accion, config)
        .then(respuesta => respuesta.text())
        .then(respuesta => { 
            let contenedor=document.querySelector(".form-rest");
            contenedor.innerHTML = respuesta;
        });
    }
}

formularios_Ajax.forEach(formularios =>{
    formularios.addEventListener('submit', enviar_formulario_ajax);
});