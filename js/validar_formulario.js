function soloLetras(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
       especiales = "8-9-32-37-39-46";

       tecla_especial = false;
       for(var i in especiales){
            if(key === especiales[i]|| key===8 || key===9 || key===32){
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)===-1 && !tecla_especial){
            return false;
        }
    }
var input = document.getElementById('nombre');

input.onkeyup = function(){
    this.value = this.value.toUpperCase();
};
function soloNumeros(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       numeros = " 0123456789";
       especiales = "8-37-39-46";

       tecla_especial = false;
       for(var i in especiales){
            if(key === especiales[i]|| key===8 || key===9){
                tecla_especial = true;
                break;
            }
        }

        if(numeros.indexOf(tecla)===-1 && !tecla_especial){
            return false;
        }
    }
    function soloNumerosFecha(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       numeros = " 0123456789";
       especiales = "8-37-39-46-45";

       tecla_especial = false;
       for(var i in especiales){
            if(key === especiales[i]|| key===8 || key===9|| key===45){
                tecla_especial = true;
                break;
            }
        }

        if(numeros.indexOf(tecla)===-1 && !tecla_especial){
            return false;
        }
    }



