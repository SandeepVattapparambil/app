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
      <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-film" aria-hidden="true"></span> NAS Media Server</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active">
          <a href="#"><span class="glyphicon glyphicon-tasks" aria-hidden="true"></span> Dashboard</a>
        </li>
        <li><a href="#"><span class="glyphicon glyphicon-hdd" aria-hidden="true"></span> Media Store</a></li>
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
        <?php
        if(isset($_SESSION['status'])){
          if($_SESSION['status'] = 'success'){
            echo "<div class=\"col-md-6 col-md-offset-3\">";
            echo "<div class=\"alert alert-success alert-dismissible fade in\" role=\"alert\">";
            echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">";
            echo "<span aria-hidden=\"true\">×</span></button>";
            echo "<div class=\"media\">";
            echo "<div class=\"media-left\"> <a href=\"#\">";
            echo "<img class=\"media-object\" data-src=\"holder.js/64x64\" alt=\"64x64\" src=\"img/welcome.png\" data-holder-rendered=\"true\" style=\"width: 64px; height: 64px;\"> </a> </div>";
            echo "<div class=\"media-body\">";
            echo "<h4 class=\"media-heading\">Welcome $user_name !</h4>";
            echo "Cras sit amet nibh libero, in e felis in faucibus.<a href=\"profile.php?q=nav_from_home\"> Edit Profile</a>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            unset($_SESSION['status']);
          }
        }
      ?>
      <div class="col-md-4">
        <div class="well well-lg">
          <h3><span class="glyphicon glyphicon-th" aria-hidden="true"></span> Status</h3>
          <ul class="list-group">
            <li class="list-group-item list-group-item-success">All Systems are working <strong>100%</strong>.</li>
          </ul>
        </div>
      </div>
      <div class="col-md-4">
        <div class="well well-lg">
          <h3><span class="glyphicon glyphicon-file" aria-hidden="true"></span> Media</h3>
          <ul class="list-group">
            <li class="list-group-item list-group-item-info"><strong>3132</strong> Media entries found!</li>
          </ul>
        </div>
      </div>
      <div class="col-md-4">
        <div class="well well-lg">
          <h3><span class="glyphicon glyphicon-star" aria-hidden="true"></span> Latest</h3>
          <ul class="list-group">
            <li class="list-group-item list-group-item-default">
              <div class="media">
                <div class="media-left">
                  <a href="#">
                    <img class="media-object" src="img/welcome2.png" style="width:50px;" alt="small_poster">
                  </a>
                </div>
                <div class="media-body">
                  <h4 class="media-heading">Movie Title &nbsp;
                    <span class="label label-danger">2013</span>
                    <span class="label label-info" style="float:right;">New</span></h4>
                  Thriller, Action...
                </div>
              </div>
              </li>

          </ul>
        </div>
      </div>
      <div class="col-md-8">
        <div class="well well-lg">
          <h3><span class="glyphicon glyphicon-file" aria-hidden="true"></span> Tip !</h3>
          Try adding new movies to the database
          <a class="btn btn-default" href="#" role="button">Add</a> or make changes
          <a class="btn btn-default" href="#" role="button">Edit</a>
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
