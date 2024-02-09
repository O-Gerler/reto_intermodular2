const Grafico = (ctx, contenedorPadre) => {
  const { municipio, medicion, fechaInicio } = ctx;

  const canvasId = `${municipio}_${medicion}_${fechaInicio}`;

  if (document.getElementById(canvasId) !== null) return false;

  const canvasElement = document.createElement('canvas');
  canvasElement.id = canvasId;
  contenedorPadre.appendChild(canvasElement);

  const canvasContext = canvasElement.getContext('2d');

  let apiUrl

  if(calcularDiferenciaFechas(fechaInicio) <= 1) apiUrl = `http://${urlActual}:8086/api/historico/${municipio}`
  if(calcularDiferenciaFechas(fechaInicio) <= 4 && calcularDiferenciaFechas(fechaInicio) > 1) 
    apiUrl = `http://${urlActual}:8086/api/historicoPorHoras/${municipio}/${fechaInicio}`
  if(calcularDiferenciaFechas(fechaInicio) > 4) 
    apiUrl = `http://${urlActual}:8086/api/historicoPorDias/${municipio}/${fechaInicio}`

  const options = {
    method: 'GET',
    headers: {
      'Content-Type': 'application/json',
      'Authorization': `Bearer ${access_token}`,
    },
  }

  fetch(apiUrl, options)
  .then(res => res.json())
  .then(data => {
      const arrayMediciones = []
      const arrayMedicionesFechas = []

      for (let objKey in data.registros) {
        let objInterno = data.registros[objKey]
        for (let objMedicion in objInterno) {
          if(objMedicion == medicion) {
            arrayMediciones.push(objInterno[objMedicion])
            arrayMedicionesFechas.push(`${objInterno['fecha']}_${objInterno['hora']}`)
          }
        }
      }

      new Chart(canvasContext, {
        type: "line",
        data: {
          labels: arrayMedicionesFechas,
          datasets: [
            {
              label: medicion,
              data: arrayMediciones,
              borderWidth: 1,
            },
          ],
        },
        options: {
          scales: {
            y: {
              beginAtZero: true,
            },
          },
          responsive: true,
        },
      });
    });
};

function calcularDiferenciaFechas(fechaInicioString) {
  const fechaInicio = new Date(fechaInicioString)
  const fechaFinal = new Date()

  let diferenciaEnMilisegundos = fechaFinal - fechaInicio;
  let diasDeDiferencia = diferenciaEnMilisegundos / (1000 * 60 * 60 * 24);

  diasDeDiferencia = Math.round(diasDeDiferencia);

  return diasDeDiferencia
}
