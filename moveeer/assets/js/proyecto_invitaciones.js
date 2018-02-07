$(document).ready(function(){

        /*Configuracion previa*/
        $('#alertInfoUsuario').hide();
        $('#alertInfo').hide();
        $('#invitar_usuario').attr('disabled',true);
        $('#cancelar_invitar').attr('disabled',true);
        
        
        /* Evento: blur()
         * Con este evento comprobamos 
         * que el usuario existe en la base de datos
         */
        $('#invitaciones_proyecto').blur(function(){
           var valorInput=$(this).val();
           $.ajax({
               url: "index.php?controller=usuarios&action=buscarUsuario&email="+valorInput,
               method:'POST',
               success: function(result){
                   console.log(result);
                   if(result==0){
                        $('#alertInfoUsuario').show();
                        $('#alertInfoUsuario').delay(2000).hide(600); 
                   }else{     
                       var datosObjeto=jQuery.parseJSON(result);
                       $('#invitaciones_proyecto').attr('disabled',true);
                       $('#invitaciones_proyecto').css('background-color','#86FE4F');
                       $('#invitar_usuario').removeAttr('disabled');
                       $('#cancelar_invitar').removeAttr('disabled');
                       $('#usuario_id').attr('value',datosObjeto.idUsuario);
                   };    
               }
           });
        });
        
        
        /* Evento: click()
         * Con este evento eviamos  
         * la invitacion con una llamada ajax
         */
        $('body').on('click','#invitar_usuario',function(event){     
            event.preventDefault();
            var datos=$('#enviar_invitacion').serialize();
            $.ajax({
                url: "index.php?controller=proyecto&action=invitacion",
                method:"POST",
                data:datos,
                success:function(result){
                    console.log(result);
                    $('#alertInfo').show();
                    $('#alertInfo').delay(2000).hide(600); 
                    $('#invitaciones_proyecto').css('background-color','white');
                    $('#invitaciones_proyecto').val("");
                }

            });

            $('#invitaciones_proyecto').attr('disabled',false);
            $('#invitar_usuario').attr('disabled',true);
            $('#cancelar_invitar').attr('disabled',true);
            
        });
        
         /* Evento: click()
         * Para volver a la dconfiguracion inicial   
         */
        $('#cancelar_invitar').click(function(){
            $('#invitaciones_proyecto').attr('disabled',false);
            $('#invitaciones_proyecto').css('background-color','white');
            $('#invitaciones_proyecto').val("");
            $('#invitar_usuario').attr('disabled',true);
            $('#cancelar_invitar').attr('disabled',true);  
        });
        
        
    });


