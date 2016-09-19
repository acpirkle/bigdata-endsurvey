<?php  session_start();
if ( isset($_POST['username']) && isset($_POST['password']) ) {
    unset($_SESSION['username']);  // Logout current user
    if ( $_POST['password'] == "password" && $_POST['username'] == "admin") {
        $_SESSION['username'] = $_POST['username'];
        header( 'Location: admin.php');
        return;
    }else {
      header('Location: startpage.php');
    }
}

if (isset($_POST['email'])) {
  if (!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)===false){
      header( 'Location: endsurvey.php');
  } else {
    header( 'Location: startpage.php');
  }
}
?>
<html>
<head>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <!-- Latest compiled JavaScript -->
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
<div class="container">
  <div class="jumbotron">
    <h1>Welcome!</h1>
  </div>
</div>
<div class="s1 form-group">
<form method="post">
  <h4>Enter Email to begin Survey</h4>
  <label for="email">Email:</label>
    <input type="email" class="form-control" name="email" id="email" maxlength="50"/>
    <input type="submit" class="btn btn-default btn-sm" value="Enter" name ="emailSubmit"/>
  </div>

</form>

<?php  if (isset($_POST['email'])){

  $_SESSION['email'] = $_POST['email'];
}
?>
<div class="admin form-group">
<!-- Form for administrators requiring username and password -->
<form class="admin" method="post">
  <h4>Sign in for Administrators</h4>
  <p><label for="username">Username:</label>
    <input type="text" class="form-control" name="username" id="username" size="30" maxlength="30"/></p>
  <p><label for="username">Password:</label>
    <input type="password" class="form-control" name="password" id="password" size="30" maxlength="30"/></p>
    <input type="submit" class="btn btn-default btn-sm" value="Enter" name ="adminSubmit"/>
</form>
</div>

</body>


</html>
