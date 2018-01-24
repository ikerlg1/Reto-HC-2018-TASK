
<!DOCTYPE HTML>
<html lang="es">
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <script src="./assets/js/js.min.js"></script>
        <link href="./assets/css/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">

        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>

        <link href="./assets/css/stylePerfil.css" rel="stylesheet" type="text/css">
    </head>
<body>
    <?php 
    
    $usuarios= $_SESSION["usuario"]; ?> 
   
<!-- cabecera navbar-->    
<nav class="navbar navbar-default" id="nav">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">navegar</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- logo de pagina -->
            <a class="navbar-brand" href="index.php?controller=usuarios&action=index"><img id="logo"  src="./assets/img/t.png"></a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Bienvenido!----><?php  foreach ($usuarios as $usu){echo $usu["nombre"];}?><span class="sr-only"></span></a></li>
                <li><a href="#">Link</a></li>

            </ul>
            <!-- reservo un search por si acaso-->
            <!--
            <form class="navbar-form navbar-right">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>-->
            <ul class="nav navbar-nav navbar-right">
                <li><a href="index.php?controller=usuarios&action=cerrar">Cerrar sesion</a></li>

            </ul>
        </div>

        <!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<!-- main -->

 <main class="dev">
     
     
     

        <!-- Sidebar -->
        <aside class="lateral dev">
            <div  style="height:400px">
              <img src="./assets/img/avatar.jpg" alt="Foto perfil">
            <?php 
          
            foreach($usuarios as $usuario) {?>
              <h1> <?php echo $usuario["nombre"]; ?> </h1>
              <h3> <?php echo $usuario["email"]; ?> </h3>
              <h3>  <?php echo $usuario["telefono"]; ?></h3>
               <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#modalEditar">Editar</a></button>
                <hr/>
            <?php } ?>
            </div>
          <!-- SECTION PARA EL CHAT -->         
          <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#proyectoNuevo">Nuevo Proyecto</a></button>   
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
        <!-- Contenido -->
        <section class="contenido dev">
            <h1>MIS PROYECTOS</h1>
            
            <!--Proyecto by David -->
            <ul class="dev">
                <li>primero</li>
                <li></li>
                <li></li>
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
    <form action="index.php?controller=usuarios&action=update" method="post" class="col-lg-5">
         <?php foreach($usuarios as $ususario) {?>           
                Nombre:<input type="text" name="nombre" value="<?php echo $ususario["nombre"]; ?> " class="form-control"/>
                Apellido 1º:<input type="text" name="apellido1" value="<?php echo $ususario["apellido1"]; ?>" class="form-control"/>
                 Apellido 2º:<input type="text" name="apellido2" value="<?php echo $ususario["apellido2"]; ?>" class="form-control"/>
                Email:<input type="text" name="email" value="<?php echo $ususario["email"]; ?> " class="form-control"/>
                Contraseña:<input type="text" name="contrasena" value="<?php echo $ususario["contrasena"]; ?> " class="form-control"/>
                telefono:<input type="text" name="telefono" value="<?php echo $ususario["telefono"]; ?>" class="form-control"/>                
                   <input type="hidden" name="id" value="<?php echo $ususario["id"]; ?>">
                      <input type="submit" value="enviar" class="btn btn-success"/>                 
     </form>
                    
                      <?php  }?>
                </div>
                  <div class="modal-footer">
                <form action="index.php?controller=usuarios&action=baja" method="post" class="col-lg-5">
                       <input type="hidden" name="email" value="<?php $ususario["email"]; ?>">
                       <input type="submit"  value="Baja" class="btn btn-success">
                  </form>
                       <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  
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
                    <form action="index.php?controller=usuarios&action=proyecto" method="post" class="col-lg-5">
                       nombre <input type="text" name="nombre" id="nombre" class="form-control"/>
                        descripcion<input type="text" name="descripcion" id="descrpcion" class="form-control" /><br>
                        <input type="submit" value="enviar" class="btn btn-success"/> 
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </form>
                </div>
                <div class="modal-footer">
                  
                </div>
            </div>

        </div>
    </div>


    </main>
    


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../assets/css/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
</body>
</html>



