document.addEventListener('DOMContentLoaded', function () {
    let paisContainer = document.getElementById("pais-container");
    
    const pathname = window.location.pathname;
    const segmentos = pathname.split('/');
    console.log(segmentos[4]);


    const cca3 = segmentos[4];
    console.log('CCA3:', cca3);
    requestPaisData(cca3)

            async function requestPaisData(cca3) {
                let url = `https://restcountries.com/v3.1/alpha/${cca3}`;
                let respuesta = await fetch(url);
                await respuesta.json().then(info => {
                    console.log("info:", info);
                    especifico = info;
                    console.info("Renderizando paises")
                    renderizarPais();
                })
            }

            function renderizarPais() {
                for (let opcion of especifico){
                    // Creando card
                    let cardDiv = document.createElement('div');
                    cardDiv.classList.add(
                        'card',
                        'border-primary',
                        'p-1',
                    );
            
                    // Creando la imagen
                    let img = document.createElement('img');
                    img.classList.add('card-img-top');
                    img.src = opcion.flags.svg;
                    img.alt = opcion.flags.alt;
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
                    h3.innerText = `${opcion.flag} ${opcion.name.common}`;
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
                        <div class="text-end">${opcion.name.official}</div>
                    `;
                    // Agregando officialDiv al namesDiv
                    namesDiv.appendChild(officialDiv);
            
                    // extraer el nombre nativo
                    let keys = Object.keys(opcion.name.nativeName);
                    let key = keys[keys.length -1];
                    let nativeName = opcion.name.nativeName[key].official;
            
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
                        <div class="text-end">${opcion.capital[0]}</div>
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
                        <div class="text-end">${opcion.population}</div>
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
        
            
                    paisContainer.appendChild(cardDiv);
                }
            }
});


