<?php session_start();

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
<div class="adminTbl"><?php
// Do SQL Stuff
// Creating connection to database
$conn = new mysqli("localhost","root","password","endSurvey");
// Check connection
if($conn->connect_error){
  die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM endSurveyTable";

$result = $conn->query($sql);
echo "<table class=\"table table-hover\">
        <tr>
          <th>Email</th>
          <th>Question 1</th>
          <th>Question 2</th>
          <th>Question 3</th>
        </tr>";
if ($result->num_rows > 0){
  while ($row = $result->fetch_assoc()){
    echo "<tr><td>".$row["email"]."</td><td>".$row["question1"]."</td><td>".$row["question2"]."</td><td>".
    $row["question3"]."</td></tr>";
  }
}
echo "</table>";


 ?>
 </div>
</body>

</html>
