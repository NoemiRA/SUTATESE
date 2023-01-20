
var QUINCENAL = "quincenal";
var MENSUAL = "mensual";
 var ANUAL = "anual";

function getTasa(tasa, tasa_tipo, periodo) {
    tasa = tasa / 100.0
    if (periodo == QUINCENAL) { tasa = tasa / 2 };
    return tasa;
}

function getValorDeCuotaFija(monto, tasa, cuotas, periodo, tasa_tipo) {
    tasa = getTasa(tasa, tasa_tipo, periodo);
    valor = monto *( (tasa * Math.pow(1 + tasa, cuotas)) / (Math.pow(1 + tasa, cuotas) - 1) );
    return valor.toFixed(2);
}

function getAmortizacion(monto, tasa, cuotas, periodo, tasa_tipo) {
    var valor_de_cuota = getValorDeCuotaFija(monto, tasa, cuotas, periodo, tasa_tipo);
    var saldo_al_capital = monto;
    var items = new Array();

    for (i=0; i < cuotas; i++) {
        interes = saldo_al_capital * getTasa(tasa, tasa_tipo, periodo);
        abono_al_capital = valor_de_cuota - interes;
        saldo_al_capital -= abono_al_capital;
        numero = i + 1;
        
        interes = interes.toFixed(2);
        abono_al_capital = abono_al_capital.toFixed(2);
        saldo_al_capital = saldo_al_capital.toFixed(2);

        item = [numero, abono_al_capital,interes, valor_de_cuota, saldo_al_capital];
        items.push(item);
    }
    return items;
}


function setMoneda(num) {
    num = num.toString().replace(/\$|\,/g, '');
    if (isNaN(num)) num = "0";
    sign = (num == (num = Math.abs(num)));
    num = Math.floor(num * 100 + 0.50000000001);
    cents = num % 100;
    num = Math.floor(num / 100).toString();
    if (cents < 10) cents = "0" + cents;
    for (var i = 0; i < Math.floor((num.length - (1 + i)) / 3); i++)
        num = num.substring(0, num.length - (4 * i + 3)) + ',' + num.substring(num.length - (4 * i + 3));
    return (((sign) ? '' : '-') + '$' + num + ((cents == "00") ? '' : '.' + cents));
}

        function calcular() {
            var monto = document.getElementById("input_monto").value;
            var cuotas = document.getElementById("input_cuotas").value;
             var tasa = document.getElementById("input_tasa").value;
            //  var cuotaMax = document.getElementById("cuotaMax").value;
             
            //  if(parseFloat(monto) > cantMax){
            //     Swal.fire({
            //         icon: 'error',
            //         title: 'Error...',
            //         text: "La cantidad que solicitó: \"$"+monto+"\", es mayor a su cantidad dispoible: \"$"+ cantMax+"\"."
                   
            //       });
            //     return; 
            //  }
            if (!monto) {
                Swal.fire({
                    icon: 'warning',
                    title: '¡Advertencia!',
                    text: "Indique la cantidad a solicitar."
                   
                  });
                return; 
            }
            if (!cuotas) {
                Swal.fire({
                    icon: 'warning',
                    title: '¡Advertencia!',
                    text: "Indique el plazo a pagar."
                  });
                return; 
            }
            if (!tasa) {
                Swal.fire({
                    icon: 'warning',
                    title: '¡Advertencia!',
                    text: "Indique la tasa de interes."
                   
                  });
                return; 
            }
            if (parseInt(cuotas) < 1) {
                Swal.fire({
                    icon: 'warning',
                    title: '¡Advertencia!',
                    text: "Ha indicado una cantidad invalida para las cuotas, porfavor ingrese un número positivo."
                   
                  });
                return; 
            }
             var select_periodo = document.getElementById("select_periodo");
             periodo = select_periodo.options[select_periodo.selectedIndex].value;
            var select_tasa_tipo = document.getElementById("select_tasa_tipo");
            tasa_tipo = select_tasa_tipo.options[select_tasa_tipo.selectedIndex].value;
            var items = getAmortizacion(monto, tasa, cuotas, periodo, tasa_tipo);
            var tbody = document.getElementById("tbody_1");
            tbody.innerHTML = "";
  
        if (parseInt(cuotas) > 21) { 
            Swal.fire({
                icon: 'warning',
                title: '¡Advertencia!',
                text: "Ha indicado una cantidad excesiva de cuotas, porfavor reduzcala."
              });
            return; 
        }

            for (i = 0; i < items.length; i++) {
                item = items[i];
                tr = document.createElement("tr");
                for (e = 0; e < item.length; e++) {
                    value = item[e];
                    if (e > 0) { value = setMoneda(value); }
                    td = document.createElement("td");
                    textCell = document.createTextNode(value);
                    td.appendChild(textCell);
                    tr.appendChild(td);
                }
                tbody.appendChild(tr);
            }
            var div1 = document.getElementById("div-valor-cuota");

            valor = setMoneda(items[0][3]);
            
        }
        
