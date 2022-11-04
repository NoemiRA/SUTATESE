// let poderCred = document.getElementById("poderCred");
// let cantMax   = document.getElementById("cantMax");

function hacerSuma() {
  try {
    let isr = parseFloat(document.getElementById("isr").value) || 0;
    let issemym = parseFloat(document.getElementById("issemym").value) || 0;
    let tpercepciones =
      parseFloat(document.getElementById("tpercepciones").value) || 0;
    let totaldeducciones =
      parseFloat(document.getElementById("tdeducciones").value) || 0;

    let x = isr + issemym;
    let y = tpercepciones - x;
    let porcentaje = y * 0.3;
    let p = totaldeducciones - isr - issemym;
    let poderCrediticio = porcentaje - p;
    let cantidadMax;

    var fechaActual = new Date();
    var Sdia = fechaActual.getDate();
    var mes = fechaActual.getMonth() + 1; //enero = 1 y diciembre = 12

    //SIMULAR
    //  Sdia = 16;
    //  mes = 11;

    totalQuincenas = 21;
    totalMeses = 13;
    finQuincena = 31;
    mitadQuincena = 15;
    inicioQuincena = 1;

    quincenasPago = totalQuincenas - mes * 2;

    if (Sdia <= mitadQuincena && Sdia >= inicioQuincena) {
      quincenasPago = quincenasPago + 1;

      cantidadMax = poderCrediticio * quincenasPago;

      if (mes == 11 && Sdia <= 15) {
        quincenasPago = quincenasPago + 1;
        cantidadMax = poderCrediticio * quincenasPago;
        antidadMax = cantidadMax + " Debe ser pagado antes del 15 de noviembre";
      }

      if (mes == 12 && Sdia <= 15) {
        quincenasPago = mes * 2 - 2;

        cantidadMax = poderCrediticio * quincenasPago;
      }
    } else if (Sdia >= mitadQuincena && Sdia <= finQuincena) {
      quincenasPago = quincenasPago;

      cantidadMax = poderCrediticio * quincenasPago;
      var resultadoDos = quincenasPago + " quincenas";

      if (mes == 11 && Sdia >= 16) {
        quincenasPago = -1 * quincenasPago;
        cantidadMax = poderCrediticio * quincenasPago;
      }
      if (mes == 12 && Sdia >= 16) {
        quincenasPago = mes * 2 - 3;
        resultadoDos = quincenasPago + " quincenas";
        cantidadMax = poderCrediticio * quincenasPago;
      }
    }

    document.getElementById("cantMax").value = cantidadMax;
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
    cantidadAhorrar.value = "";
  }
}

function firstStage(){
  CantidadAhorro = document.getElementById("Amount");
  CantidadAhorro.disabled = true;
  Beneficiario = document.getElementById("Beneficiary");
  Beneficiario.disabled = true;
  FormatoCuota = document.getElementById("QuotaFormat")
  FormatoCuota.disabled = false;
  SolicitudAportacion = document.getElementById("ContributionRequest");
  SolicitudAportacion.disabled = false;
  Archivos = document.getElementById("files");
  Archivos.disabled = false;
  Ingresar = document.getElementById("log");
  Ingresar.disabled = false;
}