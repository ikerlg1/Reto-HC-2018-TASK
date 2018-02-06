/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function () {
   
   
$('#emailRegistro').blur(function(event){
            var email=$('#emailRegistro').val(); 
           
            var respuesta= /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(email);        
            if(!respuesta){
                   $("#emailRegistro").css("background-color", "#F78181");
                   $("#emailRegistro").val("formato email erroneo");
                  
                }
            else{
                
                event.preventDefault();// using this page stop being refreshing
              
                
               $.ajax({      
                type: 'GET',
                 url: 'index.php?controller=usuarios&action=detalle&email='+email,
                 //data: $('form').serialize(),
                success: function (data) {
                 console.log("devuleve "+data);
              
                if(data==0) {
                  //si no existe VERDE
                    $("#emailRegistro").css("background-color", "#A9F5BC");
                   
                     document.getElementById("botonReg").disabled=false; 
                }else{
                   
                   
                    //si existe ROJO
                   $("#emailRegistro").css("background-color", "#F78181");
                   $("#emailRegistro").val("Email ya registrado");
                   document.getElementById("botonReg").disabled=true;
                }
              
                }        
        });
                }
         
});



 });