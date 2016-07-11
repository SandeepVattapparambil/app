<?php
session_start();
if(!isset($_SESSION['id'])){
  header("Location:index.php");
}
if(isset($_SESSION['id']) && isset($_SESSION['user_name'])){
  $id = $_SESSION['id'];
  $user_name = $_SESSION['user_name'];
}
//Require Database connection configuration file
require_once('php/db_connection.php');
mysqli_select_db($conn, $db_name);
$sql = "SELECT * FROM user WHERE username='$user_name'";
$result = mysqli_query($conn, $sql);//or die('Query:<br />' . $sql . '<br /><br />Error:<br />' . mysql_error());
$count_rows = mysqli_num_rows($result);
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
      <a class="navbar-brand" href="#">NAS Media Server</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-info">Search</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['user_name'];?> <span class="caret"></span></a>
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
        <div class="well">
        <div class="bs-example" data-example-id="striped-table">
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>User Name</th>
                <th>Password</th>
              </tr>
            </thead>
            <tbody>
                <?php
                if($count_rows > 0){
                  while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<form action=\"php/profile_edit.php\" method=\"POST\">";
                    echo "<th scope=\"row\">".$row['id']."</th>";
                    echo "<td>";
                    echo "<div class=\"form-group\">";
                    echo "<input type=\"text\" class=\"form-control\" id=\"name".$row['id']."\" value=".$row['username'].">";
                    echo "</div></td><td>";
                    echo "<div class=\"form-group\">";
                    echo "<input type=\"text\" class=\"form-control\" id=\"password".$row['id']."\" value=".$row['password'].">";
                    echo "</div></td>";
                    echo "<td style=\"width: 116px;\"><button class=\"btn btn-default\" type=\"submit\">Save</button></td>";
                    echo "<td style=\"width: 116px;\"><button class=\"btn btn-default\" type=\"reset\">Clear</button></td>";
                    echo "<td style=\"width: 116px;\"><button class=\"btn btn-default\" type=\"submit\">delete</button></td>";
                    echo "</form></tr>";
                  }
                }
                ?>
            </tbody>
          </table>
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
