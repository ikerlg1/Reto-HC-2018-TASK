 <!-- Cabecera-->  
 <?php include_once './view/viewGenerico/cabecera.php';  ?> 
<!-- Jumbotron con carrousel-->
<header class="jumbotron text-center" id="jum">
    <div class="alert alert-danger" role="alert" id="alert" style="display:none" >Login failed!!</div>
    <h1 id="welcome">BIENVENIDO!</h1>
    <p class="lead">
        <button type="button" class="btn btn-info btn-lg" id="botonLogin" data-toggle="modal" data-target="#modalLogin">A trabajar!</a></button>
        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#modalRegistro">Registrate</a></button>
    </p>
</header>


 <!--modales ----------------------------------------------------------------------------------------------------------------------->
<div class="container">
    <!-- Modal login-->
    <div class="modal fade" id="modalLogin" role="dialog">
        <div class="modal-dialog">

  <!-- Modal content-->
            <div class="modal-content" id="cajaLogin">
                <div class="modal-header">
               
                    <h4 class="modal-title">Login</h4>
                </div>
                <div class="modal-body">
                    <form action="index.php?controller=usuarios&action=login" method="post" class="milogin col-lg-5">
                        Email: <input type="text" name="email" id="formEmail" class="form-control"/>
                        Contraseña:<input type="text" name="contrasena" id="formContra" class="form-control" disabled="true" /><br>
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
                    <form action="index.php?controller=usuarios&action=alta" method="post" class="col-lg-12" enctype="multipart/form-data">
                        Nombre: <input type="text" name="nombre" required="true" id="nombreR" class="form-control"/>
                        Apellido 1º: <input type="text" name="apellido1" id="ap1" class="form-control"/>
                        Apellido 2º : <input type="text" name="apellido2" id="ap2" class="form-control"/>
                        Email: <input type="text" name="email" required="true" id="emailRegistro" class="form-control"/>
                        Telefono: <input type="text" name="telefono" id="tlf"  class="form-control"/>
                        Contraseña:<input type="text" name="contrasena" required="true" id="contraR" class="form-control"/>                          
                         <label for="imagen">Foto perfil:</label>
                         <input  type="file" name="file" id="imagen" /><br>
                         <input type="submit" value="enviar" id="botonReg" class="btn btn-success" />  
                    </form>
                </div>
                <div class="modal-footer">
                   
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
        <div class="col-md-4" >
            <div>
                <div class="caption">
                    <h3>Que hacemos</h3>
                    <p>Herramienta colaborativa,organiza tus tareas,crea proyectos,invita a tus socios,comparte archivos,chatea</p>
                </div>
            </div>
        </div>
       
          <div id="social" class="col-md-4">            <!-- Social -->
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
        
        <div class="col-md-4" >
            <div  >
                <div class="caption" id="quienes">
                    <h3>Contactanos</h3>
                    <ul class="list-group colorListGroup" style="color: black;" >                    
                        <li class="list-group-item">Vitoria-Gasteiz, Araba</li>
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
<script src="./assets/css/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
</body>
</html>
 