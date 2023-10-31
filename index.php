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
            <h3 class="text-center text-white pt-5">Login form</h3>
            <div class="container">
              <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                  <div id="login-box" class="col-md-12">

                    <form id="login-form" class="form" action="./api/apiuser/routerUser.php" method="post">

                      <h3 class="text-center text-info">Login</h3>
                      <div class="form-group">
                        <label for="username" class="text-info">Username:</label><br>
                        <input type="text" required name="username" id="username" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="password" class="text-info">Password:</label><br>
                        <input type="text" required name="password" id="password" class="form-control">
                      </div>
                      <div class="form-group row">
                        <div class="col">

                          <input type="submit" name="loguarse" class="btn btn-info btn-md " value="Ingresar">
                        </div>
                        <div class="col">
                          <a  class="right-align " href="./api/apiuser/registrarUsuario.php">Registrarse</a>

                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>





</body>

</html>