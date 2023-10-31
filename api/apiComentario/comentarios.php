
<?php

if ((isset($_GET['id_post']))!=='') { $id_estado=$_GET['id_post']; }else{ }
if ((isset($_GET['id']))!=='') { $id_autor=$_GET['id']; }else{ }
if ((isset($_GET['estado']))=='exito') {
 $alerta= '<div class="alert alert-success" role="alert">Registro cargado exitosamente</div>'; }
 else{
   $alerta= '<div class="alert " role="alert">Carga de Datos</div>'; }
 ?>

<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!------ Include the above in your HEAD tag ---------->

<body class="">
          <div id="login">
            <h3 class="text-center text-white">COMENTARIO</h3>
            <div class="container">
              <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                  <div id="login-box" class="col-md-12">

                    <form id="login-form" class="form" action="./routerComentario.php" method="post">

                      <h3 class="text-center text-info">COMENTARIO PUBLICACION(<?php echo $id_estado;?>)Autor(<?php echo $id_autor;?>) </h3>
                      <div class="form-group d-flex">
                        <label class="text-info">id_estado</label><br>
                        <input type="text" name="post_id" class="form-control form-control-sm" value="<?php echo $id_estado?>">
                        <label class="text-info">$id_autor</label><br>
                        <input type="text" name="autor_id" class="form-control form-control-sm" value="<?php echo $id_autor;?>">

                        <!-- INSERT INTO `comentarios`( `post_id`, `content`, `autor_id`)  -->

                      </div>
                      <!-- <div class="form-group">
                        <label for="password" class="text-info">Titulo:</label><br>
                        <input type="text" required name="title" id="password" class="form-control form-control-sm">
                      </div> -->
                      <div class="form-group">
                        <label for="password" class="text-info">Contenido:</label><br>
                        <textarea required name="content" rows="8" cols="65"></textarea>
                      </div>
                      <div class="form-group">
                        <div class=""><?php echo $alerta;?></div>        
                        <input type="submit" name="crearCometario" class="btn btn-info btn-md" value="Crear">
                        <a class="btn btn-info btn-md" href="../../index2.php">Regresar</a>
                      </div>
                    </form>

                  </div>
                </div>
              </div>
            </div>
          </div>




</body>

</html>