/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function () {
           $('#formEmail').blur(function(event){
            var email = $('#formEmail').val(); 
            event.preventDefault();// using this page stop being refreshing
          $.ajax({
            type: 'GET',
            url: 'index.php?controller=usuarios&action=detalle&email='+email,
            //data: $('form').serialize(),
            success: function (data) {
                 console.log("devuleve "+data);
              
                if(data==0) {
                //rojo si el email no existe,cuadro contraseña deshabilitado rojo
                  $("#formEmail").css("background-color", "#F78181");
                  $("#formEmail").val("Email no existe");
                  
                    document.getElementById("formContra").disabled=true; 
                }else{
                   
                    $("#formEmail").css("background-color", "#A9F5BC");
                    document.getElementById("formContra").disabled=false; 
                }
              
            }
         
            
          });
      });
        
  
  /**
   * hacer una funcion que oculte divs etc si esta o no logeado---pendiente
   * @returns {undefined}
   */
  


    
    
    
    
    
    
    
       
});