

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
  <!-- Sidebar -->
        <aside class="lateral dev">
            <div id="datosPerfil">
                <img src="./assets/img/<?php echo $ruta ?>" id="fotoPerfil" alt="Foto perfil">
             
            <?php 
            $usuarios= $_SESSION["usuario"];
            foreach($usuarios as $ususario) {?>
              <h3> <?php echo $ususario["nombre"]; ?> </h3>     
            <?php } ?>
            
              <!-- Invitaciones-->
              <div>
                    <label for="invitaciones_proyecto">Usuario a invitar: </label><br>
                    <input type="text" name="invitaciones_proyecto" id="invitaciones_proyecto" placeholder="Introduce su email"/>
                    <form id="enviar_invitacion">
                        <input type="hidden" name="idProyecto" value=<?php echo $_GET['idProyecto'] ?>/>
                        <input type="hidden" name="idUsuario" value="" id="usuario_id"/>
                    </form>
                    <button class="btn btn-info" id="invitar_usuario">Invitar</button>&nbsp;&nbsp;
                    <button class="btn btn-info" id="cancelar_invitar">Cancelar</button>
     
                 </div>
                
                <div class="alert alert-success" role="alert" id="alertInfo">
                    Invitacion Enviada con Exito!!!
                </div>
                <div class="alert alert-danger" role="alert" id="alertInfoUsuario">
                    Usuario no existe
                </div><!-- Fin: Invitaciones-->
                
            </div>
            <hr>
            <!-- un div que tenga los participantes del proyecto--> 
 <!-- SECTION PARA EL CHAT -->
           <h1>CHAT</h1>   
         
          <div id="chat">         
              <div>         
            <?php foreach($data["mensajes"] as $mensaje) {?>
                  <p>  Mensaje: <?php echo $mensaje["descripcion"]; ?> 
                  fecha : <?php echo $mensaje["fecha"]; ?></p>
                 -------------------------------------------------
            <?php } ?>
                  </div>
               
           </div>
            <div id="insertChat">
           <form action="index.php?controller=mensaje&action=alta&idProyecto=<?php echo $_GET['idProyecto']?>" method="post" id="formChat">
                  
               <textarea name="mensaje" rows="1" class="form-control" maxlength="30"></textarea>
                    <input type="submit" value="Añadir" class="btn btn-info botonchat"/>   
           </form>
          </div>  
        
        </aside>
  <!-- Contenido -->
        <section class="contenido dev">
            <h1><?php echo strtoupper($data['datosProyecto']->nombre) ?></h1>
     <!-- boton añadir notas -->            
            <a href="#" class="btn btn-info btn-lg" id="añadirNotaBoton">
                  <span class="glyphicon glyphicon-plus"></span> Tarea
             </a>
     <!-- invisible hasta pulsar boton -->        
             <div id="añadirN">
               <form  action="index.php?controller=tarea&action=alta&idProyecto=<?php echo $_GET['idProyecto']?>" method="post" >
                    <h3>Crear Tarea</h3>
                    <hr/>
                    <p> Nombre:</p> <input type="text" name="nombre" class="form-control" required="true"/>
                    <p> Fecha de Vencimiento: </p><input type="date" name="FechaVencimiento" required="true" class="form-control"/><br>
                    <!-- Realizado: <select name="realizado" class="form-control">
                                    <option value="1">Si</option>
                                    <option value="0">No</option>
                               </select>-->
                    <input type="hidden" name="realizado" value="0">
                    <input type="submit" value="Crear" class="btn btn-success"/>   
                   </form>
            </div>
            
 <!-- TAREAS -->
        <ul class="dev">
        
            <?php foreach($data["tareas"] as $tarea) {?>
           <div id="positproyecto"> 
                              <img src="./assets/img/amarillo2.png" alt="posit proyecto" id="posit">
                          <div>
                              <?php if($tarea["realizado"]==0) {?>
                                          <button class="btn btn-info realizado"  value="<?php echo $tarea["idTarea"]?>"><span class="glyphicon glyphicon-thumbs-down"></span></button>
                              <?php }else{ ?>
                                          <button class="btn btn-success realizado"  value="<?php echo $tarea["idTarea"]?>" disabled ><span class="glyphicon glyphicon-thumbs-up"></span></button>
                              <?php } ?>
                              <a href="index.php?controller=tarea&action=delete&idTarea=<?php echo $tarea["idTarea"]?>&idProyecto=<?php echo $tarea["idProyecto"]?>" id="trash2" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></a>&nbsp;
                              <p>
                              <h3> <?php echo $tarea["nombre"]; ?> </h3>
                              <p>Vencimiento: <?php echo $tarea["fecha_vencimiento"]; ?></p>
                              </p>
                              <button class="btn btn-warning  verNotas" value="<?php echo $tarea["idTarea"]?>"><span class="glyphicon glyphicon-eye-open"></button>
                              <button class="btn btn-success notas" value="<?php echo $tarea["idTarea"]?>"><span class="glyphicon glyphicon-pencil"></button>
                              <div></div>
                              <div class="mostrarNotas">
                                  <p>NOTAS <button class="x">X</button> </p>
                                  <ul id="listaNota"></ul>                  
                              </div>
                         </div>
                   </div>
            <?php } ?>
            </ul> 
        
<!-- fin añadir -->
        </section>
  <!-- modal añadir tareas-->
       
          <aside class="lateral dev">
              <h1>Archivos</h1>
              <div id="archivosPanel" style="height:80%">
                <?php foreach($data["archivos"] as $archivo) {?>
                  <div id="unArchivo">
                Archivo: <a href="index.php?controller=archivos&action=bajar&idArchivo=<?php echo $archivo["idArchivo"] ?>"> <?php echo $archivo["descripcion"] ?></a>
                         <a href="index.php?controller=archivos&action=delete&idArchivo=<?php echo $archivo["idArchivo"]?>&idProyecto=<?php echo $_GET['idProyecto']?>" id="trash3" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></a>
                  </div>       
                 <?php } ?>
            </div>
          <!-- SECTION PARA subir-->  
          <form action="index.php?controller=archivos&action=alta" method="post" class="subirArchivo"  enctype="multipart/form-data">
              <input type="hidden"  name="idProyecto" value="<?php echo $_GET['idProyecto']?>">
              <p style="padding: 0;">Descripcion:<input type="text" id="insertP" name="descripcion" value="" maxlength="12" required="true" class="form-control"/></p>                              
              <input  type="file" required="true" name="file" id="imagen" /><br>
               <input type="submit" value="Añadir archivos" class="btn btn-info""/>  
           </form>
           <div id="social">  
           <!-- Social -->
            <a href="mailto:" class="dev mini">
                <img src="./assets/img/mail.png" alt="Correo-e">
               
            </a>
            <a href="http://twitter.com/home" class="dev mini">
                <img src="./assets/img/twitter.png" alt="Twitter">
                
            </a>
           
          </div>
        </aside>
    </main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->

</body>
</html>

