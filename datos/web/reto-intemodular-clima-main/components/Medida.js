// Esta clase viene de CardTiempo.js

const Medida = (dato, valor, ciudad) => {

  const {dataIcono, unidad, nombre} = dato

  return (
    `
      <div 
        id="${ciudad.nombre}-${nombre}"
        class="d-flex p-2 px-3 justify-content-center align-items-center gap-3 ${!ciudad.medidasMostradas.includes(nombre) && 'd-none'}" 
        style="font-size: 2rem; background-color: #f0f0f0; border-radius: 7px; box-shadow:
        2.8px 2.8px 2.2px rgba(0, 0, 0, 0.02),
        6.7px 6.7px 5.3px rgba(0, 0, 0, 0.028),
        12.5px 12.5px 10px rgba(0, 0, 0, 0.035),
        22.3px 22.3px 17.9px rgba(0, 0, 0, 0.042),
        41.8px 41.8px 33.4px rgba(0, 0, 0, 0.05),
        100px 100px 80px rgba(0, 0, 0, 0.07)
      ;">
        <i style="transform:scale(1.5)" ${dataIcono}></i>
        <div class="d-flex flex-column justify-content-center align-items-start"
          style="font-family: 'rubik'"
        >
          <span style="font-size: 1.5rem; color: #183053"> ${parseFloat(valor).toFixed(2)}${unidad} </span>
          <span style="font-size: .8rem; color: #183053; margin-top: -5px">${nombre}</span>
        </div>
      </div>
    `
  )
}