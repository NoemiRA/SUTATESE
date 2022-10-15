
        let poderCred = document.getElementById('poderCred');        

        function hacerSuma(){
try{
        let isr = parseFloat(document.getElementById('isr').value) || 0;
        let issemym = parseFloat(document.getElementById('issemym').value) || 0;
        let tpercepciones = parseFloat(document.getElementById('tpercepciones').value) || 0;
        let totaldeducciones = parseFloat(document.getElementById('tdeducciones').value) || 0;

         let x= isr + issemym;
         let y = tpercepciones - x;
        let porcentaje = y * .3;
         let p = totaldeducciones - isr - issemym;
         let poderCrediticio = porcentaje - p;

          document.getElementById("poderCred").value = poderCrediticio;

  }catch(e){}
        
  }


               

