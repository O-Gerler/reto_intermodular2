// ciudad proviene de Balizas.js
const CardTiempo = async (ciudad) => {

  //Estos datos se deben extraer de la api y falta la imagen
  const {
    temp, 
    temp_max,
    temp_min,
    humedad,
    viento,
    precipitacion,
    stateSky
  } = await traerInfoCiudad(ciudad)

  const forecast = await traerForecastEuskalmet(ciudad)

  const dato = { temp, humedad, temp_max, temp_min, viento, precipitacion }

  let medidasHTML = ''

  //Comprobar las medidas seleccionadas en un objeto y en base a eso recorrerlo

  //Cambiar depende de que seleccione el usuario

  ciudad.medidasSeleccionadas.forEach(medida => {
    if (MEDIDAS[medida]) medidasHTML += Medida(MEDIDAS[medida], dato[medida], ciudad)
  })

  lucide.createIcons();

  return (
    `
      <div 
        class="mt-2 position-relative col-11 col-sm-6 col-xl-4 pb-3" 
        style="border-radius: 10px; background: #94d7fc; border: 5px solid white;color: #215AAC"
        title="${forecast}"
      >
        <div>
          <h2 class="px-4 m-0" style="font-size: 6rem; font-weight: 900;font-family: 'Montserrat', sans-serif;">
            ${temp.toFixed(1)}º</h2>
          <h3 class="px-4 mb-3 text-capitalize" style="font-size: 2.5rem; font-weight: 400; font-family: 'Assistant', sans-serif; margin-top: -15px; color:#183053">${ciudad.nombre}</h3>
        </div>
        <div 
          class="px-4 d-flex justify-content-start gap-2 flex-wrap"
          style="cursor:pointer"  
          onclick="mostrarModalSeleccionMedidas('${ciudad.nombre}')"
        >
          ${medidasHTML}
        </div>
      </div>
    `
  )
}

function mostrarModalSeleccionMedidas(nombreCiudad) {
  const modalSeleccionMedidasHTML = ModalSeleccionMedidas(nombreCiudad)
  document.getElementById('contenedorCardsTiempo').innerHTML += modalSeleccionMedidasHTML
  lucide.createIcons()
}

async function traerForecastEuskalmet(ciudad) {
  const token = 'eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCJ9.eyJhdWQiOiJtZXQwMS5hcGlrZXkiLCJpc3MiOiJJRVMgUExBSUFVTkRJIEJISSBJUlVOIiwiZXhwIjoyMjM4MTMxMDAyLCJ2ZXJzaW9uIjoiMS4wLjAiLCJpYXQiOjE2Mzk3NDc5MDcsImVtYWlsIjoiaWtjZmNAcGxhaWF1bmRpLm5ldCJ9.PwlkDxwtidWSjLo81yRgf6vITaU5yGDH1TgXAVf5Ijl07Bz8auOyQX3uMGiC8GhGiHHymNDBK1IoM3C1aeasdGngQsAMoS9jbiGNGNOhb9JthJnY778zPBxZ6EzlnZEuDFRDGZCRbB4IkyzQk677rP3Nt0v5GPU8g2F4uacpTCWwj0k_fQsCCfhNY89ECGV1pFMwJc_9m7Rezzxd6IMxLyir7MgaWWRGvGb1kH4XqBV_roBBSIO70j4P-p0udoZIuRKWrDZexrSeX9G_brJJplwzoI2eo8mQVX3u3uzn-9E2iystKe0IS3k6uLYiHnNuPQnCkIBUg3JAhu_q9V8iIg';

  const options = {
    method: 'GET',
    headers: {
      'Content-Type': 'application/json', 
      'Authorization': `Bearer ${token}`,
    },
  }

  const fechaHoy = new Date()
  const fechaHoyAnio = fechaHoy.getFullYear()
  const fechaHoyMes = fechaHoy.getMonth() + 1 < 10 
    ? `0${(fechaHoy.getMonth() + 1)}`
    : fechaHoy.getMonth() + 1
  const fechaHoyDia = fechaHoy.getDate() < 10 
    ? `0${(fechaHoy.getDate())}`
    : fechaHoy.getDate()
  const fechaHoyTodoJunto = `${fechaHoyAnio}${fechaHoyMes}${fechaHoyDia}`

  const apiUrl = `https://api.euskadi.eus/euskalmet/weather/regions/basque_country/zones/${ciudad.cod_zona}/locations/${ciudad.nombre}/forecast/at/${fechaHoyAnio}/${fechaHoyMes}/${fechaHoyDia}/for/${fechaHoyTodoJunto}`

  const response = await fetch(apiUrl, options)
  const data = await response.json()

  return data.forecastText.SPANISH
}

async function traerInfoCiudad(ciudad) {
  const apiUrl = `http://${urlActual}:8086/api/mediciones/${ciudad.id}`
  const options = {
    method: 'GET',
    headers: {
      'Content-Type': 'application/json', 
      'Authorization': `Bearer ${access_token}`,
    },
  }

  const response = await fetch(apiUrl, options)
  const data = await response.json()

  return data.mediciones[0]
}