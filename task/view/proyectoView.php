

 <?php
$usuarios= $_SESSION["usuario"]; 
include_once '.\view\viewGenerico\cabecera.php'; 

$idUsuario="";
foreach ($_SESSION["usuario"] as $usu){$idUsuario= $usu["idUsuario"];}
    ?>  

<!-- main -->

 <main class="dev">
  <!-- Sidebar -->
        <aside class="lateral dev">
            <div  style="height:400px">
                <img src="./assets/img/avatar.jpg" alt="Foto perfil" alt="avatar perfil">
               <button type="button" id="botonInvitar" class="btn btn-info" data-toggle="modal" data-target="#proyectoNuevo">Invitar</a></button>
            <?php 
            $usuarios= $_SESSION["usuario"];
            foreach($usuarios as $ususario) {?>
              <h3> <?php echo $ususario["nombre"]; ?> </h3>     
            <?php } ?>
               
            </div>
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
                  
                   <textarea name="mensaje" rows="1" class="form-control"></textarea>
                    <input type="submit" value="Añadir" class="btn btn-info"/>   
           </form>
          </div>  
        
        </aside>
  <!-- Contenido -->
        <section class="contenido dev">
            <h1><?php echo strtoupper($data['datosProyecto']->nombre) ?></h1>
            
 <!-- TAREAS -->
        <ul class="dev">
        
            <?php foreach($data["tareas"] as $tarea) {?>
           <div id="positproyecto"> 
                              <img src="./assets/img/amarillo2.png" alt="posit proyecto" id="posit">
                          <div>
                              <?php if($tarea["realizado"]==0) {?>
                                          <button class="btn btn-info realizado"  value="<?php echo $tarea["idTarea"]?>"><span class="glyphicon glyphicon-thumbs-down"></button>
                              <?php }else{ ?>
                                          <button class="btn btn-info realizado"  value="<?php echo $tarea["idTarea"]?>" disabled ></span>Realizado </button>
                              <?php } ?>
                              <a href="index.php?controller=tarea&action=delete&idTarea=<?php echo $tarea["idTarea"]?>&idProyecto=<?php echo $tarea["idProyecto"]?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></a>&nbsp;
                              <p>
                              <h2> <?php echo $tarea["nombre"]; ?> </h2>
                              <p>Vencimiento: <?php echo $tarea["fecha_vencimiento"]; ?></p>
                              </p>
                              <button class="btn btn-warning  verNotas" value="<?php echo $tarea["idTarea"]?>"><span class="glyphicon glyphicon-eye-open"></button>
                              <button class="btn btn-success notas" value="<?php echo $tarea["idTarea"]?>"><span class="glyphicon glyphicon-pencil"></button>
                              <div></div>
                              <div class="mostrarNotas">
                                  <h4>NOTAS <button class="x">X</button> </h4>
                                  <ul style="color: black;"></ul>                  
                              </div>
                         </div>
                   </div>
            <?php } ?>
            </ul> 
         <a href="#" class="btn btn-info btn-lg" id="añadirNotaBoton">
                  <span class="glyphicon glyphicon-plus"></span>Notas
         </a>
 <div id="añadirN">
               <form  action="index.php?controller=tarea&action=alta&idProyecto=<?php echo $_GET['idProyecto']?>" method="post" >
                    <h3>Crear Tarea</h3>
                    <hr/>
                    Nombre: <input type="text" name="nombre" class="form-control"/>
                    Fecha de Vencimiento: <input type="date" name="FechaVencimiento" class="form-control"/>
                    <!-- Realizado: <select name="realizado" class="form-control">
                                    <option value="1">Si</option>
                                    <option value="0">No</option>
                               </select>-->
                    <input type="hidden" name="realizado" value="0">
                    <input type="submit" value="Crear" class="btn btn-success"/>   
                   </form>
 </div><!-- fin añadir -->
        </section>
  <!-- modal añadir tareas-->
             
                  
                   
          <aside class="lateral dev">
            <div  style="height:80%">
           
            </div>
          <!-- SECTION PARA EL CHAT -->         
          <button type="button" class="btn-info">Añadir documentacion</button>       
           <div id="social">  
           <!-- Social -->
            <a href="#" class="dev">
                <img src="./assets/img/mail.png" alt="Correo-e">
                <span>Correo-e</span>
            </a>
            <a href="#" class="dev">
                <img src="./assets/img/twitter.png" alt="Twitter">
                <span>Twitter</span>
            </a>
           
          </div>
        </aside>

    
    
    
    </main>
    


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->

</body>
</html>

