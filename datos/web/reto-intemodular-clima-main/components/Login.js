const alternarLoginRegister = () => {
  const fondoLogin = $('#fondo-login')
  const formRegister = $('#form-register')
  const formLogin = $('#form-login')
  fondoLogin.toggleClass('mover-login')
  setTimeout(() => {
    formRegister.toggleClass('d-none')
    formLogin.toggleClass('d-none')
  }, 500);
}

const iniciarSesion = e => {
  e.preventDefault()

  const apiUrl = `http://${urlActual}:8086/api/login`

  const email = document.getElementById('inicioSesionEmail').value
  const password = document.getElementById('inicioSesionPassword').value

  const options = {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json', 
    },
    body: JSON.stringify({ email, password }),
  }

  fetch(apiUrl, options)
    .then(res => res.json())
    .then(data => {
      if(data.access_token) {
        access_token = data.access_token
        obtenerLocalizaciones()
      }
    })
}

const registrarse = e => {
  e.preventDefault()
  
  const apiUrl = `http://${urlActual}:8086/api/register`
  console.log(apiUrl)

  const name = document.getElementById('registroName').value
  const email = document.getElementById('registroEmail').value
  const password = document.getElementById('registroPassword').value
  const password_confirmation = document.getElementById('registroPasswordConfirmation').value

  const options = {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json', 
    },
    body: JSON.stringify({ name, email, password, password_confirmation }),
  }

  fetch(apiUrl, options)
    .then(res => res.json())
    .then(data => {
      if(data.access_token) {
        access_token = data.access_token
        obtenerLocalizaciones()
      }
    })
}

const obtenerLocalizaciones = () => {
  const apiUrl = `http://${urlActual}:8086/api/localizaciones`
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
      localizaciones = data.localizaciones
      borrarLoginRegister()
      borrarPaginaSinLogin()
      cargarPaginaConLogin()
    })
}

const Login = () => {


  return (
    `
      <section id="login" class="p-absolute container">
        <main style="height: 100%; position: relative;" class="row">
          <div id="fondo-login" class="col-12 col-lg-6"></div>
          <p style="position: absolute; z-index: 21000">
            <i 
              onclick="borrarLoginRegister()" 
              style="color: black;" 
              class="fa-solid fa-x m-2 mt-4"
            ></i>
          </p>
          <div id="form-register" class="d-none d-flex d-lg-flex flex-column justify-content-center align-items-center col-lg-6">
            <form
              action=""
              class="col-12 d-flex flex-column justify-content-center align-items-center"
              onsubmit="registrarse(event)"
            >
              <h2 class="mb-3">Registro</h2>
              <div class="d-flex flex-column col-12 col-md-8 mt-1">
                <label class="form-label" for="">Nombre</label>
                <input class="form-control" type="text" name="" id="registroName" />
              </div>
              <div class="d-flex flex-column col-12 col-md-8 mt-1">
                <label class="form-label" for="">Email</label>
                <input class="form-control" type="email" name="" id="registroEmail" />
              </div>
              <div class="d-flex flex-column col-12 col-md-8 mt-1">
                <label class="form-label" for="">Contraseña</label>
                <input class="form-control" type="password" name="" id="registroPassword" />
              </div>
              <div class="d-flex flex-column col-12 col-md-8 mt-1">
                <label class="form-label" for="">Repetir Contraseña</label>
                <input class="form-control" type="password" name="" id="registroPasswordConfirmation" />
              </div>
              <div class="mt-3 col-12 col-md-8">
                <input
                  id="btn-registrarse"
                  class="btn"
                  type="submit"
                  value="Registrarse"
                />
              </div>
              <div class="mt-2 cursor-pointer" style="cursor: pointer">
                <p onclick="alternarLoginRegister()">¿Ya tienes cuenta? Inicia Sesión</p>
              </div>
            </form>
          </div>
          <form
            action=""
            id="form-login"
            class="col-12 col-lg-6 d-flex d-lg-flex flex-column justify-content-center align-items-center"
            onsubmit="iniciarSesion(event)"
          >
            <h2 class="mb-3">Iniciar Sesión</h2>
            <div class="d-flex flex-column col-12 col-md-8">
              <label class="form-label" for="">Email</label>
              <input class="form-control" type="email" name="" id="inicioSesionEmail" />
            </div>
            <div class="d-flex flex-column col-12 col-md-8">
              <label class="form-label" for="">Contraseña</label>
              <input class="form-control" type="password" name="" id="inicioSesionPassword" />
            </div>
            <div class="mt-3 col-12 col-md-8">
              <input
                id="btn-iniciar-sesion"
                class="btn"
                type="submit"
                value="Iniciar Sesión"
              />
            </div>
            <div class="mt-2 cursor-pointer" style="cursor: pointer">
              <p onclick="alternarLoginRegister()">¿No tienes cuenta? Crear cuenta</p>
            </div>
          </form>
        </main>
      </section>
    `
  )
}