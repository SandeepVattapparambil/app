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
    <title>NAS Media Server Admin - Profile</title>

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
        <li><a href="media.php"><span class="glyphicon glyphicon-hdd" aria-hidden="true"></span> Media Store</a></li>
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
        <div id="panel" class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Profile - <?php echo $user_name ;?></h3>
            </div>
            <div class="panel-body">
              <table class="table">
                <?php
                  if($count_rows > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        echo "<form action=\"php/profile_edit.php\" method=\"POST\">";
                        echo "<tr>";
                        echo "<td>Username</td>";
                        echo "<td><input type=\"text\" name=\"username\" class=\"form-control\" id=\"name\" value=".$row['username']." required></td>";
                        echo "</tr>";
                        echo "<tr><td>Password</td>";
                        echo "<td><input type=\"text\" name=\"password\" class=\"form-control\" id=\"password\" value=".$row['password']."></td>";
                        echo "</tr>";
                        echo "<input type=\"hidden\" name=\"id\" class=\"form-control\" value=".$row['id'].">";
                        echo "<tr>";
                        echo "<td></td>";
                        echo "<td><button style=\"display:none\" id=\"save\" class=\"btn btn-default\" type=\"submit\">Save</button>";
                        echo "&nbsp;<button style=\"display:none\" id=\"clear\" class=\"btn btn-default\" type=\"reset\">Clear</button></td></tr>";
                        echo "</form>";
                      }
                   }
                  ?>
                  <?php
                  if(isset($_SESSION['status'])){
                    if($_SESSION['status'] = 'success'){
                      echo "<div class=\"alert alert-success alert-dismissible fade in\" role=\"alert\">";
                      echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">";
                      echo "<span aria-hidden=\"true\">×</span></button>";
                      echo "<strong>Yay! </strong>Updates Successfull!.";
                      echo "</div>";
                      unset($_SESSION['status']);
                    }
                  }
                ?>
              </table>
            </div>
            <div style="display:none" id="check" class="panel-footer panel_info">Checking Username availability....</div>
            <div style="display:none" id="avail" class="panel-footer panel_success">Username available!</div>
            <div style="display:none" id="empty" class="panel-footer panel_warning">Username cannot be empty!</div>
            <div style="display:none" id="notavail" class="panel-footer panel_error">Username not available!</div>
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
      // process the form
      $('#name').keyup(function(event){
              // get the form data
              // there are many ways to get this data using jQuery (you can use the class or id also)
              var formData = {
                  'name'              : $('input[name=username]').val(),
              };
              if(formData){
                // process the form
                $('#check').show();
                $.ajax({
                    type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
                    url         : 'php/username_check.php', // the url where we want to POST
                    data        : formData, // our data object
                    dataType    : 'json', // what type of data do we expect back from the server
                })
                    // using the done promise callback
                    .success(function(data){
                        // log data to the console so we can see
                        console.log(data);
                        // here we will handle errors and validation messages
                        $('#panel').show();
                        if(data == 'error'){
                          $('#check').hide(function(){
                            $('#avail').hide(function(){
                              $('#notavail').show(function(){
                                $('#save').hide(function(){
                                  $('#clear').show(function(){
                                      $('#empty').hide();
                                  });
                                });
                              });
                            });
                          });
                        }
                        else if(data == 'success'){
                          $('#check').hide(function(){
                            $('#notavail').hide(function(){
                              $('#avail').show(function(){
                                $('#save').show(function(){
                                  $('#clear').show(function(){
                                      $('#empty').hide();
                                  });
                                });
                              });
                            });
                          });
                        }
                        else if(data == 'No data recieved'){
                          $('#check').hide(function(){
                            $('#notavail').hide(function(){
                              $('#avail').hide(function(){
                                $('#save').hide(function(){
                                  $('#clear').show(function(){
                                    $('#empty').show();
                                  });
                                });
                              });
                            });
                          });
                        }
                    });
                // stop the form from submitting the normal way and refreshing the page
                event.preventDefault();
              }
          });
      });
    </script
  </body>
</html>
