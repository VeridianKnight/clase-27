<?php
// include './autoload.php';
// spl_autoload_register('miAutoloader');
require_once 'conexion/conexionBadeDeDatos.php';
require 'api/apipublicacion/abmPublicaciones.php';
require 'api/apiComentario/abmComentario.php';
//traer las publicaciones 
session_start();
// var_dump($_SESSION['usuario']);

if (isset($_SESSION['usuario']) && is_array($_SESSION['usuario'])) {
    $nombre = $_SESSION['usuario']['use_name'];
    $email = $_SESSION['usuario']['mail'];
    $id_usuario = $_SESSION['usuario']['id'];
} else {
    header("Location: ./login.php");
    exit; 
}

// // require_once './conexion/conexionBadeDeDatos.php';

$comentarios = ABMcomentario::ListarComentario();
//imrpimir las variavles ordenadamente
//imrpimir las variavles ordenadamente
// echo ('<pre>');
// var_export($comentarios) . "<br/>";
// echo ('<pre>');
$publicaciones = ABMPublicaciones::ListarPublicaciones();
?>
<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>
    <header>
        <!-- place navbar here -->
    </header>
    <main>
        <nav class="navbar navbar-expand-sm navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="#">BLOG AMERICA</a>
                <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavId">
                    <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="./cerrar.php">Salir</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Acciones</a>
                            <div class="dropdown-menu" aria-labelledby="dropdownId">
                                <a class="dropdown-item" href="./api/apipublicacion/publicacion.php">Crear Publicacion</a>
                                <a class="dropdown-item" href="#">Home</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <!-- aca devo colocar el usuario conectado -->
                            <input class="form-control me-sm-2" hidden type="text" name="id_user" value="<?php echo $nombre ?>">

                        </li>
                    </ul>
                    <form class="d-flex my-2 my-lg-0 gap-2">
                        <p>Usuario : <?php echo $nombre ?> </p>
                        <p>Mail : <?php echo $email ?> </p>

                    </form>
                </div>
            </div>
        </nav>

    </main>

    <section>
        <div class="album py-5 bg-body-tertiary">
            <div class="container d-flex">
                <div class="col-3 bg-warning">
                    <p>Titulos</p>
                    <div class="d-flex flex-column ">
                        <?php
                        foreach ($publicaciones as $publicacion) {
                            echo '                       
                        <a class="link-offset-2 link-underline link-underline-opacity-0 "  style="color: black;font-size: 15px; text-decoration: underline;"; href=./publicacion/?id="' . $publicacion["id_publicaciones"] . '">' . $publicacion["title"] . '</a>
                        <p class="" style="font-size: 10px";> Creada el ' . date("d F Y", strtotime($publicacion["create_ad"])) . ' ' . date("H:i:s", strtotime($publicacion["create_ad"])) . '</p>';
                        } ?>
                    </div>
                </div>
                <div class="col-6" ">
                    <h5>Publicaciones (<?php echo count($publicaciones) ?>) </h5>
                    <?php foreach ($publicaciones as $publicacion) { ?>
                    <div class=" row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-2 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-1 text-primary-emphasis">Categoria</strong>
                        <h4 class="mb-0"><?php echo $publicacion['title'] ?></h4>
                        <div class="mb-1 text-body-secondary"> <?php echo $publicacion['content'] ?></div>
                        <div class="mb-1 text-body-secondary">
                            <a href="./api/apipublicacion/routerPublicacion.php?accion=delete&id=<?php echo $publicacion['id_publicaciones'] ?>" class="btn btn-secondary"> Eliminar Publicacion </a>
                            <a href="./vistas/publicacion/comentarios.php" class="btn btn-secondary"> Corregir Publicacion </a>
                        </div>
                        <div class="mb-1 text-body-secondary border-danger">
                            <a href="./api/apiComentario/comentarios.php?id=<?php echo $id_usuario?>&id_post=<?php echo $publicacion['id_publicaciones']?>" class="btn btn-secondary">Crear Cometario</a>
                        </div>
                    </div>
                </div>
            <?php }
            ?>

<!-- 'id_comentario' => '1', 'post_id' => '5', 'content' => 'aca va el comentario', 'autor_id' => '1', 'create_ad' => '2023-10-29 02:46:43', -->
            </div>
            <div class="col-md-3">COMENTARIOS (<?php echo count($comentarios)?>) 
                <?php  
                foreach ($comentarios as $comentario) {
                     ?>
                    <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title"> <?php echo $comentario['content'] ?></h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary">titulo de la publicacion</h6>
                        <p class="card-text"><?php echo $comentario['content'] ?></p>
                        <a href="./api/apiComentario/abmComentario.php?accion=eliminar&id=<?php echo $comentario['id_comentario'] ?> "class="card-link">Eliminar</a>
                        <a href="./api/apiComentario/abmComentario.php?accion=modificar&id=<?php echo $comentario['id_comentario'] ?> "class="card-link">Modificar</a>
                    </div>
                </div>
                    
                <?php } ?>

                
            </div>

        </div>
        </div>
    </section>

    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>