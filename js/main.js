
        let boton= document.getElementById('calcular');
        let calculo = document.getElementById('calculo');
        let linea = document.getElementById('linea');
        let poderCred = document.getElementById('poderCred');
        
        boton.addEventListener('click' ,hacerSuma);

        function hacerSuma(){
        
        let sueldoB = parseFloat(document.getElementById('sueldoBruto').value);
        let isr = parseFloat(document.getElementById('isr').value);
        let issemym1 = parseFloat(document.getElementById('issemym1').value);
        let issemym2 = parseFloat(document.getElementById('issemym2').value);
        let issemym3 = parseFloat(document.getElementById('issemym3').value);
        let issemym4 = parseFloat(document.getElementById('issemym4').value);
        let issemym5 = parseFloat(document.getElementById('issemym5').value);
        
        let cuota = parseFloat(document.getElementById('cuota').value); 
        let cajaAhorro = parseFloat(document.getElementById('cajaAhorro').value);
        let restoDesc1 = parseFloat(document.getElementById('descuento1').value);
        let restoDesc2 = parseFloat(document.getElementById('descuento2').value);
        let restoDesc3 = parseFloat(document.getElementById('descuento3').value);
        let restoDesc4 = parseFloat(document.getElementById('descuento4').value);
        let restoDesc5 = parseFloat(document.getElementById('descuento5').value);
        let restoDesc6 = parseFloat(document.getElementById('descuento6').value);
        



        let x= isr + issemym1 + issemym2 + issemym3 + issemym4 + issemym5;
        let y = sueldoB - x;
        let porcentaje = y * .3;
        let sumaD = cuota + cajaAhorro + restoDesc1 + restoDesc2 + restoDesc4 + restoDesc5 + restoDesc6;
        let poderCrediticio = porcentaje - sumaD;


        calculo.innerHTML=  y;
        linea.innerHTML=  porcentaje;
        poderCred.innerHTML=  poderCrediticio;
        

        }