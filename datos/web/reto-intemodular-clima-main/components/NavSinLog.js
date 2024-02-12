const euskoclima = () => {
  location = '#principal'
}

const planes = () => {
  location = '#planes'
}

const sobreNosotros = () => {
  location = '#sobreNosotros'
}

const contacto = () => {
  location = '#contacto'
}

const mostrarMenuMovil = () => {
  const menuMovil = $('#menu-movil');
  setTimeout(() => {
    menuMovil.toggleClass('desplazar');
    menuMovil.toggleClass('ocultar');
  }, 100);
};


const NavSinLog = () => {
  return (
    `
      <header>
        <nav class="container d-flex justify-content-between align-items-center py-3 mt-0">
          <ul class="d-none d-lg-flex gap-5">
            <li class="link-nav" onclick="euskoclima()">EuskoClima</li>
            <li class="link-nav" onclick="planes()">Planes</li>
            <li class="link-nav" onclick="sobreNosotros()">Sobre Nosotros</li>
            <li class="link-nav" onclick="contacto()">Contacto</li>
          </ul>
          <p class="d-block d-lg-none btn-menu-movil"><i onclick="mostrarMenuMovil()" class="fa-solid fa-bars"></i></p>
          <div id="usuario" class="d-flex align-items-center gap-3" onclick="cargarLoginRegister()">
            <i style="color: white" class="fa-solid fa-user"></i>
            <p id="iniciarSesion">Iniciar Sesion</p>
          </div>
        </nav>
      </header>
      <div id="menu-movil" class="ocultar d-lg-none">
        <nav class="container d-flex justify-content-between align-items-center py-3 mt-0">
          <p class="btn-menu-movil"><i onclick="mostrarMenuMovil()" class="fa-solid fa-x"></i></p>
        </nav>
        <ul style="height:80%" class="d-flex d-lg-none gap-5 container flex-column justify-content-center align-items-center">
          <li class="link-nav" onclick="prueba()">EuskoClima</li>
          <li class="link-nav">Sobre Nosotros</li>
          <li class="link-nav">Planes</li>
          <li class="link-nav">Contacto</li>
        </ul>
      </div>
    `);
};