    function quincenas(){

    
            var fechaActual = new Date();
               var dia = (fechaActual.getDate());
                var mes = (fechaActual.getMonth()+1); //enero = 1 y diciembre = 12
           

        //-----SIMULAR
              // dia = 1;
              // mes = 8;

          //CALCULO PARA LOS RECIBOS DE LAS QUINCENAS
          mesDos = mes;
          mesTres = 0;
          totalMeses = 13;
          finQuincena = 31;
          mitadQuincena = 15;
          inicioQuincena=1;

          //CALCULO PARA CUANTAS QUINCENAS FALTAN
        
      
          if(dia <= mitadQuincena && dia >= inicioQuincena){
            mes = mes-1;
            mesDos= mes-1;
            if(mes == 0){
              var nombreMes = "Diciembre"
            }
            if(mesDos == 0){
              var nombreMesDos = "Diciembre"
            }
            if(mes == 1){
              var nombreMes = "Enero"
            }
            if(mesDos == 1){
              var nombreMesDos = "Enero"
            }
            
            if(mes == 2){
              var nombreMes = "Febrero"
            }
            if(mesDos == 2){
              var nombreMesDos = "Febrero"
            }
            
            if(mes == 3){
              var nombreMes = "Marzo"
            }
            if(mesDos == 3){
              var nombreMesDos = "Marzo"
            }
            
            if(mes == 4){
              var nombreMes = "Abril"
            }
            if(mesDos == 4){
              var nombreMesDos = "Abril"
            }
            
            if(mes == 5){
              var nombreMes = "Mayo"
            }
            if(mesDos == 5){
              var nombreMesDos = "Mayo"
            }
            
            if(mes == 6){
              var nombreMes = "Junio"
            }
            if(mesDos == 6){
              var nombreMesDos = "Junio"
            }
            
            if(mes == 7){
              var nombreMes = "Julio"
            }
            if(mesDos == 7){
              var nombreMesDos = "Julio"
            }
            
            if(mes == 8){
              var nombreMes = "Agosto"
              
            }
            if(mesDos == 8){
              var nombreMesDos = "Agosto"
              
            }
            
            if(mes == 9){
              var nombreMes = "Septiembre"
            }
            if(mesDos == 9){
              var nombreMesDos = "Septiembre"
            }
            
            if(mes == 10){
              var nombreMes = "Octubre"
            }
            if(mesDos == 10){
              var nombreMesDos = "Octubre"
            }
            
            if(mes == 11){
              var nombreMes = "Noviembre"
            }
            if(mesDos == 11 || mesDos == -1){
              var nombreMesDos = "Noviembre"
            }
            
            if(mes == 12){
              var nombreMes = "Diciembre"
            }
            if(mesDos == 12){
              var nombreMesDos = "Diciembre"
            }

          
            var resultado ="Meses comprendidos para subir recibo: "+nombreMes+" - "+nombreMesDos
      
            

          }else if(dia >= mitadQuincena && dia <= finQuincena){
            mesDos= mes-1;
            
            if(mes == 0){
              var nombreMes = "Diciembre"
            }
            if(mesDos == 0){
              var nombreMesDos = "Diciembre"
            }
            if(mes == 1){
              var nombreMes = "Enero"
            }
            if(mesDos == 1){
              var nombreMesDos = "Enero"
            }
            
            if(mes == 2){
              var nombreMes = "Febrero"
            }
            if(mesDos == 2){
              var nombreMesDos = "Febrero"
            }
            
            if(mes == 3){
              var nombreMes = "Marzo"
            }
            if(mesDos == 3){
              var nombreMesDos = "Marzo"
            }
            
            if(mes == 4){
              var nombreMes = "Abril"
            }
            if(mesDos == 4){
              var nombreMesDos = "Abril"
            }
            
            if(mes == 5){
              var nombreMes = "Mayo"
            }
            if(mesDos == 5){
              var nombreMesDos = "Mayo"
            }
            
            if(mes == 6){
              var nombreMes = "Junio"
            }
            if(mesDos == 6){
              var nombreMesDos = "Junio"
            }
            
            if(mes == 7){
              var nombreMes = "Julio"
            }
            if(mesDos == 7){
              var nombreMesDos = "Julio"
            }
            
            if(mes == 8){
              var nombreMes = "Agosto"
              
            }
            if(mesDos == 8){
              var nombreMesDos = "Agosto"
              
            }
            
            if(mes == 9){
              var nombreMes = "Septiembre"
            }
            if(mesDos == 9){
              var nombreMesDos = "Septiembre"
            }
            
            if(mes == 10){
              var nombreMes = "Octubre"
            }
            if(mesDos == 10){
              var nombreMesDos = "Octubre"
            }
            
            if(mes == 11){
              var nombreMes = "Noviembre"
            }
            if(mesDos == 11 || mesDos == -1){
              var nombreMesDos = "Noviembre"
            }
            
            if(mes == 12){
              var nombreMes = "Diciembre"
            }
            if(mesDos == 12){
              var nombreMesDos = "Diciembre"
            }
            // var resultado = "1era de "+nombreMes+' ó 1era y/o 2da de '+nombreMesDos;
      
            var resultado ="Meses comprendidos para subir recibo: "+ nombreMesDos+' - '+nombreMes;

            
          //  console.log(resultadoDos);
          }
           document.getElementById("quincena").value = resultado;
          
           
           }

          

        

        

        