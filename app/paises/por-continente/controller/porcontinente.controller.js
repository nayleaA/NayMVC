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
    clearPaisesContainer();
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
    let url = `https://restcountries.com/v3.1/region/${regiones[continente]}?fields=flag,flags,name,capital,population,cca3`;
    let respuesta = await fetch(url);
    await respuesta.json().then(paises => {
        console.log("Paises:", paises);
        countries = paises;
        console.info("Renderizando paises")
        renderizarPaises();
    })
    // respuesta.then( (paises) => {
    //     console.log("Paises:",paises);
    // } );
}

function renderizarPaises() {
    for (let country of countries){
        // Creando card
        let cardDiv = document.createElement('div');
        cardDiv.classList.add(
            'card',
            'border-primary',
            'p-1',
            'col-12',
            'col-sm-6',
            'col-md-6',
            'col-lg-4'
        );

        // Creando la imagen
        let img = document.createElement('img');
        img.classList.add('card-img-top');
        img.src = country.flags.svg;
        img.alt = country.flags.alt;
        // Agregando img al card
        cardDiv.appendChild(img);

        //Construyendo la sección de información (Nombre)
        let namesDiv = document.createElement('div');
        namesDiv.classList.add(
            'card',
            'p-1',
            'mt-2',
            'border-secondary'
        );
        // Agregando namesDiv al card
        cardDiv.appendChild(namesDiv);

        let h3 = document.createElement('h3');
        h3.classList.add('text-center');
        h3.innerText = `${country.flag} ${country.name.common}`;
        // Agregando h3 a namesDiv
        namesDiv.appendChild(h3);

        // Agregando la linea hr a namesDiv
        namesDiv.appendChild( document.createElement('hr') );

        // Creando div para el nombre oficial
        let officialDiv = document.createElement('div');
        officialDiv.classList.add(
            'd-flex',
            'justify-content-between'
        );
        officialDiv.innerHTML = `
            <div><strong>Official:</strong></div>
            <div class="text-end">${country.name.official}</div>
        `;
        // Agregando officialDiv al namesDiv
        namesDiv.appendChild(officialDiv);

        // extraer el nombre nativo
        let keys = Object.keys(country.name.nativeName);
        let key = keys[keys.length -1];
        let nativeName = country.name.nativeName[key].official;

        // Creando div para el nombre nativo
        let nativeDiv = document.createElement('div');
        nativeDiv.classList.add(
            'd-flex',
            'justify-content-between'
        );
        nativeDiv.innerHTML = `
            <div><strong>Native:</strong></div>
            <div class="text-end">${nativeName}</div>
        `;
        // Agregando nativeDiv al namesDiv
        namesDiv.appendChild(nativeDiv);

        // Creando div de capital
        let capitalDiv = document.createElement('div');
        capitalDiv.classList.add(
            'card',
            'p-1',
            'mt-2',
            'border-secondary'
        );
        // Agregando capitalDiv cardDiv
        cardDiv.appendChild(capitalDiv);

        // Creando div para el nombre de capital
        let capitalInfoDiv = document.createElement('div');
        capitalInfoDiv.classList.add(
            'd-flex',
            'justify-content-between'
        );
        capitalInfoDiv.innerHTML = `
            <div><strong>Capital:</strong></div>
            <div class="text-end">${country.capital[0]}</div>
        `;
        // Agregando capitalInfoDiv al capitalDiv
        capitalDiv.appendChild(capitalInfoDiv);

        // Creando div de población
        let populationDiv = document.createElement('div');
        populationDiv.classList.add(
            'card',
            'p-1',
            'mt-2',
            'border-secondary'
        );
        // Agregando populationDiv cardDiv
        cardDiv.appendChild(populationDiv);

        // Creando div para el nombre de capital
        let populationInfoDiv = document.createElement('div');
        populationInfoDiv.classList.add(
            'd-flex',
            'justify-content-between'
        );
        populationInfoDiv.innerHTML = `
            <div><strong>Population:</strong></div>
            <div class="text-end">${country.population}</div>
        `;
        // Agregando capitalInfoDiv al capitalDiv
        populationDiv.appendChild(populationInfoDiv);

        // Generar sección de botones
        let footerCardDiv = document.createElement('div');
        footerCardDiv.classList.add(
            'card-footer',
            'text-center'
        );
        // Agregar footerCardDiv al cardDiv
        cardDiv.appendChild(footerCardDiv);

        // Creando link 
        let link = document.createElement('a');
        link.classList.add(
            'btn',
            'btn-primary'
        );
        link.href = '/NayMVC/app-paises/ver-pais/' + country.cca3;
        link.innerText = 'Ver más...';
        // Agregando link al footer
        footerCardDiv.appendChild(link);

        paisesContainer.appendChild(cardDiv);
    }
}

function clearPaisesContainer() {
    paisesContainer.innerHTML = '';
}