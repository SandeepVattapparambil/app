<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>NAS Media Server Admin - Login</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container">
      <div class="row">
          <div class="col-md-6 col-md-offset-3">
            <div id="login_jumbotron" class="jumbotron">
              <?php
              if(isset($_SESSION['error'])){
                if($_SESSION['error'] == 1){
                echo "<div class=\"alert alert-danger\" role=\"alert\">";
                echo "<strong>Oh snap!</strong> Change a few things up and try logging again.";
                echo "</div>";
                unset($_SESSION['error']);
              }
              }
              ?>
                <form action="php/login.php" method="POST">
                  <h2>Login</h2>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input name="username" type="username" class="form-control" required id="exampleInputEmail1" placeholder="Email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input name="password" type="password" class="form-control" required id="exampleInputPassword1" placeholder="Password">
                  </div>
                    <div class="checkbox">
                    <label>
                      <input type="checkbox"> Remember me!
                    </label>
                  </div>
                  <button type="reset" class="btn btn-warning">Clear</button>
                  <button type="submit" class="btn btn-success">Login</button>

                </form>
            </div>
          </div>
      </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.js"></script>
  </body>
</html>
