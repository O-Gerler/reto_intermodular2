const PlanesSinLog = () => {

  let planesPreciosHtml = ''

  PRECIOS.forEach(precio => {
    planesPreciosHtml += CardPrecio(precio)
  })

  return (
    `
      <section id="planes" class="container mt-5">
        <h2>Nuestros planes y precio</h2>
        <p>Puedes contratar el mas adecuado para tus necesidades, cualquier pregunta ponte en contacto con nosotros</p>
        <div id="planesPrecios" class="row">
          ${planesPreciosHtml}
        </div>
        <h3 class="my-4">Preguntas frecuentes</h3>
        ${Accordion(PREGUNTAS)}
      </section>
    `
  )
}