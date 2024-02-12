const Aside = () => {
  return (
    `
      <aside
        class="col-md-3 col-xl-2 d-none d-md-flex justify-content-between align-items-center flex-column"
      >
        <h2 style="font-family: 'Montserrat', sans-serif; color: white">
          EuskoClima
        </h2>
        <ul>
          <li
            style="font-size: 1.35rem; border-radius: 10px"
            class="mt-1 px-3 py-2 btn-mapa activo"
            onclick="navegarMapa()"
          >
            <i class="fa-solid fa-map-location-dot"></i>
            <span class="p-2">Mapa</span>
          </li>
          <li
            style="font-size: 1.35rem; border-radius: 10px"
            class="mt-1 px-3 py-2 btn-balizas"
            onclick="navegarBalizas()"
          >
            <i class="fa-solid fa-location-dot"></i>
            <span class="p-2">Balizas</span>
          </li>
          <li
            style="font-size: 1.35rem; border-radius: 10px"
            class="mt-1 px-3 py-2 btn-graficos"
            onclick="navegarGraficos()"
          >
            <i class="fa-solid fa-chart-line"></i>
            <span class="p-2">Graficos</span>
          </li>
        </ul>
        <p
          class="w-100 text-center py-3"
          onclick="cerrarSesion()"
          style="border-top: 1px solid white; cursor: pointer; color: white"
        ><i class="fa-solid fa-right-from-bracket"></i> Cerrar Sesión</p>
      </aside>
      <footer 
        class="d-block d-md-none position-absolute py-1 w-100" style="bottom: 0%;"
      >
        <ul class="d-flex justify-content-evenly" >
          <li
            style="font-size: 2rem; border-radius: 50%"
            class="mt-1 p-2 px-sm-4 py-sm-3 btn-mapa activo"
            onclick="navegarMapa()"
          >
            <i class="fa-solid fa-map-location-dot"></i>
          </li>
          <li
            style="font-size: 2rem; border-radius: 50%"
            class="mt-1 p-2 px-3 px-sm-4 py-sm-3 btn-balizas"
            onclick="navegarBalizas()"
          >
            <i class="fa-solid fa-location-dot"></i>
          </li>
          <li
            style="font-size: 2rem; border-radius: 50%"
            class="mt-1 p-2 px-3 px-sm-4 py-sm-3 btn-graficos"
            onclick="navegarGraficos()"
          >
            <i class="fa-solid fa-chart-line"></i>
          </li>
          <li
            style="font-size: 2rem; border-radius: 50%;"
            class="mt-1 p-2 px-sm-4 py-sm-3"
            onclick="cerrarSesion()"
          >
            <i class="fa-solid fa-right-from-bracket"></i>
          </li>
        </ul>
      </footer>
    `
  )
}

const borrarClaseActivo = () => {
  const navItems = document.querySelectorAll('aside li')
  navItems.forEach(item => item.classList.remove('activo'))

  const footerItems = document.querySelectorAll('footer li')
  footerItems.forEach(item => item.classList.remove('activo'))
}

const navegarMapa = () => {
  clearInterval(intervaloBalizas)
  limpiarPaginaConLog()
  borrarClaseActivo()
  const btnBalizas = document.querySelectorAll('.btn-mapa')
  btnBalizas.forEach( btn => btn.classList.add('activo') )
  Mapa()
}

const navegarBalizas = async () => {
  if (intervaloBalizas) {
    clearInterval(intervaloBalizas);
  }
  limpiarPaginaConLog()
  borrarClaseActivo()
  const btnBalizas = document.querySelectorAll('.btn-balizas')
  btnBalizas.forEach( btn => btn.classList.add('activo'))
  document.getElementById('balizas').innerHTML = await Balizas()
  lucide.createIcons()
  // $(document).tooltip(); No consigo que funcione porque jquery necesita tener el objeto creado desde un inicio y como se van creando dinamicamente da error
  intervaloBalizas = setInterval(async () => {
    document.getElementById('balizas').innerHTML = await Balizas()
    lucide.createIcons()
  }, 15000)
}

const navegarGraficos = () => {
  clearInterval(intervaloBalizas)
  limpiarPaginaConLog()
  borrarClaseActivo()
  const btnBalizas = document.querySelectorAll('.btn-graficos')
  btnBalizas.forEach( btn => btn.classList.add('activo') )
  document.getElementById('graficos').innerHTML = Graficos()
  if (graficos.length > 0) {
    const padre = document.getElementById('contenedorGraficosCanvas')
    graficos.forEach((grafico) => {
      const datosGrafico = {
        municipio: grafico.municipio,
        medicion: grafico.medicion,
        fechaInicio: grafico.fechaInicio,
        fechaFin: grafico.fechaFin,
      }
      Grafico(datosGrafico, padre);
    });
  }
}

const navegarPerfil = () => {
  clearInterval(intervaloBalizas)
  limpiarPaginaConLog()
  borrarClaseActivo()
  const btnBalizas = document.querySelectorAll('.btn-perfil')
  btnBalizas.forEach( btn => btn.classList.add('activo') )
  // Mapa()
}

const cerrarSesion = () => {
  clearInterval(intervaloBalizas)
  console.log('adios')
  const apiUrl = `http://${urlActual}:8086/api/logout`
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
      borrarPaginaConLogin()
      cargarPaginaSinLogin()
      access_token = ''
    })
}