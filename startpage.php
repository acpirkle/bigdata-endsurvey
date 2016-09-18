<?php  session_start();
if ( isset($_POST['username']) && isset($_POST['password']) ) {
    unset($_SESSION['username']);  // Logout current user
    if ( $_POST['password'] == "password" && $_POST['username'] == "admin") {
        $_SESSION['username'] = $_POST['username'];
        header( 'Location: admin.php' ) ;
        return;
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
</head>
<body>
<h1>Welcome!</h1>
<!-- Form for students requiring only email -->
<form class="s1" method="post">
  <h4>Enter Email to enter Survey</h4>
  <p><label for="email">Email:</label>
    <input type="text" name="email" id="email" size="30" maxlength="50"/>
    <input type="submit" value="Enter" name ="emailSubmit"/></p>
</form>

<?php  if (isset($_POST['email'])){

  $_SESSION['email'] = $_POST['email'];
}
?>

<!-- Form for administrators requiring username and password -->
<form class="admin" method="post">
  <h4>Sign in for Administrators</h4>
  <p><label for="username">Username:</label>
    <input type="text" name="username" id="username" size="30" maxlength="30"/></p>
  <p><label for="username">Password:</label>
    <input type="password" name="password" id="password" size="30" maxlength="30"/></p>
    <input type="submit" value="Enter" name ="adminSubmit"/>
</form>


</body>


</html>
