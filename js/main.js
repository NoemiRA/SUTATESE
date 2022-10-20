let poderCred = document.getElementById("poderCred");

function hacerSuma() {
  try {
    let isr = parseFloat(document.getElementById("isr").value) || 0;
    let issemym = parseFloat(document.getElementById("issemym").value) || 0;
    let tpercepciones = parseFloat(document.getElementById("tpercepciones").value) || 0;
    let totaldeducciones = parseFloat(document.getElementById("tdeducciones").value) || 0;

    let x = isr + issemym;
    let y = tpercepciones - x;
    let porcentaje = y * 0.3;
    let p = totaldeducciones - isr - issemym;
    let poderCrediticio = porcentaje - p;

    document.getElementById("poderCred").value = poderCrediticio;
  } catch (e) {}
}

function docente() {
  element = document.getElementById("experiencia");
  check = document.getElementById("chec");
  if (check.checked) {
    element.disabled = true;
    element.value = "";
  } else element.disabled = false;
}

function inversion() {
  cantidadAhorrar = document.getElementById("ahorroQuincenalFVI");
  tipoFondo = document.getElementById("tipoFondo");
  checkFVI = document.getElementById("checFVI");
  if (checkFVI.checked) {
    cantidadAhorrar.disabled = false;
    cantidadAhorrar.value = "";

    tipoFondo.disabled = false;
    tipoFondo.value = "Fondo de aportaciones";
  } else {
    cantidadAhorrar.disabled = true;
    tipoFondo.disabled = true;

    tipoFondo.value = "Fondo de aportaciones";
    cantidadAhorrar.value = 0;
}
}
