const Accordion = (preguntas) => {
  let accordionHTML = ''

  preguntas.forEach(p => {
    accordionHTML += AccordionItem(p)
  })

  return (
    `
    <div class="accordion" id="acordeonPreguntasFrecuentes">
      ${accordionHTML}
    </div>
    `
  )
}