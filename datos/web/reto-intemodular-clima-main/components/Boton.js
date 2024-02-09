const Boton = (texto, color, funcion, clases = '') => {
  return (
    `
      <p 
        class="text-center py-2 fw-bold text-uppercase ${clases}"
        style="border: 2px solid white; background-color:${color}; cursor:pointer; color:white;"
        onclick="${funcion}"
      >
        ${texto}
      </p>
    `
  )
}