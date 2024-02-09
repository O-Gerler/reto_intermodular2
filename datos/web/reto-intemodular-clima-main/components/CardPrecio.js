const CardPrecio = (contrato) => {
  const {nombre, cantidad, comentario, precio, tiempo, ventajas} = contrato

  let htmlVentajas = ''

  ventajas.forEach(ventaja => {
    htmlVentajas += `<div class="d-flex fw-normal gap-2 align-items-center"><i class="fa-solid fa-check "></i><p>${ventaja}</p></div>`
  })

  return (
    `
      <div class="cartaPrecio d-flex flex-column align-items-center gap-2 col-12 col-md-6 col-lg-4">
        <div class="header">
          <div class="d-flex align-items-center justify-content-between">
            <h3>${nombre}</h3>
            <div>
              <i class="fa-solid fa-users"></i>
              <span>${cantidad}</span>
            </div>
          </div>
          <p class="mt-3">${comentario}</p>
        </div>
        <p><span>${precio}€</span>${tiempo}</p>
        <button class="btn" onclick="cargarLoginRegister()">Registrate</button>
        <div class="mt-4 w-100">
          ${htmlVentajas}
        </div>
        <div class="text-center mt-3" style="cursor: pointer;"><span id="saberMas" style="border-bottom: 1px solid black;">Saber más</span></div>
      </div>
    `
  )
}