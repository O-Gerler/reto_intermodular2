const PRECIOS = [
  {
    nombre: "GRATIS",
    cantidad: 1,
    comentario: "Gratis de por vida solo para ti",
    precio: 0,
    tiempo: "/de por vida",
    ventajas: [
      "Sin costo adicional de por vida.",
      "Información de mas de 10 ubicaciones.",
      "Actualización en tiempo real.",
    ],
  },
  {
    nombre: "PRO",
    cantidad: 5,
    comentario: "Plan pro con mejoras",
    precio: 20,
    tiempo: "/al mes",
    ventajas: [
      "Todo lo que tiene el plan gratuito.",
      "20 localizaciones añadidas.",
      "Muestreo de más datos.",
    ],
  },
  {
    nombre: "EMPRESA",
    cantidad: 50,
    comentario: "Plan profesional para empresas",
    precio: 100,
    tiempo: "/al mes",
    ventajas: [
      "Todo lo de el plan pro.",
      "Soporte 24h.",
      "Diseños y peticiones a medida.",
    ],
  },
];

const PREGUNTAS = [
  {
    indice: "uno",
    pregunta: "¿Como puedo realizar el pago?",
    respuesta:
      "Aceptamos tanto transferencias bancarias como pagos por tarjeta y PayPal",
  },
  {
    indice: "dos",
    pregunta: "¿En caso de no estar satisfecho puede reenbolsar mi dinero?",
    respuesta:
      "Si, aceptamos reembolsos antes de el dia 15 de cada mes o por algun defecto de la aplicación",
  },
  {
    indice: "tres",
    pregunta: "¿Puedo ver el tiempo fuera de el Pais Vasco?",
    respuesta:
      "No, por ahora nuestras balizas solo se encuentran en el Pais Vasco",
  },
];

const LUGARES = [
  {
    nombre: "Irun",
    latitud: 43.339,
    longitud: -1.7896,
  },
  {
    nombre: "Donostia",
    latitud: 43.3183,
    longitud: -1.9812,
  },
  {
    nombre: "Renteria",
    latitud: 43.3119,
    longitud: -1.8985,
  },
];

const INFORMACION_CARD_TIEMPO = [
  {
    nombre: 'Irun',
    temp: 22,
    humedad: 22,
    temp_max: 22,
    temp_min: 22,
    viento: 22,
    precipitaciones: 22,
  },
  {
    nombre: 'Donostia',
    temp: 22,
    humedad: 22,
    temp_max: 22,
    temp_min: 22,
    viento: 22,
    precipitaciones: 22,
  },
  {
    nombre: 'Renteria',
    temp: 22,
    humedad: 22,
    temp_max: 22,
    temp_min: 22,
    viento: 22,
    precipitaciones: 22,
  },
  {
    nombre: 'Renteria',
    temp: 22,
    humedad: 22,
    temp_max: 22,
    temp_min: 22,
    viento: 22,
    precipitaciones: 22,
  },
]

const MEDIDAS = {
  humedad: {
    dataIcono: 'data-lucide="droplets"',
    unidad: '%',
    nombre: 'Humedad'
  },
  temp_max: {
    dataIcono: 'data-lucide="thermometer-sun"',
    unidad: 'ºC',
    nombre: 'Maxima'
  },
  temp_min: {
    dataIcono: 'data-lucide="thermometer-snowflake"',
    unidad: 'ºC',
    nombre: 'Minima'
  },
  viento: {
    dataIcono: 'data-lucide="wind"',
    unidad: ' Km/h',
    nombre: 'Viento'
  },
  precipitacion: {
    dataIcono: 'data-lucide="umbrella"',
    unidad: ' L/m<sup>2</sup>',
    nombre: 'Precipitacion'
  },
}
