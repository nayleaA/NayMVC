let paisesContainer = document.getElementById("paises-container");

function onKeyPress(evt) {
    if(evt.key == "Enter") {
        clearContainer(paisesContainer);
        let textoIngresado = evt.target.value;
        console.log(textoIngresado); 

        textoIngresado = textoIngresado.trim();//Trim elimina los espacios al inicio y al final *Checar expresiones regulares para eliminar espacios intermedios en un string
        if(textoIngresado === '') {
            return;
        }
        requestData(textoIngresado);

    }
}

async function requestData(countryName){
    let url = `https://restcountries.com/v3.1/name/${countryName}?fields=name,flag,flags,cca3,capital,population`;
    let respuesta = await fetch(url);
    await respuesta.json().then (
        (paises) => {
            renderizarPaises(paisesContainer,paises);
        }
    ).catch( error =>{
        alert("Ha ocurrido un error" + error.message.message);
    });
}