<!-- cabecera navbar-->
<?php 

$usuarios= $_SESSION["usuario"]; 
 include_once './view/viewGenerico/cabecera.php';  

$idUsuario="";
$email="";
$ruta="";
foreach ($_SESSION["usuario"] as $usu){$idUsuario= $usu["idUsuario"];$email=$usu["email"];$ruta=$usu["foto"];}
    ?>  

<!-- main -->
 <main class="dev">
        <!-- Sidebar Perfil -->
        <aside class="lateral dev">
            <div id="datosPerfil" >
                <img src="./assets/img/<?php echo $ruta ?>" id="fotoPerfil" alt="Foto perfil"><br>
                <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#modalEditar" id="botonEditar">Editar</a></button>      
            <?php 
          
            foreach($usuarios as $usuario) {?>
              <h1> <?php echo $usuario["nombre"]; ?> </h1>
              <h4> <?php echo $usuario["email"]; ?> </h4>
              <h3>  <?php echo $usuario["telefono"]; ?></h3>
             
             
            <?php } ?>
              
                  <div>
              
                  </div>
                <hr>
               <button type="button" id="invitaciones" class="btn btn-dark" data-toggle="modal" data-target="#aceptarInvitaciones">
                            Invitaciones&nbsp;&nbsp;<span class="badge badge-info"><?php echo $data['numeroDeInvitaciones']?></span></a>
                    </button> 
                     <?php if($data['numeroDeInvitaciones']==0) {?>
                            <script>
                                $(document).ready(function(){
                                   
                                   $('#invitaciones').attr('disabled',true);

                                });
                            </script>
                    <?php } ?>
                            
                           
              
            </div>
         

        
        
          <div id="social">            <!-- Social -->
            <a href="#" class="dev">
                <img src="./assets/img/mail.png" alt="Correo-e">
                <span>Correo-e</span>
            </a>
          
            <a href="#" class="dev">
                <img src="./assets/img/twitter.png" alt="Twitter">
                <span>Twitter</span>
            </a>
            </section>  
          </div>
        
        </aside>
 <!-- Contenido PROYECTOS-->
        <section class="contenido dev">
            <h1>MIS PROYECTOS</h1>    
              <button type="button" id="botonNproyecto" class="btn btn-info btn-lg" data-toggle="modal" data-target="#proyectoNuevo"><span class="glyphicon glyphicon-plus"></span> Nuevo Proyecto</a></button> 
            <ul class="dev">
                     <?php foreach($data["proyectos"] as $proyecto) {?>
                 <div id="positproyecto">   
                     
                    <img src="./assets/img/amarillo2.png" alt="posit proyecto" id="posit">
                     <div> 
                             <?php if($proyecto['tipo']=='creador') {?>
                         <a id="trash1" href="index.php?controller=proyecto&action=delete&idUsuario=<?php echo $idUsuario ?>&idProyecto=<?php echo $proyecto['idProyecto']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></a>&nbsp;
                              <?php }else{?>
                                  <a disabled="true" id="trash1" class="btn btn-danger"><span class="glyphicon glyphicon-trash text-muted"></a> 
                            <?php  } ?>
                           <h3><?php echo $proyecto["nombre"]; ?> </h3>
                           <p>Descripcion:</p><p><?php echo $proyecto["descripcion"]; ?></p>          
                        <a href="index.php?controller=proyecto&action=proyectoVista&idProyecto=<?php echo $proyecto['idProyecto'];?>" class="btn btn-info btn-lg avance"><span class="glyphicon glyphicon-circle-arrow-right"></a>&nbsp;
                     </div>   
                   
                </div>
            <?php } ?>
               
            </ul>
             
        </section>
        
<!-- Modal modificar -->
    <div class="modal fade" id="modalEditar" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Modificar mis datos</h4>
                </div>
                <div class="modal-body">
                    
    <form action="index.php?controller=usuarios&action=update" method="post" class="col-lg-5" id="formMOdificar" enctype="multipart/form-data">
         <?php foreach($usuarios as $ususario) {?>           
                Nombre:<input type="text" name="nombre" value="<?php echo $ususario["nombre"]; ?> " class="form-control"/>
                Apellido 1º:<input type="text" name="apellido1" value="<?php echo $ususario["apellido1"]; ?>" class="form-control"/>
                 Apellido 2º:<input type="text" name="apellido2" value="<?php echo $ususario["apellido2"]; ?>" class="form-control"/>
                Email:<input type="text" name="email" value="<?php echo $ususario["email"]; ?> " class="form-control"/>
                Contraseña:<input type="text" name="contrasena" value="<?php echo $ususario["contrasena"]; ?> " class="form-control"/>
                telefono:<input type="text" name="telefono" value="<?php echo $ususario["telefono"]; ?>" class="form-control"/><br>                
                   <input type="hidden" name="id" value="<?php echo $ususario["idUsuario"]; ?>">
                      
                         <label for="imagen">Foto perfil:</label>
                         <input  type="file" name="file" id="imagen" /><br>
                         <input type="submit" value="enviar" class="btn btn-success enviar"/> 
     </form>
                    
                      <?php  }?>
                     <form action="index.php?controller=usuarios&action=baja" method="post" >
                       <input type="hidden" name="email" value="<?php echo $email ?>">
                       <input type="submit"  value="Darme de baja" class="btn btn-danger" id="botonBaja">
                  </form> 
                </div>
                  <div class="modal-footer">
                      
                </div>
              
            </div>

        </div>
    </div>
<!-- modal proyecto nuevo -->
     <div class="modal fade" id="proyectoNuevo" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
               
                    <h4 class="modal-title">Datos del Proyecto</h4>
                </div>
                <div class="modal-body">
                     <form action="index.php?controller=proyecto&action=alta&idUsuario=<?php echo $idUsuario ?>" method="post">
                    <h3>Crear Proyecto</h3>
                    <hr/>
                    Nombre: <input type="text" required="true" name="nombre" class="form-control"/>
                    Descripcion: <input type="text" required="true" name="descripcion" class="form-control"/><br>
                    <input type="submit" value="Crear" class="btn btn-success"/>   
                </form>
                </div>
                <div class="modal-footer">
                  
                </div>
            </div>

        </div>
    </div>

<!--prueba -->
 <div class="modal fade" id="aceptarInvitaciones" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <ul class="list-group">
                    <li class="list-group-item disabled">Invitaciones</li>
                    <?php foreach($data["invitaciones"] as $invitaciones) {?>
                    <li class="list-group-item">
                        Proyecto: <?php echo strtoupper($invitaciones["nombre"]); ?> 
                        <a href="index.php?controller=proyecto&action=deleteInvitacion&idProyecto=<?php echo $invitaciones["idProyecto"];?>&idUsuario=<?php echo $invitaciones["idUsuario"]; ?>" class="btn btn-danger">Rechazar</a>&nbsp;
                        <a href="index.php?controller=proyecto&action=aceptarInvitacion&idProyecto=<?php echo $invitaciones["idProyecto"];?>&idUsuario=<?php echo $invitaciones["idUsuario"]; ?>"" class="btn btn-info">Aceptar</a>&nbsp;
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
  </div>

<!-- fin : prueba -->
</main>
    


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="./assets/css/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
</body>
</html>



