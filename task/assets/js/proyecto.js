    $(document).ready(function (){
                
                /* Evento: click()
                 * Con este evento, mediante ajax,  cambiamos el  
                 * estado de realizado en la base de datos
                 */                
                $('.realizado').click(function(event){
                   var boton = $(this);
                   var idTarea=$(this).val();
                    $.ajax({
                        url: "index.php?controller=tarea&action=realizado",
                        data: {"idTarea":idTarea},
                        method: "POST",
                        success: function(result){
                            console.log(result);
                            boton.attr("disabled", true);
                            boton.empty();
                           
                            boton.append("<button class='btn btn-success' value='<?php echo $tarea['idTarea']?><span class='glyphicon  glyphicon-thumbs-up'></span></button>");
                        }
                    });           
                }); 
                
                /* Evento: click()
                 * Con este evento, creamos el formulario para   
                 * registrar notas en la base de datos
                 */  
                $('.notas').click(function(){
                   var boton=$(this);
                   boton.next().append('<div class="añadirNotas"><div><form method="post" class="form_notas"><hr/><textarea name="nota" class="form-control"></textarea></form><button class="btn btn-success submitNota">Añadir</button>&nbsp;<button class="btn btn-primary cerrarNota">Cerrar</button></div>');
                   $('.form_notas').attr('action','index.php?controller=nota&action=alta&idTarea='+boton.val());
                });
                
                /* Evento: click()
                 * Con este evento, mediante ajax, insertamos  
                 * la nota en la base de datos
                 */                  
                $('body').on('click','.submitNota',function(){
                    var datos = $(this).prev().serialize();
                    var formulario = $(this).prev();
                    var btn=$(this);
                    $.ajax({
                        type:formulario.attr('method'), 
                        url: formulario.attr('action'),
                        data: datos,
                        success: function (data) { 
                            var form=formulario.parent();
                            cerrarAñadirNota(form);
                        } 
                    });
                });
                
                /* Evento: click()
                 * Con este evento, eliminamos el formulario de notas
                 */                  
                $('body').on('click','.cerrarNota',function(){
                     var formulario = $(this).parent().parent();
                     var btn=$(this);
                     cerrarAñadirNota(formulario);
                       
                });
                
                function cerrarAñadirNota(formulario){
                    formulario.remove();
                }
                
                /* Evento: click()
                 * Con este evento, mediante ajax, nos traemos las notas de  
                 * la tarea y las mostramos en la vista
                 */                  
                $('.mostrarNotas').hide();
                
                $('.verNotas').click(function(){ 
                   var idTarea=$(this).val();
                   var posicionarmeDom=$(this).next().next().next();
                   $.ajax({
                        method: 'POST', 
                        url: 'index.php?controller=nota&action=mostrarNotas',
                        data: {"idTarea": idTarea},
                        success: function (datos) { 
                            console.log(datos);
                            var notas=jQuery.parseJSON(datos);
                            
                            notas.forEach(function(nota){
                                      posicionarmeDom.children('ul').append('<li id="elementoNota" value="'+nota.idNota+'"><p id="letraNota">'+nota.descripcion+'</p><span class="glyphicon glyphicon-trash listadoNotas" style="color:black;"></span></li>');  
                            });  
                        } 
                   });

                   posicionarmeDom.show();
                   
                });
                
                /* Evento: click()
                 * Con este evento, vaciamos y ocultamos la lista de notas
                 */                  
                $('.x').click(function(){ 
                   $(this).parent().parent().children('ul').empty();
                   $(this).parent().parent().hide();
                });
                
                /* Evento: click()
                 * Con este evento, eliminamos la nota   
                 * de una tarea del proyecto
                 */                  
                $('body').on('click','.listadoNotas', function(){
                    var li=$(this).parent();
                    var idNota=$(this).parent().val();
                    $.ajax({
                        url:"index.php?controller=nota&action=delete&idNota="+idNota,
                        method:"GET",
                        success: function(result){
                            console.log(result);
                            li.remove();
                        }
                    });
                    
                });
                
                /* Evento: click()
                 * Con este evento, mostraremos el contenedor
                 * de las nota de una tarea del proyecto
                 */  
                $('#añadirNotaBoton').click(function(){
                  $('#añadirN').toggle();
                });

    }); 
    
   