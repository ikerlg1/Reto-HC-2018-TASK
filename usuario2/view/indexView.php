<!DOCTYPE HTML>
<html lang="es">
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <script src="./assets/js/js.min.js"></script>
         <script src="./assets/js/validator.js"></script>
        <link href="./assets/css/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
         <link href="./assets/css/style.css" rel="stylesheet" type="text/css">

        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>

       
        
    </head>
<body>
    <!-- Cabecera-->  
    
<nav class="navbar navbar-default">
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
      <!-- Jumbotron-->
<header class="jumbotron text-center" id="jum">
    <div class="alert alert-danger" role="alert" id="alert" style="display:none" >Login failed!!</div>
    <h1 class="display-3">BIENVENIDO!</h1>
    <p class="lead">
        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#modalLogin">A trabajar!</a></button>
        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#modalRegistro">Registrate</a></button>
    </p>
    <div class="container">

        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
                 <li data-target="#myCarousel" data-slide-to="4"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <img src="./assets/img/mujer.jpg" alt="ORGANIZA" style="width:100%; height: 300px;re">
                </div>

                <div class="item">
                    <img src="./assets/img" alt="INVITA" style="width:100%; height: 300px;">
                </div>

                <div class="item">
                    <img src="./assets/img/presentacion.jpg" alt="COLABORA" style="width:100%; height: 300px;">
                </div>
                      <div class="item">
                    <img src="./assets/img" alt="INVITA" style="width:100%; height: 300px;">
                </div>
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</header>
<div class="container">
    <!-- Modal login-->
    <div class="modal fade" id="modalLogin" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
               
                    <h4 class="modal-title">Login</h4>
                </div>
                <div class="modal-body">
                    <form action="index.php?controller=usuarios&action=login" method="post" class="col-lg-5">
                        Email: <input type="text" name="email" id="formEmail" class="form-control"/>
                        Contraseña:<input type="text" name="contrasena" id="formContra" class="form-control" /><br>
                        <input type="submit" value="enviar" class="btn btn-success"/> 
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </form>
                </div>
                <div class="modal-footer">
                  
                </div>
            </div>

        </div>
    </div>

</div>
<div class="container">
    <!-- Modal registro -->
    <div class="modal fade" id="modalRegistro" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Introduce tus datos</h4>
                </div>
                <div class="modal-body">
                    <form action="index.php?controller=usuarios&action=alta" method="post" class="col-lg-5">
                        Nombre: <input type="text" name="nombre" class="form-control"/>
                        Apellido 1º: <input type="text" name="apellido1" class="form-control"/>
                        Apellido 2º : <input type="text" name="apellido2" class="form-control"/>
                        Email: <input type="text" name="email" class="form-control"/>
                        Telefono: <input type="text" name="telefono"  class="form-control"/>
                        Contraseña:<input type="text" name="contrasena" class="form-control"/>
                        <input type="submit" value="enviar" class="btn btn-success"/>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

</div>
  <!-- Footer-->
<footer  style="color:white;">
    <div class="row" >
        <ul class="nav justify-content-center col-12" >
         
            <a class="btn btn-social-icon btn-openid" onclick="_gaq.push(['_trackEvent', 'btn-social-icon', 'click', 'btn-openid']);"><span class="fa fa-openid"></span></a>
        </ul>
        <div class="col-md-6" >
            <div>
                <div class="caption">
                    <h3>Quienes somos</h3>
                    <p>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div>
                <div class="caption">
                    <h3>Links</h3>
                    <ul class="list-group colorListGroup">
                        <li class="list-group-item"><a href="#">Home</a></li>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div >
                <div class="caption" >
                    <h3>Contactanos</h3>
                    <ul class="list-group colorListGroup" style="color: black;" >
                        <li class="list-group-item">Task Company</li>
                        <li class="list-group-item"> 01015 Vitoria-Gasteiz, Araba</li>
                        <li class="list-group-item">945 12 19 29</li>
                        <li class="list-group-item">task@task.es</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../assets/css/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
</body>
</html>