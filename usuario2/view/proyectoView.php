

 
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

        <link href="./assets/css/styleProyecto.css" rel="stylesheet" type="text/css">
    </head>
<body>
<!-- cabecera navbar-->    
<nav class="navbar navbar-default" id="nav">
    <a class="navbar-brand" href="index.php?controller=usuarios&action=index"><img id="logo"  src="./assets/img/t.png" alt="logo task"></a>
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
                <li class="active"><a href="#">task<span class="sr-only"></span></a></li>
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
                <li><a href="#">Link</a></li>

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
              <img src="./assets/img/avatar.jpg" alt="Foto perfil" alt="avatar perfil">
            <?php 
            $usuarios= $_SESSION["usuario"];
            foreach($usuarios as $ususario) {?>
              <h1> <?php echo $ususario["nombre"]; ?> </h1>
           
            <?php } ?>
            </div>
          <!-- SECTION PARA EL CHAT -->
          <div id="chat">
              <h3>CHAT</h3>
              <button type="button" id="invitar">invitar</button>
              
              
              
              
          </div>
             
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
        <!-- Contenido -->
        <section class="contenido dev">
            <h1>Proyecto</h1>
            
            <!-- Thumbnails -->
            <ul class="dev">
                <li>primero</li>
                <li></li>
                <li></li>
            </ul>
        </section>
          <aside class="lateral dev">
            <div  style="height:400px">
           
            </div>
          <!-- SECTION PARA EL CHAT -->         
          <button type="button" class="btn-info">Añadir documentacion</button>       
         
        </aside>

    <!-- Modal modificar -->
  


    </main>
    


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../assets/css/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
</body>
</html>

