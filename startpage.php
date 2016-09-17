<?php  session_start();
if ( isset($_POST['username']) && isset($_POST['password']) ) {
    unset($_SESSION['username']);  // Logout current user
    if ( $_POST['password'] == "password" && $_POST['username'] == "admin") {
        $_SESSION['username'] = $_POST['username'];
        header( 'Location: admin.php' ) ;
        return;
    }
}
?>
<html>
<head>
</head>
<body>
<h1>Welcome!</h1>
<!-- Form for students requiring only email -->
<form class="s1" method="post" action="endsurvey.php">
  <h4>Enter Email to enter Survey</h4>
  <p><label for="email">Email:</label>
    <input type="text" name="email" id="email" size="30" maxlength="50"/>
    <input type="submit" value="Enter" name ="emailSubmit"/></p>
</form>

<?php  if (isset($_POST['emailSubmit'])){
  $email = $_POST['email'];
  $_SESSION['email'] = $email;
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
