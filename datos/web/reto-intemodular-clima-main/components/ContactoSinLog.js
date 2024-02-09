const ContactoSinLog = () => {

  return (
    `
      <section id="contacto" class="container" style="margin-top:100px">
        <h2>Contacto</h2>
        <p>Si tienes cualquier pregunta no dudes en ponerte en contacto con nosotros, intentaremos ponernos en contacto contigo lo antes posible</p>
        <form action="" class="row mt-3" onsubmit="handleSubmit(event)">
          <div class="col-12 col-md-6 col-lg-4 pr-1 mt-2" style="border:5px solid white">
            <label for="" class="form-label fw-bold">Nombre</label>
            <input required placeholder="Ej: Oier" type="text" class="form-control">
          </div>
          <div class="col-12 col-md-6 col-lg-4 pr-1 mt-2" style="border:5px solid white">
            <label for="" class="form-label fw-bold">Apellidos</label>
            <input required placeholder="Ej: Mayoral Azurmendi" type="text" class="form-control">
          </div >
          <div class="col-12 col-lg-4 mt-2" style="border:5px solid white">
            <label for="" class="form-label fw-bold">Correo</label>
            <input required placeholder="Ej: ikcfc@plaiaundi.net" type="email" class="form-control">
          </div>
          <div style="border:5px solid white" class="col-12">
            <label for="" class="form-label fw-bold mt-3">Comentarios</label>
            <textarea placeholder="Ej: Me gustaria saber en el plan de empresa si podrias especificar algo más las funciones adicionales que ofreceis" name="" id="" rows="5" class="form-control"></textarea>
          </div>
          <input style="border:5px solid white" type="submit" class="col-12 col-sm-6 col-lg-4 mt-3 btn">
        </form>
      </section>
    `
  )
}

const handleSubmit = e => {
  e.preventDefault()
  Swal.fire({
    title: "Enviado!",
    text: "Responderemos cuanto antes!",
    icon: "success",
    confirmButtonColor: '#42a5f5'
  });
}