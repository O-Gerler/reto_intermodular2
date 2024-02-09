const Balizas = async () => {

  if (ciudadesSeleccionadas.length === 0) {
    return (
      `
        <div 
          class="w-100 d-flex justify-content-center align-items-center"
          style="height: 90vh"
        >
          <h2>Aun no has seleccionado ninguna ciudad</h2>
        </div>
      `
    )
  }

  let cardsHTML = ''

  for (const ciudad of ciudadesSeleccionadas) {
    cardsHTML += await CardTiempo(ciudad);
  }

  return (
    `
    <div 
      id="contenedorCardsTiempo"
      class="w-100 d-flex justify-content-center justify-content-sm-start align-items-center flex-column flex-sm-row flex-wrap pt-4 position-relative pb-md-0"
      style="padding-bottom: 100px"
    >
      ${cardsHTML}
    </div>
    `
  )
}