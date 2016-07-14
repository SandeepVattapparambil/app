<?php
session_start();
if(!isset($_SESSION['id'])){
  header("Location:index.php");
}
if(isset($_SESSION['user_name'])){
  $user_name = $_SESSION['user_name'];
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>NAS Media Server Admin - Home</title>

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
    <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="home.php"><span class="glyphicon glyphicon-film" aria-hidden="true"></span> NAS Media Server</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li>
          <a href="home.php"><span class="glyphicon glyphicon-tasks" aria-hidden="true"></span> Dashboard</a>
        </li>
        <li class="active"><a href="media.php"><span class="glyphicon glyphicon-hdd" aria-hidden="true"></span> Media Store</a></li>
        <li><a href="#">Link</a></li>
      </ul>
      <form class="navbar-form navbar-left" role="search">
        <div class="input-group">
      <input type="text" class="form-control" placeholder="Search for...">
      <span class="input-group-btn">
        <button class="btn btn-info" type="submit">
          <span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
      </span>
    </div>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $user_name ;?><span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="profile.php">Profile</a></li>
            <li><a href="#">Log</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="php/logout.php">Logout</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default">
          <div class="panel-heading"><h3 class="panel-title">Media Manager</h3></div>
          <div class="panel-body">
            <table class="table">
              <tr id="1">
                <td><p>Add Media Manually to the database.</p></td>
                <td><a id="add_manually" class="btn btn-success" href="#" role="button">Add Manually</a></td>
              </tr>
              <tr id="2">
                <td><p>Add Media from OMDb API - The Open Movie Database</p></td>
                <td><a id="get_api" class="btn btn-info" href="#" role="button">Get Data from OMDB</a></td>
              </tr>
              <tr id="3">
                <td><p>Edit Media data in the database </p></td>
                <td><a id="edit" class="btn btn-warning" href="#" role="button">Edit</a></td>
              </tr>
            </table>
          </div>
        </div>

        <div id="form" style="display:none;" class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Add Media</h3>
          </div>
          <div class="panel-body">
            <table class="table">
              <form method="POST" action="php/">
              <tr>
                <td>Title</td>
                <td><input type="text" class="form-control" id="" required></td>
              </tr>
              <tr>
                <td>Year</td>
                <td><input type="text" class="form-control" id="" required></td>
              </tr>
              <tr>
                <td>Rated</td>
                <td><input type="text" class="form-control" id="" required></td>
              </tr>
              <tr>
                <td>Released</td>
                <td><input type="text" class="form-control" id="" required></td>
              </tr>
              <tr>
                <td>Runtime</td>
                <td><input type="text" class="form-control" id="" required></td>
              </tr>
              <tr>
                <td>Genre</td>
                <td><input type="text" class="form-control" id="" required></td>
              </tr>
              <tr>
                <td>Directors</td>
                <td><input type="text" class="form-control" id="" required></td>
              </tr>
              <tr>
                <td>Writers</td>
                <td><input type="text" class="form-control" id="" required></td>
              </tr>
              <tr>
                <td>Actors</td>
                <td><input type="text" class="form-control" id="" required></td>
              </tr>
              <tr>
                <td>Plot</td>
                <td><input type="text" class="form-control" id="" required></td>
              </tr>
              <tr>
                <td>Language</td>
                <td><input type="text" class="form-control" id="" required></td>
              </tr>
              <tr>
                <td>Country</td>
                <td><input type="text" class="form-control" id="" required></td>
              </tr>
              <tr>
                <td>Awards</td>
                <td><input type="text" class="form-control" id="" required></td>
              </tr>
              <tr>
                <td>Poster</td>
                <td><input type="text" class="form-control" id="" required></td>
              </tr>
              <tr>
                <td>Metascore</td>
                <td><input type="text" class="form-control" id="" required></td>
              </tr>
              <tr>
                <td>IMDB Rating</td>
                <td><input type="text" class="form-control" id="" required></td>
              </tr>
              <tr>
                <td>IMCB Vote</td>
                <td><input type="text" class="form-control" id="" required></td>
              </tr>
              <tr>
                <td>Type</td>
                <td><input type="text" class="form-control" id="" required></td>
              </tr>
              <tr>
                <td></td>
                <td>
                  <button class="btn btn-default" type="reset">Clear</button>
                  <button class="btn btn-info" type="submit">Save</button>
                  <a id="form_close" class="btn btn-danger">Cancel</a>
                </td>
              </tr>
            </form>
            </table>
          </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">OMDBI</h3>
            </div>
            <div class="panel-body">
              <table class="table">
                <form action="php/omdb.php" method="POST">
                <tr>
                  <td>Title</td>
                  <td><input type="text" class="form-control" id="title" required></td>
                </tr>
                <tr>
                  <td>Year</td>
                  <td><input type="text" class="form-control" id="year" required></td>
                </tr>
                <tr>
                  <td></td>
                  <td><button class="btn btn-info" type="submit">Pull Data</button></td>
                </tr>
              </form>
              </table>
            </div>
            <div id="check" class="panel-footer panel_info">Checking network connectivity....</div>

          </div>
        </div>
      </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('#add_manually').click(function(){
          $('#2').hide();
            $('#3').hide();
            $('#form').show();
        });
      });

      $(document).ready(function(){
        $('#form_close').click(function(){
          $('#form').hide();
          $('#2').show();
            $('#3').show();
        });
      });

      $(document).ready(function(){
        $('#get_api').click(function(){
          $('#form_api').show();
          $('#1').hide();
            $('#3').hide();
        });
      });
    </script>
  </body>
</html>
