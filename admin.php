<?php session_start();
function makeTable(){
// Do SQL Stuff
// Creating connection to database
$conn = new mysqli("localhost","root","password","endSurvey");
// Check connection
if($conn->connect_error){
  die("Connection failed: " . $conn->connect_error);
}

    $sql = "SELECT * FROM endSurveyTable ORDER BY time ASC";

  //$sql = "SELECT * FROM endSurveyTable ORDER BY time DESC";

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

$conn->close();
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
  <div></div>
<div class="adminTbl"><?php
  makeTable();
 ?>
<!-- <form method="post">
<input type="radio" id="asc" name="order" value="asc" checked>
<label for="asc">ASC</label>
<input type="radio" id="desc" name="order" value="desc">
<label for="desc">DESC</label> -->
</form>

 </div>
</body>

</html>
