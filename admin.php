<?php session_start();
// Do SQL Stuff
// Creating connection to database
$conn = new mysqli("localhost","root","password","endSurvey");
// Check connection
if($conn->connect_error){
  die("Connection failed: " . $conn->connect_error);
}
  if (isset($_POST['order'])) {

    if($_POST['order'] == "asc"){
      $sql = "SELECT * FROM endSurveyTable ORDER BY time ASC";
    }else {
      $sql = "SELECT * FROM endSurveyTable ORDER BY time DESC";
  }
}else {
  $sql = "SELECT * FROM endSurveyTable ORDER BY time DESC";
}
  //$sql = "SELECT * FROM endSurveyTable ORDER BY time DESC";
$result = $conn->query($sql);
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
<form method="post">
  <button class="btn btn-default btn-sm" name="logout" id="logout" onclick="javascript: submit();">Logout</button>
</form>
  <div></div>
<div class="adminTbl">
  <table class="table table-hover">
    <tr>
      <th>Email</th>
      <th>Question 1</th>
      <th>Question 2</th>
      <th>Question 3</th>
      <th></th>
    </tr>
    <?php while ($row = $result->fetch_assoc()) : ?>
      <tr>
        <td><?php echo $row["email"]; ?></td>
        <td><?php echo $row["question1"]; ?></td>
        <td><?php echo $row["question2"]; ?></td>
        <td><?php echo $row["question3"]; ?></td>
        <td><button type="button" onclick="alert('Hello World!')">Delete</td>
      </tr>
  <?php endwhile;
  $conn->close();
  if (isset($_POST['logout'])) {
    session_destroy();
    header('Location: startpage.php');
  }?>
<form method="post">
  <label class="radio-inline" for="asc">
    <input type="radio" id="asc" name="order" value="asc" onclick="javascript: submit()">ASC
  </label>
  <label class="radio-inline" for="desc">
    <input type="radio" id="desc" name="order" value="desc" onclick="javascript: submit()">DESC
  </label>
</form>

 </div>
</body>

</html>
