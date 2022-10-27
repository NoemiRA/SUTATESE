

function Saludo(){
 
    var fecha = new Date();
    var hora = fecha.getHours();
    var fechaHoy = new Date().toLocaleString('ES', { weekday:"long", year:"numeric", month:"long", day:"numeric"}); 
       
  
  
    if(hora >= 0 && hora < 12){
      texto = "Buenos Días";
      imagen = "resources/dia.png";
    }
   
     if(hora >= 12 && hora < 19){
      imagen = "resources/tarde.png";
      texto = "Buenas Tardes";
      
     }
   
     if(hora >= 19 && hora < 24){
      imagen = "resources/noche.png";
      texto = "Buenas Noches";
       
     }
   
  
    document.getElementById('txtsaludo').innerHTML = texto;
    document.images["tiempo"].src = imagen;
    document.getElementById('fechactual').innerHTML = fechaHoy;
    
   
  }

  function cargarReloj(){
 
    var fechahora = new Date();
    var hora = fechahora.getHours(); 
    var minuto = fechahora.getMinutes(); 
    var segundo = fechahora.getSeconds(); 
    var meridiano = "AM";
    if(hora == 0){
 
        hora = 12;
        
    }
    
    if(hora > 12) {
 
        hora = hora - 12;
        meridiano = "PM";
 
    }

    hora = (hora < 10) ? "0" + hora : hora;
    minuto = (minuto < 10) ? "0" + minuto : minuto;
    segundo = (segundo < 10) ? "0" + segundo : segundo;
    
    var tiempo = hora + ":" + minuto + ":" + segundo + " " + meridiano;    
    // document.getElementById("relojnumerico").innerText = tiempo;
    document.getElementById("relojnumerico").textContent = tiempo;
    setTimeout(cargarReloj, 500);
    
}
 
 cargarReloj();


function alertaPrestamos(){
   swal('¡PRESTAMO EN REVISIÓN!', 'Para conocer el estatus del prestamo puedes visitar el apartado "CONOCE EL ESTATUS DE TU PRESTAMOS"', 'success');     
  
}

function alertaCorreo(){
  swal('¡REGISTRO EN REVISIÓN!', 'Tu contraseña para accesar al sistema se enviará al correo electrónico proporcionado "FAVOR DE REVISARLO"', 'success');
}