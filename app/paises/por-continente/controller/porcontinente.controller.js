let buttonContainer = document.getElementById("button-container");
let paisesContainer = document.getElementById("paises-container");

let regiones = {
    Europa: "europe",
    America: "americas",
    Asia: "asia",
    Africa: "africa",
    Oceania: "ocean"
};

let countries = [];

let continentes = Object.keys(regiones);

for (let continente of continentes){
    let button = document.createElement('button');
    button.classList.add('btn', 'btn-outline-primary', 'm-1');
    button.innerText = continente;
    button.onclick = (evt) => onContinenteButtonClick(continente);

    buttonContainer.appendChild(button);
}

function onContinenteButtonClick(continente) {
    let buttons = buttonContainer.children;
    for (let button of buttons){
        if (button.innerText == continente) {
            if (button.classList.contains('active')) {
                button.classList.remove('active');
                // limpiar el paises container
                return;
            }

            button.classList.add('active');
            continue;
        }

        button.classList.remove('active');
    }

    requestCountriesData(continente);
}

async function requestCountriesData(continente) {
    let url = `https://restcountries.com/v3.1/region/${regiones[continente]}?fields=flag,flags,name,capital,population`;
    let respuesta = await fetch(url);
    await respuesta.json().then(paises => {
        console.log("Paises:", paises);
        countries = paises;
    })
    // respuesta.then( (paises) => {
    //     console.log("Paises:",paises);
    // } );
}

function renderizarPaises() {

}