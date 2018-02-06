<html lang="es">      
<!DOCTYPE HTML>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <script src="./assets/js/js.min.js"></script>
        <script src="./assets/js/validator.js"></script>
        <script src="./assets/js/proyecto.js"></script>
        <script src="./assets/js/proyecto_invitaciones.js"></script>
        
        <link href="./assets/css/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">   
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
   <?php  
                if(isset($_SESSION["usuario"])){ ?> 
      
       
                    <link href="./assets/css/stylePerfil.css" rel="stylesheet" type="text/css">
                       
          <?php       
                }
                else{?>   
   
                    <link href="./assets/css/style.css" rel="stylesheet" type="text/css">
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
               <?php  }
                ?>
        <!-- Latest compiled and minified JavaScript -->
  
       
    </head>
    
    <body>
 <nav class="navbar navbar-default" id="nav">
    <a class="navbar-brand" href="index.php?controller=usuarios&action=index"><img class="img-fluid" id="logo"  src="./assets/img/t.png" alt="logo task"></a>
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
         
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                    <?php 
                if(isset($_SESSION["usuario"])){ ?>
                     <li class="active">
                         <h2>Bienvenido!----><?php  foreach ($_SESSION["usuario"] as $usu){echo $usu["nombre"];}?></h2><span class="sr-only"></span></li> 
              <?php  }
                ?>
                     <li id="misP"><a href="index.php?controller=perfil&action=perfilUsuario&idUsuario=<?php  foreach ($_SESSION["usuario"] as $usu){ echo $usu["idUsuario"];}?>">Mis proyectos</a></li>

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
                <li><a href="./core/logout.php">Cerrar Sesion</a></li>

            </ul>
        </div>

        <!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>



