function alerts(){
    Swal.fire({
        icon: "success", title: "Datos Actualizados", 
        text: "¡Los datos han sido actualizados!", 
        showConfirmButton: true, confirmButtonText: "Cerrar"}).
        then(function(result){
            if(result.value){                   
                window.location = "registroCA.php";
            }
    });
}


