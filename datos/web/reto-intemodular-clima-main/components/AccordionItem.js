const AccordionItem = (p) => {

  const {pregunta, respuesta, indice} = p

  return (
    `
      <div class="accordion-item">
        <h2 class="accordion-header">
          <button
            class="accordion-button collapsed fw-bold"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#collapse${indice}"
            aria-expanded="false"
            aria-controls="collapse${indice}"
          >
            ${pregunta}
          </button>
        </h2>
        <div
          id="collapse${indice}"
          class="accordion-collapse collapse"
          data-bs-parent="#acordeonPreguntasFrecuentes"
        >
          <div class="accordion-body">
            ${respuesta}
          </div>
        </div>
      </div>
    `
  )
}