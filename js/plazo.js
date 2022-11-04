 function plazo(){

      var fechaActual = new Date();
       var Sdia = (fechaActual.getDate());
       var mes = (fechaActual.getMonth()+1); //enero = 1 y diciembre = 12
 
    //SIMULAR
      //  Sdia = 1;
      //  mes = 8;
    totalQuincenas = 21; 
    totalMeses = 13;
    finQuincena = 31;
    mitadQuincena = 15;
    inicioQuincena=1;
  
     
    quincenasPago = (totalQuincenas) - (mes*2);
        
            if(Sdia <= mitadQuincena && Sdia >= inicioQuincena){
              
  
              quincenasPago =  quincenasPago + 1;
              var resultadoDos = quincenasPago+" quincenas";
                if(quincenasPago == 0){
                  resultadoDos = "El prestamo debe ser pagado antes del 15 de noviembre";
                }  

                 if(mes == 12 && Sdia <= 15){
                     quincenasPago = (mes *2) -2;
                     resultadoDos = quincenasPago+" quincenas";
                   }  
  
            }else if(Sdia >= mitadQuincena && Sdia <= finQuincena){
              quincenasPago = quincenasPago;
              var resultadoDos = quincenasPago + " quincenas";

              if(quincenasPago == -1){
                  resultadoDos = "El prestamo debe ser pagado antes del 30 de noviembre";
                }
                if(mes == 12 && Sdia >= 16){
                    quincenasPago = (mes *2) -3;
                    resultadoDos = quincenasPago+" quincenas";
                  } 
            }
             document.getElementById("meses").value = resultadoDos;
    }